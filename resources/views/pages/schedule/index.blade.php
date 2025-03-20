@section('title', 'Training Schedule')
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-5">
        
            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Training Schedule Management</h1>
            </div>
        
        </div>

        <!-- Page content -->
        <div class="flex flex-col space-y-10 sm:flex-row sm:space-x-6 sm:space-y-0 md:flex-col md:space-x-0 md:space-y-10 xl:flex-row xl:space-x-6 xl:space-y-0 mt-9">

            <!-- Job list -->
            <div class="w-full space-y-2">
                <x-schedule.index :objectives="$objectives" :instructors="$instructors" :students="$students" :schedules="$schedules" :batches="$batches"/>
            </div>

        </div>
        <!-- Pagination -->
        <div class="mt-6">
            {{$schedules->links()}}
        </div>
    </div>
</x-app-layout>


<!-- Make sure jQuery is included -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    document.addEventListener("change", function (event) {
        const target = event.target;

        // Find the closest row containing the selects and input
        const parentDiv = target.closest('div').parentElement;
        if (!parentDiv) return; // Prevent errors if the element is not found

        const batchSelect = parentDiv.querySelector('select[id^="batch_"]');
        const courseSelect = parentDiv.querySelector('select[id^="course_"]');
        const topicSelect = parentDiv.querySelector('select[id^="topic_"]');
        const instructorSelect = parentDiv.querySelector('select[id^="instructor_"]');
        const totalStudentsInput = parentDiv.querySelector('input[id^="total_student_"]');

        if (!batchSelect || !courseSelect || !instructorSelect || !totalStudentsInput) {
            console.error("Missing required elements.");
            return;
        }

        const batchId = batchSelect.value;
        const courseId = courseSelect.value;
        const instructorId = instructorSelect.value;

        console.log("Batch ID:", batchId, "Course ID:", courseId, "Instructor ID:", instructorId);

        // Fetch Topics if a valid Course is selected
        if (target.matches('select[id^="course_"]')) {
            if (courseId) {
                fetch(`/getTopics/${courseId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log("Topics fetched:", data);
                        topicSelect.innerHTML = `<option value="">-Select-</option>`;
                        data.forEach(topic => {
                            topicSelect.innerHTML += `<option value="${topic.id}">${topic.topic}</option>`;
                        });

                        document.getElementById("lecture_days_0").value = 0;
                        document.getElementById("total_student_0").value = 0;
                        document.getElementById("schedule-container").innerHTML = "";
                    })
                    .catch(error => console.error("Error fetching topics:", error));
            } else {
                topicSelect.innerHTML = `<option value="">-Select Course First-</option>`;
            }
        }

        // Fetch Instructors when both Batch and Course are selected
        if (target.matches('select[id^="batch_"]') || target.matches('select[id^="course_"]')) {
            if (batchId && courseId) {
                fetch(`/getInstructors/${courseId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log("Instructors fetched:", data);
                        instructorSelect.innerHTML = `<option value="">-Select-</option>`;
                        data.forEach(instructor => {
                            instructorSelect.innerHTML += `<option value="${instructor.id}">${instructor.firstName} ${instructor.lastName}</option>`;
                        });

                        document.getElementById("lecture_days_0").value = 0;
                        document.getElementById("total_student_0").value = 0;
                        document.getElementById("schedule-container").innerHTML = "";
                    })
                    .catch(error => console.error("Error fetching instructors:", error));
            } else {
                instructorSelect.innerHTML = `<option value="">-Select Batch & Course First-</option>`;
            }
        }

        // Fetch Students when an Instructor is selected
        if (target.matches('select[id^="instructor_"]')) {
            if (batchId && instructorId) {
                fetch(`/getInstructorStudents/${batchId}/${instructorId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log("Students fetched:", data);

                        totalStudentsInput.value = data.length; // Update student count

                        document.getElementById("lecture_days_0").value = 0;
                        document.getElementById("schedule-container").innerHTML = "";

                        // Limit to 3 names per row
                        const formattedNames = data
                            .map(student => `${student.firstName} ${student.lastName}`)
                            .reduce((acc, name, index) => {
                                if (index % 3 === 0) acc.push([]); // Start a new row every 3 names
                                acc[acc.length - 1].push(name);
                                return acc;
                            }, [])
                            .map(row => row.join(', ')) // Join names with commas within each row
                            .join('\n'); // Separate rows with new lines

                        // Set title attribute
                        totalStudentsInput.setAttribute('title', formattedNames || "No students assigned.");
                    })
                    .catch(error => console.error("Error fetching students:", error));
            } else {
                console.warn("Batch ID or Instructor ID missing.");
                totalStudentsInput.value = 0; // Reset count
                totalStudentsInput.setAttribute('title', ""); // Clear title
            }
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const daysInput = document.getElementById("lecture_days_0");
        const studentsInput = document.getElementById("total_student_0");
        const scheduleContainer = document.getElementById("schedule-container");

        // Function to update max days based on total students
        function updateMaxDays() {
            const totalStudents = parseInt(studentsInput.value, 10) || 1;
            daysInput.max = totalStudents;

            // If the current value exceeds max, correct it
            if (parseInt(daysInput.value, 10) > totalStudents) {
                daysInput.value = totalStudents;
            }
        }

        // Observe changes in total students
        const observer = new MutationObserver(updateMaxDays);
        observer.observe(studentsInput, { attributes: true, childList: true, subtree: true, characterData: true });

        // Listen for user input on lecture_days_0
        daysInput.addEventListener("input", function () {
            let totalStudents = parseInt(studentsInput.value, 10);
            let numDays = parseInt(this.value, 10) || 1;

            // Immediately reset if value exceeds the total students
            if (numDays > totalStudents) {
                numDays = totalStudents;
                this.value = totalStudents;
            }

            scheduleContainer.innerHTML = "";

            let studentsPerDay = Math.floor(totalStudents / numDays);
            let remainder = totalStudents % numDays;

            for (let i = 0; i < numDays; i++) {
                let assignedStudents = studentsPerDay + (remainder > 0 ? 1 : 0);
                remainder--;

                const newSection = document.createElement("div");
                newSection.className = "schedule-entry sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5";
                newSection.innerHTML = `
                    <div class="sm:w-1/6 relative">
                        <label class="block text-sm font-medium mb-1">Date <span class="text-red-500">*</span></label>
                        <input class="datepicker form-input pl-9 dark:bg-gray-800 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100 font-medium w-full" name="schedule_date[]" placeholder="Select date" />
                        <div class="absolute inset-y-0 left-2 flex items-center pointer-events-none">
                            ${calendarSVG()}
                        </div>
                    </div>
                    <div class="sm:w-1/6 relative">
                        <label class="block text-sm font-medium mb-1">Time Start <span class="text-red-500">*</span></label>
                        <input class="timepicker form-input pl-9 dark:bg-gray-800 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100 font-medium w-full" name="time_start[]" placeholder="Select start time" />
                        <div class="absolute inset-y-0 left-2 flex items-center pointer-events-none">
                            ${clockSVG()}
                        </div>
                    </div>
                    <div class="sm:w-1/6 relative">
                        <label class="block text-sm font-medium mb-1">Time Stop <span class="text-red-500">*</span></label>
                        <input class="timepicker form-input pl-9 dark:bg-gray-800 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100 font-medium w-full" name="time_stop[]" placeholder="Select stop time" />
                        <div class="absolute inset-y-0 left-2 flex items-center pointer-events-none">
                            ${clockSVG()}
                        </div>
                    </div>
                    <div class="sm:w-1/6 relative">
                        <label class="block text-sm font-medium mb-1">Distributed Students <span class="text-red-500">*</span></label>
                        <input type="number" readonly name="distributed_students[]" value="${assignedStudents}" title="This row contains ${assignedStudents} students" class="form-input w-full dark:bg-gray-800 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100 font-medium">
                    </div>
                `;
                scheduleContainer.appendChild(newSection);
            }

            // Initialize Flatpickr for new elements
            initFlatpickr();
        });

        // Function to initialize Flatpickr
        function initFlatpickr() {
            flatpickr('.datepicker', {
                enableTime: false,
                dateFormat: 'M j, Y',
                static: true,
                prevArrow: prevNextArrowSVG(),
                nextArrow: prevNextArrowSVG(),
                onReady: updateCalendarStyle,
                onChange: updateInputValue
            });

            flatpickr('.timepicker', {
                enableTime: true,
                noCalendar: true,
                time_24hr: false,
                dateFormat: 'h:i K',
                static: true,
                prevArrow: prevNextArrowSVG(),
                nextArrow: prevNextArrowSVG(),
                onReady: updateCalendarStyle,
                onChange: updateInputValue
            });
        }

        function updateCalendarStyle(selectedDates, dateStr, instance) {
            const customClass = instance.element.getAttribute('data-class');
            if (customClass) {
                instance.calendarContainer.classList.add(customClass);
            }
        }

        function updateInputValue(selectedDates, dateStr, instance) {
            instance.element.value = dateStr;
        }

        function prevNextArrowSVG() {
            return `<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11">
                        <path d="M5.4 10.8l1.4-1.4-4-4 4-4L5.4 0 0 5.4z" />
                    </svg>`;
        }

        function clockSVG() {
            return `<svg class="fill-current text-gray-400 dark:text-gray-500 ml-1 mt-6" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M5 4a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z" />
                        <path d="M4 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4H4ZM2 4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Z" />
                    </svg>`;
        }

        function calendarSVG() {
            return `<svg class="fill-current text-gray-400 dark:text-gray-500 ml-1 mt-6" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M5 4a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z" />
                        <path d="M4 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4H4ZM2 4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Z" />
                    </svg>`;
        }

        // Initial Setup
        updateMaxDays();
        initFlatpickr();
    });
</script>


    
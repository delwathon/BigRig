@section('title', 'Training Schedule')
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-5">
        
            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Training Schedule Management</h1>
            </div>
        
            <!-- Post a job button -->
            <!-- <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Post A Job</button> -->
        
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



<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('deleteModal', {
            modalOpen: false,
            objectiveId: null, // Track the ID of the objective to delete
            open(id) {
                this.objectiveId = id;
                this.modalOpen = true;
            },
            close() {
                this.modalOpen = false;
                this.objectiveId = null;
            }
        });
    });

    let rowCounter = 0;

    function addNewRow() {
        const scheduleContainer = document.getElementById('schedule-container');

        const newRow = document.createElement('div');
        newRow.className = 'sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5';
        newRow.setAttribute('data-row-id', rowCounter);

        newRow.innerHTML = `
            <div class="sm:w-1/6">
                <label class="block text-sm font-medium mb-1" for="instructor_${rowCounter}">Instructor <span class="text-red-500">*</span></label>
                <select class="form-select w-full dark:bg-gray-800 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100 font-medium" name="instructor_id[]">
                    <option>-Select-</option>
                    @foreach ($instructors as $instructor)
                        <option value="{{ $instructor->id }}">{{ $instructor->first_name }} {{ $instructor->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="sm:w-1/6">
                <label class="block text-sm font-medium mb-1" for="course_${rowCounter}">Course <span class="text-red-500">*</span></label>
                <select id="course_${rowCounter}" name="objective_id[]" class="form-select w-full dark:bg-gray-800 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100 font-medium">
                    <option value="">-Select-</option>
                    @foreach ($objectives as $objective)
                        <option value="{{ $objective->id }}">{{ $objective->objective }}</option>
                    @endforeach
                </select>
            </div>
            <div class="sm:w-1/6">
                <label class="block text-sm font-medium mb-1" for="topic_${rowCounter}">Topic <span class="text-red-500">*</span></label>
                <select id="topic_${rowCounter}" name="curriculum_id[]"  class="form-select w-full dark:bg-gray-800 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100 font-medium">
                    <option value="">-Select Course First-</option>
                </select>
            </div>
            <div class="sm:w-1/6">
                <label class="block text-sm font-medium mb-1" for="date_${rowCounter}">Date <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input name="schedule_date[]" class="datepicker form-input pl-9 dark:bg-gray-800 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100 font-medium w-full" placeholder="Select date" data-class="flatpickr-right" />
                    <div class="absolute inset-0 right-auto flex items-center pointer-events-none">
                        <svg class="fill-current text-gray-400 dark:text-gray-500 ml-3" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M5 4a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z" />
                        <path d="M4 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4H4ZM2 4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="sm:w-1/6">
                <label class="block text-sm font-medium mb-1" for="time_start_${rowCounter}">Start Time <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input name="time_start[]" class="timepicker form-input pl-9 dark:bg-gray-800 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100 font-medium w-full" placeholder="Select start time" data-class="flatpickr-right" />
                    <div class="absolute inset-0 right-auto flex items-center pointer-events-none">
                        <svg class="fill-current text-gray-400 dark:text-gray-500 ml-3" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M5 4a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z" />
                        <path d="M4 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4H4ZM2 4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="sm:w-1/6">
                <label class="block text-sm font-medium mb-1" for="time_stop_${rowCounter}">Time Stop <span class="text-red-500">*</span></label>
                <div class="flex items-center">
                    <div class="relative">
                        <input name="time_stop[]" class="timepicker form-input pl-9 dark:bg-gray-800 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100 font-medium w-[12.5rem]" placeholder="Select stop time" data-class="flatpickr-right" />
                        <div class="absolute inset-0 right-auto flex items-center pointer-events-none">
                            <svg class="fill-current text-gray-400 dark:text-gray-500 ml-3" width="16" height="16" viewBox="0 0 16 16">
                            <path d="M5 4a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z" />
                            <path d="M4 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4H4ZM2 4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Z" />
                            </svg>
                        </div>
                    </div>
                    <button type="button" onclick="removeRow(${rowCounter})" class="text-red-500 hover:text-red-600 ml-1 rounded-full">
                        <span class="sr-only">Remove Row</span>
                        <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                            <path d="M13 15h2v6h-2zM17 15h2v6h-2z" />
                            <path d="M20 9c0-.6-.4-1-1-1h-6c-.6 0-1 .4-1 1v2H8v2h1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V13h1v-2h-4V9zm-6 1h4v1h-4v-1zm7 3v9H11v-9h10z" />
                        </svg>
                    </button>
                </div>
            </div>
        `;

        scheduleContainer.appendChild(newRow);

        // Re-initialize flatpickr for the new date and time pickers
        flatpickr('.datepicker', { 
            enableTime: false,           // Enable time selection
            time_24hr: false,           // Set to true for 24-hour format
            dateFormat: 'M j, Y',       // Display format (12-hour format with AM/PM)
            defaultDate: null,          // Do not pre-fill any date
            static: true,               // Static positioning for the calendar
            monthSelectorType: 'static',
            prevArrow: '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M5.4 10.8l1.4-1.4-4-4 4-4L5.4 0 0 5.4z" /></svg>',
            nextArrow: '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M1.4 10.8L0 9.4l4-4-4-4L1.4 0l5.4 5.4z" /></svg>',
            onReady: (selectedDates, dateStr, instance) => {
            const customClass = instance.element.getAttribute('data-class');
            if (customClass) {
                instance.calendarContainer.classList.add(customClass);
            }
            },
            onChange: (selectedDates, dateStr, instance) => {
            instance.element.value = dateStr; // Update the input value with the selected date and time
            }, 
        });

        flatpickr('.timepicker', { 
            enableTime: true,           // Enable time selection
            noCalendar: true,           // Disable date selection
            time_24hr: false,           // Set to true for 24-hour format
            dateFormat: 'h:i K',        // Display format (12-hour format with AM/PM)
            defaultDate: null,          // Do not pre-fill any date
            static: true,               // Static positioning for the calendar
            monthSelectorType: 'static',
            prevArrow: '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M5.4 10.8l1.4-1.4-4-4 4-4L5.4 0 0 5.4z" /></svg>',
            nextArrow: '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M1.4 10.8L0 9.4l4-4-4-4L1.4 0l5.4 5.4z" /></svg>',
            onReady: (selectedDates, dateStr, instance) => {
            const customClass = instance.element.getAttribute('data-class');
            if (customClass) {
                instance.calendarContainer.classList.add(customClass);
            }
            },
            onChange: (selectedDates, dateStr, instance) => {
            instance.element.value = dateStr; // Update the input value with the selected time
            },
        });

        rowCounter++;
    }

    function removeRow(rowId) {
        const rowToRemove = document.querySelector(`[data-row-id='${rowId}']`);
        if (rowToRemove) {
            rowToRemove.remove();
        }
    }

</script>


<!-- Make sure jQuery is included -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    document.addEventListener("change", function (event) {
        if (event.target.matches('select[id^="course_"]')) {
            const courseId = event.target.value;
            const topicSelect = event.target.closest('div').nextElementSibling.querySelector('select');
            if (courseId) {
                fetch(`/getTopics/${courseId}`)
                    .then(response => response.json())
                    .then(data => {
                        topicSelect.innerHTML = `<option value="">-Select-</option>`;
                        data.forEach(topic => {
                            topicSelect.innerHTML += `<option value="${topic.id}">${topic.topic}</option>`;
                        });
                    })
                    .catch(error => console.error('Error fetching topics:', error));
            } else {
                topicSelect.innerHTML = `<option value="">-Select Course First-</option>`;
            }
        }
    });
</script>



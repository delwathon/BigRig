{{-- resources/views/instructor/schedule/calendar.blade.php --}}
<x-app-layout>
    {{-- Include FullCalendar CSS and JS from CDN --}}
    @push('styles')
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
        <style>
            #calendar {
                max-width: 1200px;
                margin: 0 auto;
            }
            .fc-event {
                cursor: pointer;
                padding: 2px 4px;
            }
            .fc-event-title {
                font-weight: 600;
            }
            .fc-daygrid-event {
                white-space: normal;
            }
        </style>
    @endpush

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Header --}}
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">
                    Schedule Calendar
                </h1>
                <p class="text-gray-600 dark:text-gray-400">
                    View your complete teaching schedule in calendar format
                </p>
            </div>
            <div class="flex items-center space-x-2">
                {{-- Back to Schedule --}}
                <a href="{{ route('instructor.schedule') }}"
                   class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Schedule
                </a>

                {{-- Export Button --}}
                <button onclick="exportCalendar()"
                        class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Export
                </button>
            </div>
        </div>

        {{-- Legend --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Legend:</span>
                    <div class="flex items-center space-x-2">
                        <div class="w-4 h-4 bg-purple-500 rounded"></div>
                        <span class="text-sm text-gray-600 dark:text-gray-400">Theory Session</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-4 h-4 bg-green-500 rounded"></div>
                        <span class="text-sm text-gray-600 dark:text-gray-400">Practical Session</span>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <button onclick="changeView('dayGridMonth')"
                            class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">
                        Month
                    </button>
                    <button onclick="changeView('timeGridWeek')"
                            class="px-3 py-1 text-sm bg-gray-600 text-white rounded hover:bg-gray-700">
                        Week
                    </button>
                    <button onclick="changeView('timeGridDay')"
                            class="px-3 py-1 text-sm bg-gray-600 text-white rounded hover:bg-gray-700">
                        Day
                    </button>
                    <button onclick="changeView('listWeek')"
                            class="px-3 py-1 text-sm bg-gray-600 text-white rounded hover:bg-gray-700">
                        List
                    </button>
                </div>
            </div>
        </div>

        {{-- Calendar Container --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div id="calendar"></div>
        </div>

        {{-- Event Details Modal --}}
        <div id="eventModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
                <div class="mt-3">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100" id="modalTitle">
                        Class Details
                    </h3>
                    <div class="mt-4 space-y-3">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Course</p>
                            <p class="font-semibold text-gray-900 dark:text-gray-100" id="modalCourse"></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Topic</p>
                            <p class="font-semibold text-gray-900 dark:text-gray-100" id="modalTopic"></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Date & Time</p>
                            <p class="font-semibold text-gray-900 dark:text-gray-100" id="modalDateTime"></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Batch</p>
                            <p class="font-semibold text-gray-900 dark:text-gray-100" id="modalBatch"></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Type</p>
                            <p id="modalType"></p>
                        </div>
                    </div>
                    <div class="mt-5 flex justify-between">
                        <button onclick="closeModal()"
                                class="px-4 py-2 bg-gray-300 text-gray-800 text-base font-medium rounded-md hover:bg-gray-400">
                            Close
                        </button>
                        <div class="space-x-2">
                            <a id="modalViewLink" href="#"
                               class="px-4 py-2 bg-blue-600 text-white text-base font-medium rounded-md hover:bg-blue-700">
                                View Details
                            </a>
                            <a id="modalAttendanceLink" href="#"
                               class="px-4 py-2 bg-green-600 text-white text-base font-medium rounded-md hover:bg-green-700">
                                Mark Attendance
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
        <script>
            let calendar;
            const scheduleData = @json($schedules);

            document.addEventListener('DOMContentLoaded', function() {
                const calendarEl = document.getElementById('calendar');

                calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                    },
                    height: 'auto',
                    events: scheduleData,
                    eventClick: function(info) {
                        showEventDetails(info.event);
                    },
                    eventTimeFormat: {
                        hour: '2-digit',
                        minute: '2-digit',
                        hour12: true
                    },
                    dayMaxEvents: 3,
                    moreLinkClick: 'popover',
                    eventDisplay: 'block',
                    eventColor: '#3B82F6',
                    nowIndicator: true,
                    businessHours: {
                        daysOfWeek: [1, 2, 3, 4, 5, 6], // Monday - Saturday
                        startTime: '08:00',
                        endTime: '18:00',
                    },
                    slotMinTime: '07:00:00',
                    slotMaxTime: '20:00:00',
                    slotDuration: '00:30:00',
                    slotLabelInterval: '01:00',
                    allDaySlot: false,
                    weekNumbers: true,
                    weekNumberCalculation: 'ISO',
                    eventDidMount: function(info) {
                        // Add tooltips if needed
                        info.el.setAttribute('title', info.event.extendedProps.course + ' - ' + info.event.extendedProps.topic);
                    }
                });

                calendar.render();
            });

            function changeView(viewName) {
                calendar.changeView(viewName);

                // Update button styles
                const buttons = document.querySelectorAll('button[onclick^="changeView"]');
                buttons.forEach(btn => {
                    btn.classList.remove('bg-blue-600');
                    btn.classList.add('bg-gray-600');
                });
                event.target.classList.remove('bg-gray-600');
                event.target.classList.add('bg-blue-600');
            }

            function showEventDetails(event) {
                // Populate modal with event details
                document.getElementById('modalCourse').textContent = event.extendedProps.course;
                document.getElementById('modalTopic').textContent = event.extendedProps.topic;
                document.getElementById('modalBatch').textContent = event.extendedProps.batch;

                // Format date and time
                const start = new Date(event.start);
                const end = new Date(event.end);
                const dateStr = start.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
                const timeStr = start.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' }) + ' - ' +
                               end.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
                document.getElementById('modalDateTime').textContent = dateStr + ' • ' + timeStr;

                // Set type with styling
                const typeElement = document.getElementById('modalType');
                const type = event.extendedProps.type;
                typeElement.innerHTML = `<span class="px-2 py-1 text-xs rounded-full ${type === 'theory' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800'}">${type.charAt(0).toUpperCase() + type.slice(1)}</span>`;

                // Set links
                document.getElementById('modalViewLink').href = event.url;
                document.getElementById('modalAttendanceLink').href = `/instructor/attendance/mark/${event.id}`;

                // Show modal
                document.getElementById('eventModal').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('eventModal').classList.add('hidden');
            }

            function exportCalendar() {
                // Export to ICS
                window.location.href = "{{ route('instructor.schedule.export', ['format' => 'ics', 'range' => 'all']) }}";
            }

            // Close modal when clicking outside
            window.onclick = function(event) {
                const modal = document.getElementById('eventModal');
                if (event.target == modal) {
                    closeModal();
                }
            }
        </script>
    @endpush
</x-app-layout>

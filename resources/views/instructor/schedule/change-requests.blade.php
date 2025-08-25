
@php
use Carbon\Carbon;
@endphp
<x-app-layout>

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Header --}}
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">
                    Schedule Change Requests
                </h1>
                <p class="text-gray-600 dark:text-gray-400">
                    View and manage your schedule change requests
                </p>
            </div>
            <a href="{{ route('instructor.schedule') }}"
               class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Back to Schedule
            </a>
        </div>

        {{-- Statistics --}}
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Total Requests</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $requests->total() }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-yellow-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Pending</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $requests->where('status', 'pending')->count() }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Approved</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $requests->where('status', 'approved')->count() }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-red-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <span class="text-gray-500 text-sm">Rejected</span>
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $requests->where('status', 'rejected')->count() }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Requests Table --}}
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                    All Change Requests
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Request Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Class Details
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Type
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Reason
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                New Schedule
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Admin Notes
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($requests as $request)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ Carbon::parse($request->requested_at)->format('M d, Y') }}
                                    <div class="text-xs">
                                        {{ Carbon::parse($request->requested_at)->format('h:i A') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $request->schedule->course->objective }}
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        {{ $request->schedule->topic->topic }}
                                    </div>
                                    <div class="text-xs text-gray-400">
                                        Original: {{ Carbon::parse($request->schedule->schedule_date)->format('M d, Y') }}
                                        {{ $request->schedule->time_start }} - {{ $request->schedule->time_stop }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $request->type == 'reschedule' ? 'bg-blue-100 text-blue-800' : '' }}
                                        {{ $request->type == 'cancel' ? 'bg-red-100 text-red-800' : '' }}
                                        {{ $request->type == 'substitute' ? 'bg-purple-100 text-purple-800' : '' }}">
                                        {{ ucfirst($request->type) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 dark:text-gray-100 max-w-xs truncate" title="{{ $request->reason }}">
                                        {{ Str::limit($request->reason, 50) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($request->type == 'reschedule' && $request->new_date)
                                        <div>{{ Carbon::parse($request->new_date)->format('M d, Y') }}</div>
                                        @if($request->new_time_start)
                                            <div class="text-xs">
                                                {{ $request->new_time_start }} - {{ $request->new_time_stop }}
                                            </div>
                                        @endif
                                    @elseif($request->type == 'substitute' && $request->substituteInstructor)
                                        <div class="text-xs">
                                            Sub: {{ $request->substituteInstructor->firstName }} {{ $request->substituteInstructor->lastName }}
                                        </div>
                                    @else
                                        <span class="text-gray-400">N/A</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $request->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                        {{ $request->status == 'approved' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $request->status == 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                                        {{ ucfirst($request->status) }}
                                    </span>
                                    @if($request->reviewed_at)
                                        <div class="text-xs text-gray-500 mt-1">
                                            {{ Carbon::parse($request->reviewed_at)->format('M d, Y') }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($request->admin_notes)
                                        <div class="text-sm text-gray-600 dark:text-gray-400 max-w-xs">
                                            {{ Str::limit($request->admin_notes, 50) }}
                                        </div>
                                    @else
                                        <span class="text-sm text-gray-400">-</span>
                                    @endif
                                    @if($request->reviewer)
                                        <div class="text-xs text-gray-500 mt-1">
                                            By: {{ $request->reviewer->firstName }} {{ $request->reviewer->lastName }}
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">No Change Requests</h3>
                                    <p class="text-gray-500 dark:text-gray-400">You haven't submitted any schedule change requests yet.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($requests->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $requests->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

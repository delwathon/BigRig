<div>
    <div class="px-5 py-4">
        <p>Please select the courses that users under this role can take or tutor.</p>
        <div class="space-y-3 mt-3">
            <table class="table-auto w-full dark:text-gray-300">
                <thead class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-900/20 border-t border-b border-gray-100 dark:border-gray-700/60">
                    <tr>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                            <div class="font-semibold text-left">Course</div>
                        </th>
                        <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap text-center">
                            <div class="font-semibold">Select</div>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-700/60">
                    @foreach ($courses as $course)
                        <tr>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                <div class="text-left">{{ $course->objective }}</div>
                            </td>
                            <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                <div class="flex items-center justify-center">
                                    <label class="inline-flex">
                                        <input 
                                            type="checkbox" 
                                            class="table-item form-checkbox" 
                                            value="{{ $course->id }}" 
                                            wire:click="toggleCourse({{ $course->id }})"
                                            {{ in_array($course->id, $selectedCourses) ? 'checked' : '' }}
                                        />
                                    </label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

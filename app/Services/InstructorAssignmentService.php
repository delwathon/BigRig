<?php

namespace App\Services;

use App\Models\RoleCourse;

class InstructorAssignmentService
{
    /**
     * Get eligible instructor roles for a specific course
     * @param int $courseId
     * @return array
     */
    public function getEligibleInstructorRoles($courseId)
    {
        // Get role IDs that can teach this specific course
        $roleIds = RoleCourse::where('course_id', $courseId)
            ->pluck('role_id')
            ->toArray();

        return $roleIds;
    }
}

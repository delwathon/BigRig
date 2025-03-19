<?php

namespace App\Services;

use App\Models\RoleCourse;

class InstructorAssignmentService
{
    public function getEligibleInstructorRoles(): array
    {
        $eligibleInstructor = RoleCourse::select('course_id as course', 'role_id')
            ->get()
            ->groupBy('course')
            ->map(fn($roles) => $roles->pluck('role_id')->toArray())
            ->toArray();
        
        return $eligibleInstructor;
    }
}


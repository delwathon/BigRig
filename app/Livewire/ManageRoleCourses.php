<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TrainingObjective;
use App\Models\Role;
use App\Models\RoleCourse;

class ManageRoleCourses extends Component
{
    public $roleId;
    public $selectedCourses = [];

    protected $listeners = ['refreshCourses' => '$refresh'];

    public function mount($roleId)
    {
        $this->roleId = $roleId;
        $this->selectedCourses = RoleCourse::where('role_id', $roleId)->pluck('course_id')->toArray();
    }

    public function toggleCourse($courseId)
    {
        if (in_array($courseId, $this->selectedCourses)) {
            RoleCourse::where('role_id', $this->roleId)->where('course_id', $courseId)->delete();
        } else {
            RoleCourse::create([
                'role_id' => $this->roleId,
                'course_id' => $courseId,
            ]);
        }

        $this->selectedCourses = RoleCourse::where('role_id', $this->roleId)->pluck('course_id')->toArray();
        $this->dispatch('refreshPermissions'); // Update permission table
    }

    public function render()
    {
        return view('livewire.manage-role-courses', [
            'courses' => TrainingObjective::all(),
        ]);
    }
}

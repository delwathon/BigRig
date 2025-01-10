<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\TrainingObjective;

class CourseController extends Controller
{
    public function index()
    {
        // Retrieve all training objectives in a specific order (e.g., by `id`)
        $objectives = TrainingObjective::orderBy('price', 'asc')->get();

        $jobs = Job::paginate(10);
        return view('pages/course/index', compact('objectives', 'jobs'));  
    }

    public function show($id)
    {
        $objective = TrainingObjective::findOrFail($id);

        return view('pages/course/course-details', compact('objective'));
    }
}

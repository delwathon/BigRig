<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TrainingObjective;
use App\Models\TrainingSchedule;
use App\Models\Curriculum;
use App\Models\Instructors;
use App\Models\EnrolmentBatches;

class TrainingScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all training objectives in a specific order (e.g., by `id`)
        $objectives = TrainingObjective::orderBy('price', 'asc')->get();
        $instructors = Instructors::orderBy('id', 'asc')->get();
        $schedules = TrainingSchedule::with(['instructor', 'objective', 'curriculum'])->orderBy('schedule_date', 'asc')->paginate(10);
        $batches = EnrolmentBatches::orderBy('id', 'asc')->get();
        // $schedules = TrainingSchedule::paginate(10);

        return view('pages/schedule/index', compact('objectives', 'instructors', 'schedules', 'batches'));  
    }

    public function getTopics($id)
    {
        // Fetch topics where objective_id matches the selected course ID
        $topics = Curriculum::where('objective_id', $id)->orderBy('id', 'asc')->get(['id', 'topic']);
        
        // Return the topics as JSON
        return response()->json($topics);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'instructor_id.*' => 'required|exists:instructors,id',
            'objective_id.*' => 'required|exists:training_objectives,id',
            'curriculum_id.*' => 'required|exists:curriculum,id',
            'schedule_date.*' => 'required|date',
            // 'time_start.*' => 'required|date_format:h:i A',
            // 'time_stop.*' => 'required|date_format:h:i A|after:time_start.*',
        ]);

        $instructors = $request->input('instructor_id');
        $courses = $request->input('objective_id');
        $topics = $request->input('curriculum_id');
        $dates = $request->input('schedule_date');
        $timeStarts = $request->input('time_start');
        $timeStops = $request->input('time_stop');

        // Validate each schedule for conflicts
        for ($i = 0; $i < count($courses); $i++) {
            $formattedDate = Carbon::createFromFormat('M d, Y', $dates[$i])->format('Y-m-d');
            $formattedTimeStart = Carbon::createFromFormat('h:i A', $timeStarts[$i])->format('H:i');
            $formattedTimeStop = Carbon::createFromFormat('h:i A', $timeStops[$i])->format('H:i');

            // Check for existing schedule conflict
            $existingSchedule = TrainingSchedule::where('instructor_id', $instructors[$i])
                ->where('schedule_date', $formattedDate)
                ->where(function ($query) use ($formattedTimeStart, $formattedTimeStop) {
                    $query->whereBetween('time_start', [$formattedTimeStart, $formattedTimeStop])
                        ->orWhereBetween('time_stop', [$formattedTimeStart, $formattedTimeStop])
                        ->orWhere(function ($query) use ($formattedTimeStart, $formattedTimeStop) {
                            $query->where('time_start', '<=', $formattedTimeStart)
                                    ->where('time_stop', '>=', $formattedTimeStop);
                        });
                })
                ->exists();

            if ($existingSchedule) {
                return redirect()->back()->withErrors([
                    'error' => "Instructor ID {$instructors[$i]} already has a schedule conflict on {$dates[$i]} from {$timeStarts[$i]} to {$timeStops[$i]}."
                ]);
            }
        }

        // Save the schedules if no conflicts are found
        for ($i = 0; $i < count($courses); $i++) {
            $formattedDate = Carbon::createFromFormat('M d, Y', $dates[$i])->format('Y-m-d');
            $formattedTimeStart = Carbon::createFromFormat('h:i A', $timeStarts[$i])->format('H:i');
            $formattedTimeStop = Carbon::createFromFormat('h:i A', $timeStops[$i])->format('H:i');
            
            TrainingSchedule::create([
                'instructor_id' => $instructors[$i],
                'objective_id' => $courses[$i],
                'curriculum_id' => $topics[$i],
                'schedule_date' => $formattedDate,
                'time_start' => $formattedTimeStart,
                'time_stop' => $formattedTimeStop,
            ]);
        }

        return redirect()->back()->with('success', 'Training schedule added successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

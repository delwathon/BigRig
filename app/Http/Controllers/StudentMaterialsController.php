<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Subscription;
use App\Models\CourseMaterial;
use App\Models\TrainingObjective;

class StudentMaterialsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get student's active subscription
        $subscription = Subscription::where('user_id', $user->id)
            ->where('payment_status', 'completed')
            ->latest()
            ->first();

        $materials = collect();
        $enrolledCourses = collect();

        if ($subscription) {
            $enrolledCourses = $subscription->objectives;
            $courseIds = $enrolledCourses->pluck('id');

            // Get materials with the objective relationship
            $materials = CourseMaterial::whereIn('objective_id', $courseIds)
                ->with('objective') // Eager load the relationship
                ->latest()
                ->paginate(20);

            // Add course name to each material for display
            $materials->getCollection()->transform(function($material) use ($enrolledCourses) {
                // Use the relationship if it exists, otherwise find from collection
                if ($material->objective) {
                    $material->course_name = $material->objective->objective;
                } else {
                    $course = $enrolledCourses->where('id', $material->objective_id)->first();
                    $material->course_name = $course ? $course->objective : 'Unknown Course';
                }
                return $material;
            });
        }

        return view('student.materials', compact('materials', 'enrolledCourses'));
    }

    public function download($id)
    {
        $user = Auth::user();
        $material = CourseMaterial::findOrFail($id);

        // Verify student has access to this material
        $subscription = Subscription::where('user_id', $user->id)
            ->where('payment_status', 'completed')
            ->latest()
            ->first();

        if (!$subscription) {
            abort(403, 'Unauthorized access');
        }

        $courseIds = $subscription->objectives->pluck('id')->toArray();

        if (!in_array($material->objective_id, $courseIds)) {
            abort(403, 'You do not have access to this material');
        }

        $filePath = storage_path('app/public/' . $material->file_url);

        if (file_exists($filePath)) {
            // Track download (optional)
            // MaterialDownload::create([
            //     'material_id' => $material->id,
            //     'user_id' => $user->id,
            //     'downloaded_at' => now()
            // ]);

            return response()->download($filePath, $material->file_name);
        }

        return redirect()->back()->with('error', 'File not found.');
    }
}

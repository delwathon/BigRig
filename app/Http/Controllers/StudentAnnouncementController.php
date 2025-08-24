<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;
use App\Models\Subscription;

class StudentAnnouncementController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get student's enrolled courses
        $subscription = Subscription::where('user_id', $user->id)
            ->where('payment_status', 'completed')
            ->latest()
            ->first();

        $enrolledCourseIds = [];
        if ($subscription) {
            $enrolledCourseIds = $subscription->objectives->pluck('id')->toArray();
        }

        // Get announcements
        $announcements = Announcement::where('is_active', true)
            ->where(function($query) use ($user) {
                $query->whereNull('batch_id')
                      ->orWhere('batch_id', $user->enrolment_batch_id);
            })
            ->where(function($query) use ($enrolledCourseIds) {
                $query->whereNull('course_id')
                      ->orWhereIn('course_id', $enrolledCourseIds);
            })
            ->where(function($query) {
                $query->whereNull('publish_date')
                      ->orWhere('publish_date', '<=', now());
            })
            ->where(function($query) {
                $query->whereNull('expiry_date')
                      ->orWhere('expiry_date', '>=', now());
            })
            ->with(['course', 'batch', 'creator'])
            ->orderBy('priority', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Mark announcements as read
        foreach ($announcements as $announcement) {
            if (!$announcement->isReadBy($user->id)) {
                $announcement->markAsReadBy($user->id);
            }
            $announcement->is_read = true; // For display purposes
        }

        return view('student.announcements', compact('announcements'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $announcement = Announcement::findOrFail($id);

        // Mark as read
        if (!$announcement->isReadBy($user->id)) {
            $announcement->markAsReadBy($user->id);
        }

        return view('student.announcement-detail', compact('announcement'));
    }
}

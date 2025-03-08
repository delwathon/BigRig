<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DataFeed;
use App\Models\User;
use App\Models\Subscription;
use App\Models\TrainingObjective;
use App\Models\TrainingSchedule;
use App\Models\Curriculum;
use App\Models\Instructors;

class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        // Check subscription payment status
        $subscription = Subscription::where('user_id', $user->id)->first();

        if ($subscription && $subscription->payment_status === 'pending') {
            // Redirect to checkout/pay if payment is still pending
            return redirect('/checkout/pay');
        }

        $dataFeed = new DataFeed();

        // Get the number of active users
        $activeUsers = User::where('user_visibility', 1)
            ->where('role_id', 11)
            ->count();

        // Get the number of users created today
        $today = Carbon::today();
        $usersToday = User::whereDate('updated_at', $today)->count();

        // Get the number of users created yesterday
        $yesterday = Carbon::yesterday();
        $usersYesterday = User::whereDate('updated_at', $yesterday)->count();

        // Calculate the percentage increase between yesterday and today for users
        $userPI = 0;
        if ($usersYesterday > 0) {
            $userPI = (($usersToday - $usersYesterday) / $usersYesterday) * 100;
        }
        
        // Get all revenue
        $revenue = Subscription::where('payment_status', 'completed')
            ->sum('total_amount');

        // Sum of total_amount for subscriptions where payment_status is completed today
        $revenueToday = Subscription::where('payment_status', 'completed')
            ->whereDate('updated_at', $today)
            ->sum('total_amount');

        // Sum of total_amount for subscriptions where payment_status is completed yesterday
        $revenueYesterday = Subscription::where('payment_status', 'completed')
            ->whereDate('updated_at', $yesterday)
            ->sum('total_amount');

        // Calculate the percentage increase in total_amount between yesterday and today
        $revenuePI = 0;
        if ($revenueYesterday > 0) {
            $revenuePI = (($revenueToday - $revenueYesterday) / $revenueYesterday) * 100;
        }

        $schedules = TrainingSchedule::with(['instructor', 'objective', 'curriculum'])->orderBy('schedule_date', 'asc')->paginate(10);

        return view('pages/dashboard/dashboard', compact('dataFeed', 'activeUsers', 'userPI', 'revenue', 'revenuePI', 'schedules'));
    }

    /**
     * Displays the analytics screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function analytics()
    {
        return view('pages/dashboard/analytics');
    }

    /**
     * Displays the fintech screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function fintech()
    {
        return view('pages/dashboard/fintech');
    }
}

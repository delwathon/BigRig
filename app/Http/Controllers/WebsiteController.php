<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Settings;
use App\Models\Slider;
use App\Models\Founder;
use App\Models\Services;
use App\Models\Clients;
use App\Models\AboutCompany;
use App\Models\TrainingObjective;
use App\Models\Achievements;
use App\Models\Faqs;
use App\Models\User;
use App\Models\Testimonials;
use App\Models\EmailSubscription;

class WebsiteController extends Controller
{
    public function index()
    {
        $site = Settings::first();
        $sliders = Slider::orderBy('id', 'asc')->get();
        $founder = Founder::first();
        $services = Services::orderBy('id', 'asc')->get();
        $clients = Clients::where('type', 'client')->get();
        $partners = Clients::where('type', 'partner')->get();
        $about = AboutCompany::first();
        $objectives = TrainingObjective::orderBy('price', 'asc')->get();
        $truck = TrainingObjective::where('objective', 'like', '%truck%')->first();
        $testimonials = Testimonials::where('website_visibility', true)->paginate(10);
        $instructors = User::with('roles')
                        ->where('user_active', 1)
                        ->where('website_visibility', 1)
                        ->whereHas('roles', function ($query) {
                            $query->where('roles.id', '!=', 10);
                        })
                        ->take(3)
                        ->get();
    
        return view('index', compact('site', 'sliders', 'founder', 'services', 'clients', 'partners', 'about', 'objectives', 'truck', 'testimonials', 'instructors'));
    }

    public function home()
    {
        $site = Settings::first();
        $sliders = Slider::orderBy('id', 'asc')->get();
        $founder = Founder::first();
        $services = Services::orderBy('id', 'asc')->get();
        $clients = Clients::where('type', 'client')->get();
        $partners = Clients::where('type', 'partner')->get();
        $about = AboutCompany::first();
        $objectives = TrainingObjective::orderBy('price', 'asc')->get();
        $testimonials = Testimonials::where('website_visibility', true)->paginate(10);
    
        return view('home', compact('site', 'sliders', 'founder', 'services', 'clients', 'partners', 'about', 'objectives', 'testimonials'));
    }

    public function about()
    {
        $site = Settings::first();
        $about = AboutCompany::first();
        $founder = Founder::first();
        $achievements = Achievements::orderBy('year', 'desc')->get();
        $instructors = User::with('roles')
                        ->where('user_active', 1)
                        ->where('website_visibility', 1)
                        ->whereHas('roles', function ($query) {
                            $query->where('roles.id', '!=', 10);
                        })
                        ->take(3)
                        ->get();

        return view('about', compact('site', 'about', 'founder', 'achievements', 'instructors'));
    }

    public function instructors()
    {
        $site = Settings::first();
        $about = AboutCompany::first();
        $instructors = User::with('roles')
                        ->where('user_active', 1)
                        ->where('website_visibility', 1)
                        ->whereHas('roles', function ($query) {
                            $query->where('roles.id', '!=', 10);
                        })
                        ->take(3)
                        ->get();

        return view('instructors', compact('site', 'about', 'instructors'));
    }

    public function courses()
    {
        $site = Settings::first();
        $about = AboutCompany::first();
        $objectives = TrainingObjective::orderBy('id', 'asc')->get();

        return view('courses', compact('site', 'about', 'objectives'));
    }

    public function course_details($name)
    {
        $site = Settings::first();
        $about = AboutCompany::first();
        $course = TrainingObjective::whereRaw("LOWER(REPLACE(objective, ' ', '-')) = ?", [Str::slug($name)])->firstOrFail();
        $instructors = User::with('roles')
                        ->where('user_active', 1)
                        ->where('website_visibility', 1)
                        ->whereHas('roles', function ($query) {
                            $query->where('roles.id', '!=', 10);
                        })
                        ->take(3)
                        ->get();

        return view('course-details', compact('site', 'about', 'course', 'instructors'));
    }

    public function faq()
    {
        $site = Settings::first();
        $about = AboutCompany::first();
        $faqs = Faqs::orderBy('id', 'asc')->get();

        return view('faq', compact('site', 'about', 'faqs'));
    }

    public function contact()
    {
        $site = Settings::first();
        $about = AboutCompany::first();
        $objectives = TrainingObjective::orderBy('id', 'asc')->get();

        return view('contact', compact('site', 'about', 'objectives'));
    }

    public function email_subscription(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if email already exists
        if (EmailSubscription::where('email', $request->email)->exists()) {
            return redirect()->back()->with('info', 'You are already subscribed to our newsletter.');
        }

        // Store new subscription
        EmailSubscription::create([
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'You have successfully subscribed to our newsletter.');
    }
}

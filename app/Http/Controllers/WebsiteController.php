<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Slider;
use App\Models\Founder;
use App\Models\Services;
use App\Models\Clients;
use App\Models\AboutCompany;
use App\Models\TrainingObjective;
use App\Models\Achievements;

class WebsiteController extends Controller
{
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

        return view('home', compact('site', 'sliders', 'founder', 'services', 'clients', 'partners', 'about', 'objectives'));
    }

    public function about()
    {
        $site = Settings::first();
        $about = AboutCompany::first();
        $founder = Founder::first();
        $achievements = Achievements::orderBy('year', 'desc')->get();

        return view('about', compact('site', 'about', 'founder', 'achievements'));
    }

    public function courses()
    {
        $site = Settings::first();
        $about = AboutCompany::first();

        return view('courses', compact('site', 'about'));
    }

    public function faq()
    {
        $site = Settings::first();
        $about = AboutCompany::first();

        return view('faq', compact('site', 'about'));
    }

    public function contact()
    {
        $site = Settings::first();
        $about = AboutCompany::first();

        return view('contact', compact('site', 'about'));
    }
}

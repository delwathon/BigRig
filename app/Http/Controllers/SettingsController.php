<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Settings;
use App\Models\TrainingObjective;
use App\Models\Faqs;
use App\Models\Slider;
use App\Models\Founder;
use App\Models\Services;
use App\Models\Clients;
use App\Models\AboutCompany;
use App\Models\Achievements;
use App\Models\EnrolmentBatches;

class SettingsController extends Controller
{    
    /**
     * siteInformationIndex
     *
     * @return void
     */
    public function siteInformationIndex()
    {
        // $settings = Settings::first();
        return view('pages/settings/site_information');  
    }
    
    /**
     * siteInformationUpdate
     *
     * @param  mixed $request
     * @return void
     */
    public function siteInformationUpdate(Request $request)
    {
        $request->validate([
            'dark_theme_logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Max file size 2MB
            'light_theme_logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Max file size 2MB
            'favicon' => 'nullable|mimes:jpg,png,jpeg,ico|max:1024', // Remove 'image'
            'site_name' => 'required|string|max:255',
            'site_tagline' => 'nullable|string',
            'site_description' => 'required|string',
            'site_keywords' => 'required|string',
            'headquarters' => 'required|string',
            'business_email' => 'required|email',
            'secondary_email' => 'nullable|email',
            'business_contact' => 'required|string|max:17',
            'secondary_contact' => 'nullable|string|max:17',
            'facebook_handle' => 'nullable|string',
            'twitter_handle' => 'nullable|string',
            'instagram_handle' => 'nullable|string',
            'youtube_handle' => 'nullable|string',
            'tiktok_handle' => 'nullable|string',
            'linkedin_handle' => 'nullable|string',
        ]);

        $settings = Settings::first(); // Assuming only one settings record exists
        $old_dark_logo = $settings->dark_theme_logo;
        $old_light_logo = $settings->light_theme_logo;
        $old_favicon = $settings->favicon;

        // Handle dark_theme_logo upload
        if ($request->hasFile('dark_theme_logo')) {
            $darkThemeFilePath = $request->file('dark_theme_logo')->store('logo', 'public');
            $settings->dark_theme_logo = $darkThemeFilePath;

            if ($old_dark_logo && Storage::disk('public')->exists($old_dark_logo)) {
                Storage::disk('public')->delete($old_dark_logo);
            }
        }

        // Handle light_theme_logo upload
        if ($request->hasFile('light_theme_logo')) {
            $lightThemeFilePath = $request->file('light_theme_logo')->store('logo', 'public');
            $settings->light_theme_logo = $lightThemeFilePath;

            if ($old_light_logo && Storage::disk('public')->exists($old_light_logo)) {
                Storage::disk('public')->delete($old_light_logo);
            }
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            $faviconFilePath = $request->file('favicon')->store('logo', 'public');
            $settings->favicon = $faviconFilePath;

            if ($old_favicon && Storage::disk('public')->exists($old_favicon)) {
                Storage::disk('public')->delete($old_favicon);
            }
        }

        // Update other fields
        $settings->site_name = $request->input('site_name');
        $settings->site_tagline = $request->input('site_tagline');
        $settings->site_description = $request->input('site_description');
        $settings->site_keywords = $request->input('site_keywords');
        $settings->headquarters = $request->input('headquarters');
        $settings->business_email = $request->input('business_email');
        $settings->secondary_email = $request->input('secondary_email');
        $settings->business_contact = $request->input('business_contact');
        $settings->secondary_contact = $request->input('secondary_contact');
        $settings->facebook_handle = $request->input('facebook_handle');
        $settings->twitter_handle = $request->input('twitter_handle');
        $settings->instagram_handle = $request->input('instagram_handle');
        $settings->youtube_handle = $request->input('youtube_handle');
        $settings->tiktok_handle = $request->input('tiktok_handle');
        $settings->linkedin_handle = $request->input('linkedin_handle');
        // Update other fields as needed

        $settings->save();

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
    
    public function aboutCompanyIndex()
    {
        $about = AboutCompany::first();
        return view('pages/settings/about', compact('about'));  
    }

    /**
     * aboutCompanyUpdate
     *
     * @param  mixed $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function aboutCompanyUpdate(Request $request)
    {
        // Validate the request data
        $request->validate([
            'banner_title' => 'required|string|max:255',
            'banner_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'history_title' => 'required|string|max:255',
            'training_hours' => 'nullable|numeric',
            'company_history' => 'required|string',
            'mission_statement' => 'required|string',
            'students_count' => 'nullable|numeric',
            'years_of_existence' => 'nullable|numeric',
            'instructors_count' => 'nullable|numeric',
            'pass_rate' => 'required|numeric|between:0,100',
        ]);

        // Retrieve the existing record or create a new one
        $aboutCompany = AboutCompany::firstOrCreate([], []);

        // Handle banner picture upload
        if ($request->hasFile('banner_picture')) {
            // Delete old banner picture if exists
            if ($aboutCompany->banner_picture && Storage::disk('public')->exists($aboutCompany->banner_picture)) {
                Storage::disk('public')->delete($aboutCompany->banner_picture);
            }
            $aboutCompany->banner_picture = $request->file('banner_picture')->store('banners', 'public');
        }

        // Update other fields
        $aboutCompany->update([
            'banner_title' => $request->input('banner_title'),
            'history_title' => $request->input('history_title'),
            'training_hours' => $request->input('training_hours'),
            'company_history' => $request->input('company_history'),
            'mission_statement' => $request->input('mission_statement'),
            'students_count' => $request->input('students_count'),
            'years_of_existence' => $request->input('years_of_existence'),
            'instructors_count' => $request->input('instructors_count'),
            'pass_rate' => $request->input('pass_rate'),
        ]);

        return redirect()->back()->with('success', 'About Company information updated successfully!');
    }

    public function trainingObjectiveIndex()
    {
        // Retrieve all training objectives in a specific order (e.g., by `id`)
        $objectives = TrainingObjective::orderBy('price', 'asc')->get();

        // Pass the data to the view
        return view('pages.settings.objectives', compact('objectives'));
    }

    public function trainingObjectiveStore(Request $request)
    {
        $request->validate([
            'objective' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'requirements' => 'required|string',
            'image_url' => 'required|image|mimes:jpg,png,jpeg|max:2048', // Max file size 2MB
        ]);

        // Handle image_url upload
        if ($request->hasFile('image_url')) {
            $filePath = $request->file('image_url')->store('objectives', 'public');
        }

        TrainingObjective::create([
            'objective' => $request->input('objective'),
            'price' => $request->input('price'),
            'duration' => $request->input('duration'),
            'requirement' => $request->input('requirements'),
            'image_url' => $filePath,
        ]);            

        return redirect()->back()->with('success', 'Objective created successfully.');
    }

    public function trainingObjectiveUpdate(Request $request)
    {
        $request->validate(
            [
                'id' => 'required|exists:training_objectives,id',
                'objective' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'duration' => 'required|integer|min:1',
                'requirements' => 'required|string',
                'image_url' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional
            ],
            [
                'image_url.image' => 'The uploaded file must be an image.',
                'image_url.mimes' => 'Only JPG and PNG file types are allowed.',
                'image_url.max' => 'The image size must not exceed 2 MB.',
            ]
        );

        $objective = TrainingObjective::findOrFail($request->input('id'));

        // Update fields
        $objective->objective = $request->input('objective');
        $objective->price = $request->input('price');
        $objective->duration = $request->input('duration');
        $objective->requirement = $request->input('requirements');

        // Handle image upload
        if ($request->hasFile('image_url')) {
            $oldImagePath = $objective->image_url;
            $filePath = $request->file('image_url')->store('objectives', 'public');

            $objective->image_url = $filePath;

            if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }
        }

        $objective->save();

        return redirect()->back()->with('success', 'Objective updated successfully!');
    }

    public function trainingObjectiveDestroy($id)
    {
        $objective = TrainingObjective::findOrFail($id);
        $filePath = $objective->image_url;
        $objective->delete();

        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }

        return redirect()->back()->with('success', 'Objective deleted successfully.');
    }

    public function faqsIndex()
    {
        $faqs = Faqs::orderBy('id', 'asc')->simplePaginate(8);
        return view('pages/settings/faqs', compact('faqs'));  
    }

    public function faqsStore(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faqs::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
        ]);            

        return redirect()->back()->with('success', 'Faq created successfully.');
    }

    public function faqsUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:faqs,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = Faqs::findOrFail($request->id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return redirect()->back()->with('success', 'FAQ updated successfully.');
    }

    public function faqsDestroy($id)
    {
        $faq = Faqs::findOrFail($id);
        $faq->delete();

        return redirect()->back()->with('success', 'FAQ deleted successfully.');
    }

    public function slidersIndex()
    {
        $sliders = Slider::orderBy('id', 'asc')->get();
        $sliders = Slider::simplePaginate(5);
        return view('pages/settings/sliders', compact('sliders'));  
    }

    public function slidersStore(Request $request)
    {
        $request->validate([
            'slider_title' => 'required|string|max:255',
            'slider_text' => 'required|string|max:255',
            'button_name' => 'nullable|string|max:20',
            'button_url' => 'nullable|string|max:2048', // Ensure valid URL format
            'image_url' => 'required|image|mimes:jpg,png,jpeg|max:2048', // Ensure image is uploaded
        ]);        

        // Handle image_url upload
        if ($request->hasFile('image_url')) {
            $filePath = $request->file('image_url')->store('sliders', 'public');
        }

        Slider::create([
            'title' => $request->input('slider_title'),
            'text' => $request->input('slider_text'),
            'button_name' => $request->input('button_name'),
            'button_url' => $request->input('button_url'),
            'image_url' => $filePath,
        ]);            

        return redirect()->back()->with('success', 'Slider created successfully.');
    }

    public function slidersDestroy($id)
    {
        $slider = Slider::findOrFail($id);
        $filePath = $slider->image_url;
        $slider->delete();

        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
        return redirect()->back()->with('success', 'Slider deleted successfully.');
    }

    public function founderIndex()
    {
        $founder = Founder::first();
        return view('pages/settings/founder', compact('founder'));  
    }

    public function founderUpdate(Request $request)
    {
        $request->validate([
            'founder_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Max file size 2MB
            'secondary_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Max file size 2MB
            'signature' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Max file size 2MB
            'founder_name' => 'required|string|max:255',
            'speech_title' => 'required|string|max:255',
            'speech_content' => 'required|string',
            'facebook_handle' => 'nullable|string',
            'twitter_handle' => 'nullable|string',
            'linkedin_handle' => 'nullable|string',
            'instagram_handle' => 'nullable|string',
        ]);

        $founder = Founder::first(); // Assuming only one settings record exists

        // Handle founder_picture upload
        if ($request->hasFile('founder_picture')) {
            $old_founder_picture = $founder->founder_picture;
            $founder_picture_filePath = $request->file('founder_picture')->store('founder', 'public');
            $founder->founder_picture = $founder_picture_filePath;

            if ($old_founder_picture && Storage::disk('public')->exists($old_founder_picture)) {
                Storage::disk('public')->delete($old_founder_picture);
            }
        }

        // Handle secondary_picture upload
        if ($request->hasFile('secondary_picture')) {
            $old_secondary_picture = $founder->secondary_picture;
            $secondary_picture_filePath = $request->file('secondary_picture')->store('founder', 'public');
            $founder->secondary_picture = $secondary_picture_filePath;

            if ($old_secondary_picture && Storage::disk('public')->exists($old_secondary_picture)) {
                Storage::disk('public')->delete($old_secondary_picture);
            }
        }

        // Handle signature upload
        if ($request->hasFile('signature')) {
            $old_signature = $founder->signature;
            $signature_filePath = $request->file('signature')->store('founder', 'public');
            $founder->signature = $signature_filePath;

            if ($old_signature && Storage::disk('public')->exists($old_signature)) {
                Storage::disk('public')->delete($old_signature);
            }
        }

        // Update other fields
        $founder->founder_name = $request->input('founder_name');
        $founder->speech_title = $request->input('speech_title');
        $founder->speech_content = $request->input('speech_content');
        $founder->facebook_handle = $request->input('facebook_handle');
        $founder->twitter_handle = $request->input('twitter_handle');
        $founder->linkedin_handle = $request->input('linkedin_handle');
        $founder->instagram_handle = $request->input('instagram_handle');
        // Update other fields as needed

        $founder->save();

        return redirect()->back()->with('success', 'Founder speech updated successfully!');
    }

    public function customServicesIndex()
    {
        $services = Services::orderBy('id', 'asc')->get();
        $services = Services::simplePaginate(8);
        return view('pages/settings/services', compact('services'));  
    }

    public function customServicesStore(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'service_description' => 'required|string',
            'service_picture' => 'required|image|mimes:jpg,png,jpeg|max:2048', // Max file size 2MB
        ]);

        // Handle service_picture upload
        if ($request->hasFile('service_picture')) {
            $filePath = $request->file('service_picture')->store('custom-services', 'public');
        }

        Services::create([
            'service_name' => $request->input('service_name'),
            'service_description' => $request->input('service_description'),
            'service_picture' => $filePath,
        ]);            

        return redirect()->back()->with('success', 'Custom service created successfully.');
    }

    public function customServicesUpdate(Request $request)
    {
        $request->validate(
            [
                'id' => 'required|exists:services,id',
                'service_name' => 'required|string|max:255',
                'service_description' => 'required|string',
                'service_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Optional
            ],
            [
                'service_picture.image' => 'The uploaded file must be an image.',
                'service_picture.mimes' => 'Only JPG and PNG file types are allowed.',
                'service_picture.max' => 'The image size must not exceed 2 MB.',
            ]
        );

        $service = Services::findOrFail($request->input('id'));

        // Update fields
        $service->service_name = $request->input('service_name');
        $service->service_description = $request->input('service_description');

        // Handle image upload
        if ($request->hasFile('service_picture')) {
            $oldImagePath = $service->service_picture;
            $filePath = $request->file('service_picture')->store('custom-services', 'public');

            $service->service_picture = $filePath;

            if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }
        }

        $service->save();

        return redirect()->back()->with('success', 'Custom service updated successfully!');
    }

    public function customServicesDestroy($id)
    {
        $service = Services::findOrFail($id);
        $filePath = $service->service_picture;
        $service->delete();

        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
        return redirect()->back()->with('success', 'Service deleted successfully.');
    }

    public function clientsIndex()
    {
        $clients = Clients::where('type', 'client')->orderBy('name', 'asc')->simplePaginate(8);
        $partners = Clients::where('type', 'partner')->orderBy('name', 'asc')->simplePaginate(8);

        return view('pages/settings/clients', compact('clients', 'partners'));
    }

    public function clientsStore(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'type' => 'required|string|in:client,partner',
            'client_logo' => 'required_if:type,client|nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        
        $filePath = null;
        
        if ($request->hasFile('client_logo')) {
            $filePath = $request->file('client_logo')->store('clients', 'public');
        }
        
        Clients::create([
            'name' => $request->input('client_name'),
            'type' => $request->input('type'),
            'logo' => $filePath, // Will be null if no file is uploaded
        ]);
                    

        return redirect()->back()->with('success', 'Custom service created successfully.');
    }

    public function clientsDestroy($id)
    {
        $client = Clients::findOrFail($id);
        $filePath = $client->logo;
        $client->delete();

        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
        return redirect()->back()->with('success', 'Service deleted successfully.');
    }

    public function achievementsIndex()
    {
        $achievements = Achievements::orderBy('year', 'desc')->simplePaginate(5);

        return view('pages/settings/achievements', compact('achievements'));
    }

    public function achievementsStore(Request $request)
    {
        // Validate the request data
        $request->validate([
            'year' => 'required|numeric|min:1900|max:' . date('Y'),
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'picture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $filePath = null;

        // Handle banner picture upload
        if ($request->hasFile('picture')) {
            $filePath = $request->file('picture')->store('achievements', 'public');
        }

        // Update other fields
        Achievements::create([
            'year' => $request->input('year'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'picture' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Achievement created successfully!');
    }

    public function achievementsUpdate(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id' => 'required|exists:achievements,id',
            'year' => 'required|numeric|min:1900|max:' . date('Y'),
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $achievement = Achievements::findOrFail($request->id);

        // Handle banner picture upload
        if ($request->hasFile('picture')) {
            // Delete old picture if exists
            if ($achievement->picture && Storage::disk('public')->exists($achievement->picture)) {
                Storage::disk('public')->delete($achievement->picture);
            }
            $achievement->picture = $request->file('picture')->store('achievements', 'public');
        }

        // Update other fields
        $achievement->update([
            'year' => $request->input('year'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->back()->with('success', 'Achievement updated successfully!');
    }

    public function enrolmentBatchIndex()
    {
        $batches = EnrolmentBatches::orderBy('id', 'asc')->simplePaginate(8);
        
        return view('pages/settings/enrolment-batch', compact('batches'));
    }

    public function enrolmentBatchStore(Request $request)
    {
        $request->validate([
            'batch_name' => 'required|string|max:255',
            'commencement_date' => 'required|date',
        ]);
        
        $formattedDate = Carbon::createFromFormat('M d, Y', $request->input('commencement_date'))->format('Y-m-d');

        EnrolmentBatches::create([
            'batch_name' => $request->input('batch_name'),
            'c_date' => $formattedDate,
        ]);
                    

        return redirect()->back()->with('success', 'Enrolment batch created successfully.');
    }

    public function enrolmentBatchDestroy($id)
    {
        $enrolment_batch = EnrolmentBatches::findOrFail($id);
        $enrolment_batch->delete();

        return redirect()->back()->with('success', 'Enrolment batch deleted successfully.');
    }

}
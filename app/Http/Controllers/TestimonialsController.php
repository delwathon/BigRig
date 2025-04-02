<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Testimonials;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonials::paginate(10);

        return view('pages.testimonials.index', compact(['testimonials']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'testimony' => 'required|string',
            'image_url' => 'sometimes|image|mimes:jpg,png,jpeg|max:2048', // Max file size 2MB
        ],
        [
            'image_url.image' => 'Display Picture: The uploaded file must be an image.',
            'image_url.mimes' => 'Display Picture: Only JPG and PNG file types are allowed.',
            'image_url.max' => 'Display Picture: The image size must not exceed 2 MB.',
        ]);

        // Handle image_url upload
        $filePath = null;
        if ($request->hasFile('image_url')) {
            $filePath = $request->file('image_url')->store('testimonials', 'public');
        }

        Testimonials::create([
            'full_name' => $request->input('full_name'),
            'rating' => $request->input('rating'),
            'testimony' => $request->input('testimony'),
            'image_url' => $filePath,
        ]);            

        return redirect()->back()->with('success', 'Testimony created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonials $testimonials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonials $testimonials)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonials $testimonials)
    {
        $request->validate([
            'id' => 'required|exists:testimonials,id',
            'full_name' => 'required|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'testimony' => 'required|string',
            'image_url' => 'sometimes|image|mimes:jpg,png,jpeg|max:2048', // Max file size 2MB
        ],
        [
            'image_url.image' => 'Display Picture: The uploaded file must be an image.',
            'image_url.mimes' => 'Display Picture: Only JPG and PNG file types are allowed.',
            'image_url.max' => 'Display Picture: The image size must not exceed 2 MB.',
        ]);

        $testimonial = Testimonials::findOrFail($request->input('id'));

        // Update fields
        $testimonial->full_name = $request->input('full_name');
        $testimonial->rating = $request->input('rating');
        $testimonial->testimony = $request->input('testimony');

        // Handle image upload
        if ($request->hasFile('image_url')) {
            $oldImagePath = $testimonial->image_url;
            $filePath = $request->file('image_url')->store('testimonials', 'public');

            $testimonial->image_url = $filePath;

            if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }
        }

        $testimonial->save();

        return redirect()->back()->with('success', 'Testimony updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimony = Testimonials::findOrFail($id);
        $filePath = $testimony->image_url;
        $testimony->delete();

        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }

        return redirect()->back()->with('success', 'Testimony deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\EmailSubscription;
use Illuminate\Http\Request;

class EmailSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribers = EmailSubscription::paginate(50);

        return view('pages.newsletter.index', compact(['subscribers']));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailSubscription $emailSubscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailSubscription $emailSubscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailSubscription $emailSubscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailSubscription $emailSubscription)
    {
        //
    }
}

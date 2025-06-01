<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->hasPermission('read_revoked_user')) {
            $instructors = User::with('roles')
                ->whereHas('roles', function ($query) {
                    $query->where('roles.id', '!=', 10); // Exclude users with role_id = 10
                })
                ->orderBy('firstName', 'asc')
                ->paginate(10);
        } else {
            $instructors = User::with('roles')
                ->where('user_active', 1)
                ->whereHas('roles', function ($query) {
                    $query->where('roles.id', '!=', 10);
                })
                ->orderBy('firstName', 'asc')
                ->paginate(10);
        }

        $instructors_count = $instructors->count();
        $roles = Role::where('id', '!=', 10)->orderBy('role_name', 'asc')->get();

        return view('pages/instructor/index', compact('instructors', 'instructors_count', 'roles'));
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
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'gender' => ['required', 'string', 'in:Male,Female'],
            'mobileNumber' => ['required', 'string', 'max:17', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'userRole' => 'required|array',
            'userRole.*' => 'exists:roles,id',
            'profile_photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $filePath = null;

        if ($request->hasFile('profile_photo')) {
            $filePath = $request->file('profile_photo')->store('users', 'public');
        }

        // Create the user without role_id
        $user = User::create([
            'firstName' => $request->input('firstName'),
            'middleName' => $request->input('middleName'),
            'lastName' => $request->input('lastName'),
            'gender' => $request->input('gender'),
            'mobileNumber' => $request->input('mobileNumber'),
            'email' => $request->input('email'),
            'password' => Hash::make('12345678'),
            'profile_photo_path' => $filePath,
            'user_active' => 1,
        ]);

        // Attach roles using the pivot table
        $user->roles()->attach($request->input('userRole'));

        return redirect()->back()->with('success', 'Instructor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Role;

class UserController extends Controller
{
    public function indexTabs()
    {
        $users = User::paginate(8);
        return view('pages/community/users-tabs', compact('users'));  
    }

    public function indexTiles()
    {
        // if (!Auth::user()->hasPermission('read_users_page')) {
        //     return redirect()->back()->with('error', 'Permission denied!');
        // }

        $user = Auth::user();

        // Check subscription payment status
        $subscription = Subscription::where('user_id', $user->id)->first();

        if ($subscription && $subscription->payment_status === 'pending') {
            // Redirect to checkout/pay if payment is still pending
            return redirect('/checkout/pay');
        }

        $users = User::where('user_visibility', 1)
                ->where('role_id', 2)
                ->paginate(9);
        return view('pages/community/users-tiles', compact('users'));
    }

    public function userProfile() {
        $userInfo = Auth::user();

        return view('pages/community/profile', compact('userInfo'));
    }

    public function makeAdmin(Request $request)
    {
        // Find User
        $user = User::findOrFail($request->input('id'));

        dd($user);

        // Find the 'Admin' role
        $adminRole = Role::where('name', 'Admin')->first();

        if (!$adminRole) {
            return redirect()->back()->with('error', 'Admin role not found!');
        }

        // Assign the 'Admin' role to the user
        $user->role()->associate($adminRole);
        $user->save();

        return redirect()->back()->with('success', 'User updated to Admin!');
    }
}

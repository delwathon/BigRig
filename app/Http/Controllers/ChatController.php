<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChatController extends Controller
{
    public function chatIndex()
    {
        $users = User::where('user_visibility', 1)
            ->where('id', '!=', Auth::user()->id)
            ->get();
        return view('pages/messages', compact('users'));  
    }
}

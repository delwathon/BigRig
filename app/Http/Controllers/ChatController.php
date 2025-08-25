<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChatController extends Controller
{
    public function chatIndex()
    {
        return view('pages.messages'); // No need to pass users anymore
    }
}

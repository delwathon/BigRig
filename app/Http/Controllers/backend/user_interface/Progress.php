<?php

namespace App\Http\Controllers\user_interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Progress extends Controller
{
  public function index()
  {
    return view('backend.content.user-interface.ui-progress');
  }
}

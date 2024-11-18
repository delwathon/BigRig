<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Contact extends Controller
{
  public function index()
  {
    return view('frontend.contact');
  }
}

<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithoutNavbar extends Controller
{
  public function index()
  {
    return view('backend.content.layouts-example.layouts-without-navbar');
  }
}

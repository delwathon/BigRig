<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Blank extends Controller
{
  public function index()
  {
    return view('backend.content.layouts-example.layouts-blank');
  }
}

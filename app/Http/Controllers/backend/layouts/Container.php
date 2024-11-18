<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Container extends Controller
{
  public function index()
  {
    return view('backend.content.layouts-example.layouts-container');
  }
}

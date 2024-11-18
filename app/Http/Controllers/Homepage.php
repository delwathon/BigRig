<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Homepage extends Controller
{
  public function index()
  {
    return view('frontend.index');
  }
}

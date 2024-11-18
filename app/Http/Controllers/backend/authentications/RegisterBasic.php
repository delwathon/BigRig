<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterBasic extends Controller
{
  public function index()
  {
    return view('backend.content.authentications.auth-register');
  }
}

<?php

namespace App\Http\Controllers\form_elements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InputGroups extends Controller
{
  public function index()
  {
    return view('backend.content.form-elements.forms-input-groups');
  }
}

<?php

namespace App\Http\Controllers\extended_ui;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextDivider extends Controller
{
  public function index()
  {
    return view('backend.content.extended-ui.extended-ui-text-divider');
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('id', 'asc')->paginate(10);
        return view('pages/roles/roles', compact('roles'));  
    }
}

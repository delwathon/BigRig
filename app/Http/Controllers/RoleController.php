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

    public function roleStore(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|max:255',
            'role_description' => 'nullable|string|max:255'
        ]);
        
        Role::create([
            'role_name' => $request->input('role_name'),
            'role_description' => $request->input('role_description')
        ]);            

        return redirect()->back()->with('success', 'User role created successfully.');
    }

    public function roleDestroy($id)
    {
        $role = Role::findOrFail($id);

        // Delete related role_permissions before deleting the role
        $role->rolePermissions()->delete();

        $role->delete();

        return redirect()->back()->with('success', 'User role deleted successfully.');
    }

}

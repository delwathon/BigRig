<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;
use App\Models\Role;

class ManageRolePermissions extends Component
{
    public $roleId; // ID of the role being managed
    public $permissions = []; // List of permissions with actions

    public function mount($roleId)
    {
        $this->roleId = $roleId;
        $this->loadPermissions();
    }

    public function loadPermissions()
    {
        $role = Role::find($this->roleId);

        $this->permissions = Permission::all()->map(function ($permission) use ($role) {
            return [
                'id' => $permission->id,
                'name' => $permission->name,
                'actions' => collect(['create', 'read', 'update', 'delete'])->map(function ($action) use ($permission, $role) {
                    $hasPermission = $role->permissions()
                        ->where('permission_id', $permission->id)
                        ->where('action', $action)
                        ->exists();

                    return [
                        'id' => $permission->id . '_' . $action,
                        'action' => $action,
                        'checked' => $hasPermission,
                    ];
                }),
            ];
        })->toArray();
    }

    public function togglePermission($permissionId, $action)
    {
        $role = Role::find($this->roleId);

        // Check if permission already exists
        $exists = $role->permissions()
            ->where('permission_id', $permissionId)
            ->where('action', $action)
            ->exists();

        if ($exists) {
            // Remove the permission
            $role->permissions()->wherePivot('action', $action)->detach($permissionId);
        } else {
            // Add the permission
            $role->permissions()->attach($permissionId, ['action' => $action]);
        }

        // Refresh the permissions data
        $this->loadPermissions();
    }

    public function render()
    {
        return view('livewire.manage-role-permissions');
    }
}

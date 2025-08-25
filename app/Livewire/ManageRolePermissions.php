<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;

class ManageRolePermissions extends Component
{
    public $roleId;
    public $permissions;
    public $roleName;

    public function mount($roleId)
    {
        $this->roleId = $roleId;
        $this->loadPermissions();
    }

    public function loadPermissions()
    {
        $rawPermissions = Permission::orderBy('name', 'asc')->get();
        $rolePermissions = RolePermission::where('role_id', $this->roleId)
            ->pluck('permission_id')
            ->toArray();
        $this->roleName = Role::find($this->roleId)->role_name;

        $groupedPermissions = [];

        foreach ($rawPermissions as $permission) {
            [$action, $entity] = explode('_', $permission->name, 2);

            if (!isset($groupedPermissions[$entity])) {
                $groupedPermissions[$entity] = [
                    'name' => ucfirst(str_replace('_', ' ', $entity)),
                    'actions' => [],
                ];
            }

            $groupedPermissions[$entity]['actions'][] = [
                'action' => $action,
                'id' => $permission->id,
                'checked' => in_array($permission->id, $rolePermissions),
            ];
        }

        // Sort grouped permissions by 'name' (entity name)
        usort($groupedPermissions, function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        $this->permissions = $groupedPermissions;
    }

    public function render()
    {
        return view('livewire.manage-role-permissions', [
            'permissions' => $this->permissions,
            'roleId' => $this->roleId,
            'roleName' => $this->roleName,
        ]);
    }
}

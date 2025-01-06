<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $superRole = Role::create(['name' => 'SuperAdmin', 'description' => 'Organization owner, inherits all privileges to the platform without limitation.']);
        $adminRole = Role::create(['name' => 'Admin', 'description' => 'The one who oversees the entire affair of the organization in representation of the organization owner.']);
        $instructorRole = Role::create(['name' => 'Instructor', 'description' => 'The ones who trains the students their subscribed courses.']);
        $studentRole = Role::create(['name' => 'Student', 'description' => 'These are the students who enrolled for trainings.']);

        $permissions = ['create', 'edit', 'delete', 'view'];

        foreach ($permissions as $permission) {
            $perm = Permission::create(['name' => $permission]);
            $superRole->permissions()->attach($perm); // Assign all permissions to SuperAdmin
        }

        // Assign 'view' permission to User
        // $userRole->permissions()->attach(Permission::where('name', 'view')->first());
    }
}


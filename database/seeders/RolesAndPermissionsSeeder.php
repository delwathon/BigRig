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
        $superRole = Role::create(['role_name' => 'SuperAdmin', 'role_description' => 'Organization owner, inherits all privileges to the platform without limitation.']);
        $adminRole = Role::create(['role_name' => 'Admin', 'role_description' => 'The one who oversees the entire affair of the organization in representation of the organization owner.']);
        $leadRole = Role::create(['role_name' => 'Lead Instructor', 'role_description' => '']);
        $mvRole = Role::create(['role_name' => 'MV Instructor', 'role_description' => '']);
        $cmvRole = Role::create(['role_name' => 'CMV Instructor', 'role_description' => '']);
        $forkliftRole = Role::create(['role_name' => 'Forklift Instructor', 'role_description' => '']);
        $defRole = Role::create(['role_name' => 'Defensive Driving Instructor', 'role_description' => '']);
        $safetyRole = Role::create(['role_name' => 'Safety & Compliance Instructor', 'role_description' => '']);
        $itRole = Role::create(['role_name' => 'IT Consultant', 'role_description' => '']);
        $studentRole = Role::create(['role_name' => 'Student', 'role_description' => 'These are the students who enrolled for trainings.']);

        $permissions = [
            'create_roles_and_permissions',
            'create_instructors',
            'read_roles_and_permissions',
            'read_instructors',
            'read_course_management',
            'read_student_accounts',
            'read_management_navigation',
            'read_training_schedule',
            'read_payments',
            'read_dashboard_user_card',
            'read_dashboard_instructor_card',
            'read_dashboard_revenue_card',
            'update_roles_and_permissions',
            'update_instructors',
            'update_website_management',
            'update_course_management',
            'delete_roles_and_permissions',
            'delete_instructors',
        ];

        foreach ($permissions as $permission) {
            $perm = Permission::create(['name' => $permission]);
            $superRole->permissions()->attach($perm); // Assign all permissions to SuperAdmin
        }

        // Assign 'view' permission to User
        // $userRole->permissions()->attach(Permission::where('name', 'view')->first());
    }
}


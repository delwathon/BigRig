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
        $superRole = Role::create([
            'role_name' => 'SuperAdmin',
            'role_description' => 'Organization owner with unrestricted access to all system features, settings, and user permissions.'
        ]);

        $itRole = Role::create([
            'role_name' => 'IT Consultant',
            'role_description' => 'Technical advisor responsible for managing, maintaining, and improving the institution\'s digital infrastructure and software systems.'
        ]);

        $adminRole = Role::create([
            'role_name' => 'Admin',
            'role_description' => 'Responsible for managing operations and administrative tasks on behalf of the organization owner, with access to critical backend settings.'
        ]);

        $leadRole = Role::create([
            'role_name' => 'Lead Instructor',
            'role_description' => 'Head of all training instructors, oversees curriculum implementation and ensures instructor compliance with international training standards.'
        ]);

        $mvRole = Role::create([
            'role_name' => 'MV Instructor',
            'role_description' => 'Motor Vehicle Instructor responsible for training students on operating light vehicles in accordance with road safety regulations.'
        ]);

        $cmvRole = Role::create([
            'role_name' => 'CMV Instructor',
            'role_description' => 'Commercial Motor Vehicle Instructor who trains students on operating trucks and buses professionally, focusing on highway and cargo transport rules.'
        ]);

        $forkliftRole = Role::create([
            'role_name' => 'Forklift Instructor',
            'role_description' => 'Certified instructor tasked with teaching safe and efficient forklift operation for warehouse and logistics environments.'
        ]);

        $defRole = Role::create([
            'role_name' => 'Defensive Driving Instructor',
            'role_description' => 'Instructor who educates students on advanced driving techniques to anticipate and avoid road hazards, ensuring maximum safety.'
        ]);

        $safetyRole = Role::create([
            'role_name' => 'Safety & Compliance Instructor',
            'role_description' => 'Ensures students and instructors adhere to international driving laws, transportation safety standards, and compliance protocols.'
        ]);

        $studentRole = Role::create([
            'role_name' => 'Student',
            'role_description' => 'Individuals enrolled in one or more training programs provided by the driving school, across various vehicle categories.'
        ]);


        $permissions = [
            'read_calendar',
            'read_chats',
            'read_course_management',
            'update_course_management',
            'create_forum',
            'delete_forum',
            'read_forum',
            'update_forum',
            'create_instructors',
            'delete_instructors',
            'read_instructors',
            'update_instructors',
            'read_dashboard_instructor_card',
            'read_dashboard_revenue_card',
            'read_dashboard_user_card',
            'read_management_navigation',
            'create_newsletter',
            'read_newsletter',
            'update_email_configuration',
            'update_payment_configuration',
            'create_payments',
            'read_payments',
            'read_roles_and_permissions',
            'create_roles_and_permissions',
            'delete_roles_and_permissions',
            'update_roles_and_permissions',
            'update_role_course_permission',
            'read_student_accounts',
            'create_testimonials',
            'delete_testimonials',
            'read_testimonials',
            'update_testimonials',
            'read_training_schedule',
            'create_training_schedule',
            'delete_training_schedule',
            'update_suspend_user_account',
            'read_suspend_user_account',
            'update_verify_user_account',
            'update_website_management',
        ];

        foreach ($permissions as $permission) {
            $perm = Permission::create(['name' => $permission]);
            $superRole->permissions()->attach($perm); // Assign all permissions to SuperAdmin
            $itRole->permissions()->attach($perm); // Assign all permissions to SuperAdmin
        }

        // Assign limited permissions to Student
        $studentPermissions = [
            'read_instructors',
            'read_management_navigation',
            'read_training_schedule',
            'read_payments',
            'read_dashboard_user_card',
            'read_dashboard_instructor_card',
            'read_chats',
            'read_calendar'
        ];

        foreach ($studentPermissions as $permissionName) {
            $permission = Permission::where('name', $permissionName)->first();
            if ($permission) {
                $studentRole->permissions()->attach($permission);
            }
        }

        // Assign 'view' permission to User
        // $userRole->permissions()->attach(Permission::where('name', 'view')->first());
    }
}


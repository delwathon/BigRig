<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    protected $data = [
        [
            'firstName' => 'Adekola',
            'enrolment_batch_id' => null,
            'middleName' => null,
            'lastName' => 'Adedapo',
            'gender' => 'Male',
            'mobileNumber' => '+1 (913) 705-0526',
            'email' => 'adekola.adedapo@bigrigdrivingschool.ng',
            'email_verified_at' => '2025-01-01 00:00:00',
            'password' => '$2y$12$4vyZtQOTNnFjM8NhiHI2H.3ztaH2eC24f3/KpbKzMsVIGvBTDlJf.',
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
            'remember_token' => null,
            'current_team_id' => null,
            'profile_photo_path' => null,
            'user_active' => 1,
        ],
        [
            'firstName' => 'Rilwan',
            'enrolment_batch_id' => null,
            'middleName' => null,
            'lastName' => 'Adelaja',
            'gender' => 'Male',
            'mobileNumber' => '+234 814 648 2898',
            'email' => 'rilwan.adelaja@bigrigdrivingschool.ng',
            'email_verified_at' => '2025-01-01 00:00:00',
            'password' => '$2y$12$4vyZtQOTNnFjM8NhiHI2H.3ztaH2eC24f3/KpbKzMsVIGvBTDlJf.',
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
            'remember_token' => null,
            'current_team_id' => null,
            'profile_photo_path' => null,
            'user_active' => 1,
        ]       
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAssignments = [1, 2]; // role IDs for each user in the $data array

        foreach ($this->data as $index => $userData) {
            $user = User::create($userData);

            // Attach role according to user index
            $roleId = $roleAssignments[$index] ?? null;
            if ($roleId) {
                $user->roles()->attach($roleId);
            }
        }
    }
}

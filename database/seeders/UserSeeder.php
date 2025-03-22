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
            'email' => 'admin@bigrigdrivingschool.ng',
            'email_verified_at' => '2024-01-01 00:00:00',
            'password' => '$2y$12$4vyZtQOTNnFjM8NhiHI2H.3ztaH2eC24f3/KpbKzMsVIGvBTDlJf.',
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
            'remember_token' => null,
            'current_team_id' => null,
            'role_id' => 1,
            'profile_photo_path' => 'profile-photos/lwj9SQxN1NPlRtm5Jn9mOD8dsesdXRY7cCELDlLb.jpg',
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
        foreach ($this->data as $d) {
            User::create($d);
        }
    }
}

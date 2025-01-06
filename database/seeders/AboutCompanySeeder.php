<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\AboutCompany;

class AboutCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_company')->insert([
            'banner_title' => 'Driving Excellence Every Mile',
            'banner_picture' => 'picture.png',
            'history_title' => 'Our Journey in Training Drivers',
            'training_hours' => 1500,
            'company_history' => 'Since 2000, we have been committed to training safe and professional drivers...',
            'mission_statement' => 'Empowering individuals with the skills for safe and professional driving.',
            'students_count' => 5000,
            'years_of_existence' => 23,
            'instructors_count' => 50,
            'pass_rate' => 95.5,
        ]);
    }
}

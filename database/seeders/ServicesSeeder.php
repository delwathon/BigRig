<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Services;

class ServicesSeeder extends Seeder
{
    protected $data = [
        [
            'service_name' => 'Driving Course',
            'service_description' => 'Comprehensive driver education tailored to your need.',
            'service_picture' => 'picture.png'
        ],
        [
            'service_name' => 'Truck and Commercial Training',
            'service_description' => 'Specialized skills for truck and commercial vehicle driving.',
            'service_picture' => 'picture.png'
        ],
        [
            'service_name' => 'School Bus and BRT Training',
            'service_description' => 'Focused training for safe, professional bus driving.',
            'service_picture' => 'picture.png'
        ],
        [
            'service_name' => 'Conventional Driving Training',
            'service_description' => 'In-depth training for standard vehicle operations.',
            'service_picture' => 'picture.png'
        ],
        [
            'service_name' => 'Safety and Compliance',
            'service_description' => 'Expert consultation and advice to ensure full safety compliance.',
            'service_picture' => 'picture.png'
        ],
        [
            'service_name' => 'Driving License',
            'service_description' => 'Guidance to obtain your driving license swiftly.',
            'service_picture' => 'picture.png'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $d) {
            Services::create($d);
        }
    }
}

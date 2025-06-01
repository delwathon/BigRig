<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Settings;

class SettingsSeeder extends Seeder
{

    protected $data = [
        [
            'site_name' => 'BigRig International Truck Driving School',
            'site_tagline' => null,
            'site_description' => 'Kickstart your career with confidence at BigRig International Truck Driving School! We specialize in professional CDL training designed to equip aspiring truck drivers with the skills, knowledge, and hands-on experience needed to excel in the transportation industry. Whether you\'re a beginner or looking to enhance your driving expertise, our certified instructors and modern fleet ensure a top-tier learning environment. Join us to navigate the road to success and drive your future forward!',
            'site_keywords' => 'Truck driving school, CDL training, Commercial driver’s license, Professional truck driver training, CDL certification, Class A CDL training, Trucking career, CDL test preparation, Hands-on truck driving experience, Transportation industry training, Big rig driving school, International truck driving training, CDL license school, Start a trucking career, Truck driver education',
            'headquarters' => 'No 6, Blue Gate Estate, Opposite Liberty Stadium, Ring Road, Ibadan, Oyo State.',
            'business_email' => 'info@bigrigdrivingschool.ng',
            'secondary_email' => null,
            'business_contact' => '+1 (913) 705-0526',
            'secondary_contact' => null,
            'dark_theme_logo' => 'logo-dark.png',
            'light_theme_logo' => 'logo-light.png',
            'favicon' => null,
            'facebook_handle' => null,
            'twitter_handle' => null,
            'instagram_handle' => 'https://www.instagram.com/bigrig_truckdrivingschool/',
            'youtube_handle' => null,
            'tiktok_handle' => null,
            'linkedin_handle' => null,
            'base_currency' => '₦',
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
            Settings::create($d);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clients;

class ClientsSeeder extends Seeder
{
    protected $data = [
        [
            'name' => 'Advanced Driving Techniques',
            'logo' => null,
            'type' => 'partner'
        ],
        [
            'name' => 'Excellent Drivers Academy',
            'logo' => null,
            'type' => 'partner'
        ],
        [
            'name' => 'Beyond Five Star Driving School',
            'logo' => null,
            'type' => 'partner'
        ],
        [
            'name' => 'One Stop Driving School',
            'logo' => null,
            'type' => 'partner'
        ],
        [
            'name' => 'Speed Learning Institute',
            'logo' => null,
            'type' => 'partner'
        ],
        [
            'name' => 'Furturatech',
            'logo' => 'picture.png',
            'type' => 'client'
        ],
        [
            'name' => 'Daily News',
            'logo' => 'picture.png',
            'type' => 'client'
        ],
        [
            'name' => 'CyberTech',
            'logo' => 'picture.png',
            'type' => 'client'
        ],
        [
            'name' => 'Art Studio',
            'logo' => 'picture.png',
            'type' => 'client'
        ],
        [
            'name' => 'Technology',
            'logo' => 'picture.png',
            'type' => 'client'
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
            Clients::create($d);
        }
    }
}

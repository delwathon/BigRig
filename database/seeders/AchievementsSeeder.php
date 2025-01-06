<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Achievements;

class AchievementsSeeder extends Seeder
{
    protected $data = [
        [
            'title' => 'Pioneering Road Safety Initiative',
            'year' => '2024',
            'description' => 'In 2024, BigRig Driving School proudly launched its "Pioneering Road Safety Initiative," a program designed to enhance driver awareness and reduce road accidents nationwide. The initiative focused on comprehensive safety workshops, simulated driving scenarios, and hands-on training sessions led by industry experts. Over the course of the year, we successfully trained over 1,000 participants, equipping them with advanced safety strategies and fostering a culture of responsibility on the road. This milestone reflects our unwavering dedication to creating safer roads for everyone.',
            'picture' => 'picture.png',
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
            Achievements::create($d);
        }
    }
}

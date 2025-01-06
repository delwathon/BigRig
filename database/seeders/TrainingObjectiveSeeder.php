<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrainingObjective;

class TrainingObjectiveSeeder extends Seeder
{
    
    protected $data = [
        [
            'objective' => 'Truck Driving',
            'requirement' => 'You must possess a valid driver\'s license, have a minimum of 6 months of regular driving experience, and be free from any physical disabilities that could affect driving.',
            'price' => 450.00,
            'duration' => 14, // Duration in weeks
            'image_url' => 'objectives/JOPAvs6ayDz0v1lxrDSXMGdxqgU1TFn19bQNm5gI.jpg',
        ],
        [
            'objective' => 'Forklift Driving',
            'requirement' => 'You must possess a valid driver\'s license, have a minimum of 3 months of regular driving experience, and be free from any physical disabilities that could affect driving.',
            'price' => 350.00,
            'duration' => 12, // Duration in weeks
            'image_url' => 'objectives/ud6fK7ENwJLfW06wDsFFlkOx0CSeqtPOBcSKwVjT.png',
        ],
        [
            'objective' => 'Bus/BRT Driving',
            'requirement' => 'You must have a minimum of 6 months of regular driving experience.',
            'price' => 250.00,
            'duration' => 10, // Duration in weeks
            'image_url' => 'objectives/F2SXYU1SD8NFORrvuBr7PEVGvrsNTNyMWCC4KRNj.jpg',
        ],
        [
            'objective' => 'Conventional Vehicle',
            'requirement' => 'No requirement needed for enrolment.',
            'price' => 150.00,
            'duration' => 8, // Duration in weeks
            'image_url' => 'objectives/G3We80aGLv6XOQPWhbgy2sUsG4DzuUHtHX5e8y1A.jpg',
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
            TrainingObjective::create($d);
        }
    }
}

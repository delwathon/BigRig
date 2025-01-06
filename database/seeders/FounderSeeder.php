<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Founder;

class FounderSeeder extends Seeder
{

    protected $data = [
        [
            'founder_name' => 'Adekola Adedapo',
            'signature' => null,
            'speech_title' => 'A perfect driving school with latest vehicles',
            'speech_content' => 'With 15+ years in trucking and logistics, We are driven to prepare drivers for the road and help them build sustainable, rewarding careers. Our focus is on meeting the growing demand for skilled drivers while addressing safety and efficiency challenges in today’s logistics landscape. Our school has earned industry respect for its comprehensive curriculum and hands-on training, covering everything from safe driving techniques to complex logistics.',
            'facebook_handle' => null,
            'twitter_handle' => null,
            'linkedin_handle' => null,
            'instagram_handle' => null,
            'founder_picture' => 'picture.png',
            'secondary_picture' => 'picture.png',
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
            Founder::create($d);
        }
    }
}

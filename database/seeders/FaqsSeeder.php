<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faqs;

class FaqsSeeder extends Seeder
{
    
    protected $data = [
        [
            'question' => 'What types of driving courses do you offer?',
            'answer' => 'We offer training for trucks, forklifts, school buses/BRT, and regular vehicles.'
        ],
        [
            'question' => 'How long does each driving course take?',
            'answer' => 'Course durations vary by vehicle type; most can be completed in a few months.'
        ],
        [
            'question' => 'Are your instructors certified?',
            'answer' => 'Yes, all instructors are highly qualified and certified for professional training.'
        ],
        [
            'question' => 'Can I learn on weekends?',
            'answer' => 'Yes, we offer weekend classes for added flexibility.'
        ],
        [
            'question' => 'What are the age requirements for each program?',
            'answer' => 'For truck and forklift training, you must be 18 or older; for others, 16+.'
        ],
        [
            'question' => 'Do you provide training for commercial driver’s licenses (CDL)?',
            'answer' => 'Yes, we provide CDL training for truck and bus driving courses.'
        ],
        [
            'question' => 'Is job placement assistance available after training?',
            'answer' => 'We offer job placement assistance for those completing our commercial driving programs.'
        ],
        [
            'question' => 'Do I need prior experience to start training?',
            'answer' => 'No prior experience is required. Our programs are designed for all skill levels.'
        ],
        [
            'question' => 'What safety measures are in place during training?',
            'answer' => 'We strictly follow safety protocols and use well-maintained, standard vehicles.'
        ],
        [
            'question' => 'How are the training vehicles maintained?',
            'answer' => 'Our vehicles are regularly inspected and maintained for optimal safety and reliability.'
        ],
        [
            'question' => 'Is there a payment plan option for the courses?',
            'answer' => 'Yes, we offer flexible payment plans to make training affordable.'
        ],
        [
            'question' => 'What is the process for enrolling in a course?',
            'answer' => 'Simply contact us or fill out the online form to start the enrollment process.'
        ],
        [
            'question' => 'Are there online or virtual classes available?',
            'answer' => 'Theory classes are available online, but practical driving requires in-person training.'
        ],
        [
            'question' => 'Do you offer refresher courses for experienced drivers?',
            'answer' => 'Yes, we have refresher courses for drivers looking to improve or update their skills.'
        ],
        [
            'question' => 'Is there a written exam as part of the training?',
            'answer' => 'Yes, each course includes a written test covering safety and road rules.'
        ],
        [
            'question' => 'Can I bring my own vehicle for regular driving training?',
            'answer' => 'Yes, you may bring your own vehicle if it meets our safety requirements.'
        ],
        [
            'question' => 'What happens if I don’t pass my driving test?',
            'answer' => 'We offer additional practice sessions at no extra cost until you pass.'
        ],
        [
            'question' => 'Do you offer certification upon completion?',
            'answer' => 'Yes, upon completing your course, we provide a certificate and guidance for licensing.'
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
            Faqs::create($d);
        }
    }
}

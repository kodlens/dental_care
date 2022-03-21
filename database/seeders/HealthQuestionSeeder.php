<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HealthQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'question' => 'Fever',
            ],
            [
                'question' => 'Dry Cough',
            ],
            [
                'question' => 'Fatigue',
            ],
            [
                'question' => 'Aches and Pains',
            ],
            [
                'question' => 'Runnny Nose',
            ],
            [
                'question' => 'Sore Throat',
            ],
            [
                'question' => 'Shorthness of Breath',
            ],
            [
                'question' => 'Diarrhea',
            ],
            [
                'question' => 'Headache',
            ],
            [
                'question' => 'Loss of Smell and Taste',
            ],
            [
                'question' => 'None of the Above',
            ],

        ];

        \App\Models\HealthQuestion::insertOrIgnore($data);


    }
}

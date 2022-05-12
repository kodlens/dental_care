<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
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
                'item_name' => 'Mouth mirror',
            ],
            [
                'item_name' => 'Dental probe',
            ],
            [
                'item_name' => 'Anaesthetic',
            ],
            [
                'item_name' => 'Dental syringe',
            ],
            [
                'item_name' => 'Dental drill',
            ],
            [
                'item_name' => 'Spoon excavator',
            ],
            [
                'item_name' => 'Burnisher',
            ],
            [
                'item_name' => 'Scaler',
            ],
            [
                'item_name' => 'Curette',
            ],
            [
                'item_name' => 'Suction Device',
            ],
            [
                'item_name' => 'X-ray',
            ],

        ];

        \App\Models\Item::insertOrIgnore($data);


    }
}

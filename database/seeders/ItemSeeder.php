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
                'item_type' => 'ASSET',
            ],
            [
                'item_name' => 'Dental probe',
                'item_type' => 'ASSET',
            ],
            [
                'item_name' => 'Anaesthetic',
                'item_type' => 'ASSET',
            ],
            [
                'item_name' => 'Dental syringe',
                'item_type' => 'ASSET',
            ],
            [
                'item_name' => 'Dental drill',
                'item_type' => 'ASSET',
            ],
            [
                'item_name' => 'Spoon excavator',
                'item_type' => 'ASSET',
            ],
            [
                'item_name' => 'Burnisher',
                'item_type' => 'ASSET',
            ],
            [
                'item_name' => 'Scaler',
                'item_type' => 'ASSET',
            ],
            [
                'item_name' => 'Curette',
                'item_type' => 'ASSET',
            ],
            [
                'item_name' => 'Suction Device',
                'item_type' => 'ASSET',
            ],
            [
                'item_name' => 'X-ray',
                'item_type' => 'ASSET',
            ],

        ];

        \App\Models\Item::insertOrIgnore($data);


    }
}

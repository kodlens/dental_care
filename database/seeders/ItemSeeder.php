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
                'item_name' => 'ITEM PANG IBOT',
            ],
            [
                'item_name' => 'ITEM PANG BRUSH',
            ],
            [
                'item_name' => 'ITEM PANG PASTA',
            ],
           
        ];

        \App\Models\Item::insertOrIgnore($data);


    }
}

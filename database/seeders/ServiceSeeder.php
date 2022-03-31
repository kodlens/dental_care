<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
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
                'service' => 'TEETH CLEANING',
                'price' => 250
            ],
            [
                'service' => 'IBOT NGIPON',
                'price' => 300
            ],
            [
                'service' => 'PASTA',
                'price' => 500
            ],
        ];

        \App\Models\Service::insertOrIgnore($data);


    }
}

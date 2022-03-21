<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
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
                'office_name' => 'OSA',
            ],
            [
                'office_name' => 'ICS',
            ],
            [
                'office_name' => 'IBFS',
            ],
            [
                'office_name' => 'ICJE',
            ],
            [
                'office_name' => 'ACCOUTING',
            ],
            [
                'office_name' => 'REGISTRAR',
            ],
        ];

        \App\Models\Office::insertOrIgnore($data);
    }
}

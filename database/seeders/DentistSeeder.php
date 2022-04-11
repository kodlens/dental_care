<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DentistSeeder extends Seeder
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
                'lname' => 'LOPEZ',
                'fname' => 'ANGEL',
                'mname' => 'P',
                'suffix' => '',
                'sex' => 'FEMALE',
                'contact_no' => 'TANGUB CITY',
                'email' => 'angel@dev.com',
                'address' => 'P-6, TANGUB CITY',
            ],
            [
                'lname' => 'ALGADIPE',
                'fname' => 'HEZZEL',
                'mname' => 'P',
                'suffix' => '',
                'sex' => 'FEMALE',
                'contact_no' => 'TANGUB CITY',
                'email' => 'hezzel@dev.com',
                'address' => 'P-6, TANGUB CITY',
            ],
        ];

        \App\Models\Dentist::insertOrIgnore($data);

    }

}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'username' => 'admin',
                'lname' => 'DOMINGUEZ',
                'fname' => 'JUNARD',
                'mname' => 'P',
                'sex' => 'MALE',
                'province' => 'MISAMIS OCCIDENTAL',
                'city' => 'TANGUB CITY',
                'barangay' => 'CANIANGAN',
                'street' => 'P-6',
                'email' => 'admin@dev.com',
                'contact_no' => '09167789585',
                'role' => 'ADMINISTRATOR',
                'password' => Hash::make('a')
            ],

            //client
            [
                'username' => 'neri',
                'lname' => 'NERI',
                'fname' => 'MAIRAMAE',
                'mname' => 'P',
                'sex' => 'MALE',
                'province' => 'MISAMIS OCCIDENTAL',
                'city' => 'TANGUB CITY',
                'barangay' => 'CANIANGAN',
                'street' => 'P-6',
                'email' => 'neri@dev.com',
                'contact_no' => '09167789585',
                'role' => 'USER',
                'password' => Hash::make('a')
            ],
            [
                'username' => 'jhunard',
                'lname' => 'DOMINGUEZ',
                'fname' => 'JHUNARD',
                'mname' => '',
                'sex' => 'MALE',
                'province' => 'MISAMIS OCCIDENTAL',
                'city' => 'TANGUB CITY',
                'barangay' => 'CANIANGAN',
                'street' => 'P-6',
                'email' => 'jhunard@dev.com',
                'contact_no' => '09702654456',
                'role' => 'USER',
                'password' => Hash::make('a')
            ],
    



                //DENTIST
            [
                'username' => 'algadipe',
                'lname' => 'ALGADIPE',
                'fname' => 'HEZZEL',
                'mname' => 'P',
                'sex' => 'FEMALE',
                'province' => 'MISAMIS OCCIDENTAL',
                'city' => 'TANGUB CITY',
                'barangay' => 'CANIANGAN',
                'street' => 'P-6',
                'email' => 'algadipz@dev.com',
                'contact_no' => '09167789522',
                'role' => 'DENTIST',
                'password' => Hash::make('a')
            ],
            [
                'username' => 'nimchie',
                'lname' => 'HIBAYA',
                'fname' => 'NIMCHIE',
                'mname' => '',
                'sex' => 'FEMALE',
                'province' => 'MISAMIS OCCIDENTAL',
                'city' => 'OZAMIZ CITY',
                'barangay' => 'CANIANGAN',
                'street' => 'P-6',
                'email' => 'nimchie@dev.com',
                'contact_no' => '09167789544',
                'role' => 'DENTIST',
                'password' => Hash::make('a')
            ],
            [
                'username' => 'angel',
                'lname' => 'LOPEZ',
                'fname' => 'ANGEL',
                'mname' => '',
                'sex' => 'FEMALE',
                'province' => 'MISAMIS OCCIDENTAL',
                'city' => 'TANGUB CITY',
                'barangay' => 'CANIANGAN',
                'street' => 'P-6',
                'email' => 'angel@dev.com',
                'contact_no' => '09167789546',
                'role' => 'DENTIST',
                'password' => Hash::make('a')
            ],


            //STAFF
            [
                'username' => 'jande',
                'lname' => 'SOLIBIO',
                'fname' => 'JANDE',
                'mname' => 'P',
                'sex' => 'MALE',
                'province' => 'MISAMIS OCCIDENTAL',
                'city' => 'TANGUB CITY',
                'barangay' => 'CANIANGAN',
                'street' => 'P-6',
                'email' => 'jande@dev.com',
                'contact_no' => '09683014598',
                'role' => 'STAFF',
                'password' => Hash::make('a')
            ],
        ];

        \App\Models\User::insertOrIgnore($data);
    }
}

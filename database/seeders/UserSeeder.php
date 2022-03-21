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
                'qr_ref' => 'AA1234',
                'username' => 'angel',
                'lname' => 'LOPEZ',
                'fname' => 'ANGEL',
                'mname' => 'P',
                'sex' => 'FEMALE',
                'province' => 'MISMAIS OCCIDENTAL',
                'city' => 'TANGUB CITY',
                'barangay' => 'CANIANGAN',
                'street' => 'P-6',
                'email' => 'angel@dev.com',
                'contact_no' => '09167789585',
                'role' => 'ADMINISTRATOR',
                'office_id' => 0,
                'remark' => '',
                'password' => Hash::make('a')
            ],
            [
                'qr_ref' => 'BB1234',
                'username' => 'riche',
                'lname' => 'MAGLANGIT',
                'fname' => 'RICHE',
                'mname' => '',
                'sex' => 'MALE',
                'province' => 'MISMAIS OCCIDENTAL',
                'city' => 'OZAMIS CITY',
                'barangay' => 'SINUSZA',
                'street' => 'P-SAMPLE',
                'email' => 'riche@dev.com',
                'contact_no' => '09167789584',
                'role' => 'USER',
                'office_id' => 0,
                'remark' => '',
                'password' => Hash::make('a')
            ],
            [
                'qr_ref' => 'AAA111',
                'username' => 'admin',
                'lname' => 'AMPARADO',
                'fname' => 'ETIENNE WAYNE',
                'mname' => '',
                'sex' => 'MALE',
                'province' => 'MISMAIS OCCIDENTAL',
                'city' => 'OZAMIS CITY',
                'barangay' => 'SINUSZA',
                'street' => 'P-SAMPLE',
                'email' => 'admin@dev.com',
                'contact_no' => '09167789584',
                'role' => 'ADMINISTRATOR',
                'office_id' => 0,
                'remark' => '',
                'password' => Hash::make('a')
            ],
            [
                'qr_ref' => 'REG1234',
                'username' => 'reg',
                'lname' => 'AMPARADO',
                'fname' => 'ETIENNE WAYNE',
                'mname' => '',
                'sex' => 'MALE',
                'province' => 'MISMAIS OCCIDENTAL',
                'city' => 'OZAMIS CITY',
                'barangay' => 'SINUSZA',
                'street' => 'P-SAMPLE',
                'email' => 'reg@dev.com',
                'contact_no' => '09167781122',
                'role' => 'OFFICE',
                'office_id' => 6,
                'remark' => 'PROCESSING',
                'password' => Hash::make('a')
            ],
            [
                'qr_ref' => 'OSA1234',
                'username' => 'osa',
                'lname' => 'AMPARADO',
                'fname' => 'ETIENNE WAYNE',
                'mname' => '',
                'sex' => 'MALE',
                'province' => 'MISMAIS OCCIDENTAL',
                'city' => 'OZAMIS CITY',
                'barangay' => 'SINUSZA',
                'street' => 'P-SAMPLE',
                'email' => 'osa@dev.com',
                'contact_no' => '09167781123',
                'role' => 'OFFICE',
                'office_id' => 1,
                'remark' => 'PROCESSING',
                'password' => Hash::make('a')
            ],
            [
                'qr_ref' => 'ACC1234',
                'username' => 'acc',
                'lname' => 'AMPARADO',
                'fname' => 'ETIENNE WAYNE',
                'mname' => '',
                'sex' => 'MALE',
                'province' => 'MISMAIS OCCIDENTAL',
                'city' => 'OZAMIS CITY',
                'barangay' => 'SINUSZA',
                'street' => 'P-SAMPLE',
                'email' => 'acc@dev.com',
                'contact_no' => '09167781124',
                'role' => 'OFFICE',
                'office_id' => 5,
                'remark' => 'PROCESSING',
                'password' => Hash::make('a')
            ]
        ];

        \App\Models\User::insertOrIgnore($data);
    }
}

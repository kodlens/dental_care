<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppClockSeeder extends Seeder
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
                'start_time' => '9:00:00',
                'end_time' => '15:00:00',
            ],

        ];

        \App\Models\AppClock::insertOrIgnore($data);
    }
}

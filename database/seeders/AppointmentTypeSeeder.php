<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppointmentTypeSeeder extends Seeder
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
                'office_id' => 1,
                'appointment_type' => 'GRADE INQUIRY (REGISTRAR)',
                'cc_time' => 15,
                'temp_sum' => 0,

            ],
            [
                'office_id' => 1,
                'appointment_type' => 'CLAIM UNIFORM (OSA)',
                'cc_time' => 15,
                'temp_sum' => 0,

            ],
            [
                'office_id' => 5,
                'appointment_type' => 'PAYMENT (ACCOUNTING)',
                'cc_time' => 15,
                'temp_sum' => 0,

            ],
            [
                'office_id' => 6,
                'appointment_type' => 'EVALUATION (REGISTRAR)',
                'cc_time' => 15,
                'temp_sum' => 0,

            ],
        ];

        \App\Models\AppointmentType::insertOrIgnore($data);
    }
}

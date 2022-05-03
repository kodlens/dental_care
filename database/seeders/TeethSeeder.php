<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeethSeeder extends Seeder
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
            //maxillary right
            [
                'tooth_name' => 'Maxillary Right Third Molar',
                'fill_color' => '#FFFFFF',
                'teeth_points' => '33,314.3 38,325.7 45.7,335.7 55.7,341.7 64.7,343 73.3,340 77.7,335.7 81.3,326.3 
                    82,314.3 81.3,302 80.7,292.7 73.7,292 51.3,293.7 38.7,293.7 34,298 31.7,302.3 32,311'
            ],
            [
                'tooth_name' => 'Maxillary Right Second Molar',
            ],
            [
                'tooth_name' => 'Maxillary Right First Molar',
            ],
            [
                'tooth_name' => 'Maxillary Right Second Premolar',
            ],
            [
                'tooth_name' => 'Maxillary Right First Premolar',
            ],
            [
                'tooth_name' => 'Maxillary Right Canine',
            ],
            [
                'tooth_name' => 'Maxillary Right Lateral Incisor',
            ],
            [
                'tooth_name' => 'Maxillary Right Central Incisor',
            ],



            //maxillary left
            [
                'tooth_name' => 'Maxillary Left Central Incisor',
            ],
            [
                'tooth_name' => 'Maxillary Left Lateral Incisor',
            ],
            [
                'tooth_name' => 'Maxillary Left Canine',
            ],
            [
                'tooth_name' => 'Maxillary Left First Premolar',
            ],
            [
                'tooth_name' => 'Maxillary Left Second Premolar',
            ],
            [
                'tooth_name' => 'Maxillary Left First Molar',
            ],
            [
                'tooth_name' => 'Maxillary Left Second Molar',
            ],
            [
                'tooth_name' => 'Maxillary Left Third Molar',
            ],







            //mandibular left
            [
                'tooth_name' => 'Mandibular Left Third Molar',
            ],
             [
                'tooth_name' => 'Mandibular Left Second Molar',
            ],
            [
                'tooth_name' => 'Mandibular Left First Molar',
            ],
            [
                'tooth_name' => 'Mandibular Left Second Premolar',
            ],
            [
                'tooth_name' => 'Mandibular Left First Premolar',
            ],
            [
                'tooth_name' => 'Mandibular Left Canine',
            ],
             [
                'tooth_name' => 'Mandibular Left Lateral Incisor',
            ],
            [
                'tooth_name' => 'Mandibular Left Central Incisor',
            ],

           
            
      
            //mandibular right
            [
                'tooth_name' => 'Mandibular Right Central Incisor',
            ],
            [
                'tooth_name' => 'Mandibular Right Lateral Incisor',
            ],
            [
                'tooth_name' => 'Mandibular Right Canine',
            ],
            [
                'tooth_name' => 'Mandibular Right First Premolar',
            ],
            [
                'tooth_name' => 'Mandibular Right Second Premolar',
            ],
            [
                'tooth_name' => 'Mandibular Right First Molar',
            ],
            [
                'tooth_name' => 'Mandibular Right Second Molar',
            ],
            [
                'tooth_name' => 'Mandibular Right Third Molar',
            ],

           
            
            
            
            
            
           


            

        ];

        \App\Models\Teeth::insertOrIgnore($data);


    }
}

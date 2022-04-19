<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "serial" => 1,
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "M",
            ],
            [
                "serial" => 2,
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "W",
            ],
            [
                "serial" => 3,
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "D",
            ],
            [
                "serial" => 4,
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "M",
            ],
            [
                "serial" => 5,
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "W",
            ],
            [
                "serial" => 6,
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "D",
            ],
            [
                "serial" => 7,
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "M",
            ],
            [
                "serial" => 8,
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "W",
            ],

        ];

        for ($i = 0; $i < count($data); $i++)
            \DB::table('sample_data')->insert($data[$i]);
    }
}

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
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "M",
            ],
            [
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "W",
            ],
            [
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "D",
            ],
            [
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "M",
            ],
            [
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "W",
            ],
            [
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "D",
            ],
            [
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "M",
            ],
            [
                "phone_number" => 8012345678,
                "amount"=>3500,
                "validity" => "W",
            ],

        ];

        for ($i = 0; $i < count($data); $i++)
            \DB::table('sample_data')->insert($data[$i]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MNOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                "mno" => "AIRTEL",
                "type"=>1,
                "provider_comm" => 4,
                "vendor_comm" => 4.1
            ],
            [
                "mno" => "MTN",
                "type"=>2,
                "provider_comm" => 3.75,
                "vendor_comm" => 3.5
            ],
            [
                "mno" => "GLO",
                "type"=>3,
                "provider_comm" => 5,
                "vendor_comm" => 6
            ],
            [
                "mno" => "9Mobile",
                "type"=>4,
                "provider_comm" => 6.5,
                "vendor_comm" => 6
            ]

        ];

        for ($i = 0; $i < count($user); $i++)
            \DB::table('m_n_o_s')->insert($user[$i]);
    }
}

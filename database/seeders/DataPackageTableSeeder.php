<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataPackageTableSeeder extends Seeder
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
                "mno" => "MTN",
                "mno_id"=>2,
                "validity" => 'M',
                "amount" => 3500,
                "description"=>'Monthly Plan',
                "code"=>3500
            ],
            [
                "mno" => "AIRTEL",
                "mno_id"=>1,
                "validity" => 'M',
                "amount" => 3500,
                "description"=>'Monthly Plan',
                "code"=>3499.09
            ]

        ];

        for ($i = 0; $i < count($data); $i++)
            \DB::table('data_packages')->insert($data[$i]);
    }
}

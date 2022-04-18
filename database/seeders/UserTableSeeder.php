<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
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
                "name" => "Trillz Global",
                "email" => "trillzglobal@gmail.com",
                "phone_number" => "09032878128",
                "password" => Hash::make("Password1"),
                "webhook"=>"http://localhost"
            ]
        ];

        for ($i = 0; $i < count($user); $i++)
            \DB::table('users')->insert($user[$i]);
    }
}

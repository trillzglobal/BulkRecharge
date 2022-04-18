<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AirtimeShortCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $network = [
           ['mno_id'=>'2','mno' => 'MTN', 'short_code' => '0803'],
            ['mno_id'=>'2','mno' => 'MTN', 'short_code' => '0803'],
            ['mno_id'=>'2','mno' => 'MTN', 'short_code' => '0803'],
            ['mno_id'=>'2','mno' => 'MTN', 'short_code' => '0806'],
            ['mno_id'=>'2','mno' => 'MTN', 'short_code' => '0703'],
            ['mno_id'=>'2','mno' => 'MTN', 'short_code' => '0706'],
            ['mno_id'=>'2','mno' => 'MTN', 'short_code' => '0813'],
            ['mno_id'=>'2','mno' => 'MTN', 'short_code' => '0816'],
            ['mno_id'=>'2','mno' => 'MTN', 'short_code' => '0810'],
            ['mno_id'=>'2','mno' => 'MTN', 'short_code' => '0814'],
            ['mno_id'=>'2','mno' => 'MTN', 'short_code' => '0903'],
            ['mno_id'=>'3','mno' => 'GLO', 'short_code' => '0805'],
            ['mno_id'=>'3','mno' => 'GLO', 'short_code' => '0807'],
            ['mno_id'=>'3','mno' => 'GLO', 'short_code' => '0705'],
            ['mno_id'=>'3','mno' => 'GLO', 'short_code' => '0815'],
            ['mno_id'=>'3','mno' => 'GLO', 'short_code' => '0811'],
            ['mno_id'=>'3','mno' => 'GLO', 'short_code' => '0905'],
            ['mno_id'=>'1','mno' => 'AIRTEL', 'short_code' => '0802'],
            ['mno_id'=>'1','mno' => 'AIRTEL', 'short_code' => '0808'],
            ['mno_id'=>'1','mno' => 'AIRTEL', 'short_code' => '0708'],
            ['mno_id'=>'1','mno' => 'AIRTEL', 'short_code' => '0812'],
            ['mno_id'=>'1','mno' => 'AIRTEL', 'short_code' => '0701'],
            ['mno_id'=>'1','mno' => 'AIRTEL', 'short_code' => '0902'],
            ['mno_id'=>'1','mno' => 'AIRTEL', 'short_code' => '0912'],
            ['mno_id'=>'4','mno' => '9Mobile', 'short_code' => '0809'],
            ['mno_id'=>'4','mno' => '9Mobile', 'short_code' => '0818'],
            ['mno_id'=>'4','mno' => '9Mobile', 'short_code' => '0817'],
            ['mno_id'=>'4','mno' => '9Mobile', 'short_code' => '0900']
        ];

        for ($i = 0; $i < count($network); $i++) {
            \DB::table('airtime_shortcodes')->insert($network[$i]);
        }
    }
}

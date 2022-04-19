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
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'D',
                    "amount" => 50,
                    "description"=>' 40MB for N50 valid for 1day.',
                    "code"=> 49.99
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'D',
                    "amount" => 100,
                    "description"=>' 100MB for N100 valid for 1day.',
                    "code"=> 99
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'W',
                    "amount" => 300,
                    "description"=>' 350MB for N300 valid for 7day.',
                    "code"=> 299.02
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'D',
                    "amount" => 300,
                    "description"=>'  1GB for N300 valid for 1days. ',
                    "code"=> 299.03
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'D',
                    "amount" => 500,
                    "description"=>' 2GB for N500 valid for 1day. ',
                    "code"=> 499.03
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'W',
                    "amount" => 1500,
                    "description"=>'  6GB for N1,500 valid for 7days. ',
                    "code"=> 1499.03
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'M',
                    "amount" => 1000,
                    "description"=>' 1.5GB for N1,000 valid for 30days.',
                    "code"=> 999
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'M',
                    "amount" => 1200,
                    "description"=>' 2GB for N1,200 valid for 30days. ',
                    "code"=> 1199
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'M',
                    "amount" => 1500,
                    "description"=>' 3GB for N1,500 valid for 30 days. ',
                    "code"=> 1499.01
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'M',
                    "amount" => 2000,
                    "description"=>'  4.5GB for N2,000 valid for 30 days.  ',
                    "code"=> 1999
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'M',
                    "amount" => 2500,
                    "description"=>' 6GB  for N2,500 valid for 30 days. ',
                    "code"=> 2499.01
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'M',
                    "amount" => 3000,
                    "description"=>' 10GB  for N3,000 valid for 30 days. ',
                    "code"=> 2499.02
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'M',
                    "amount" => 4000,
                    "description"=>'  11 GB  for N4,000 valid for 30 days. ',
                    "code"=> 3999.01
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'M',
                    "amount" => 5000,
                    "description"=>' 20GB for N5,000 valid for 30 days. ',
                    "code"=> 4999
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'M',
                    "amount" => 8000,
                    "description"=>' 25GB for N8,000 valid for 30 days. ',
                    "code"=> 7999.02
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'M',
                    "amount" => 10000,
                    "description"=>'  40GB for N10,000 valid for 30days. ',
                    "code"=> 9999
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'M',
                    "amount" => 15000,
                    "description"=>'  75GB for N15,000 valid for 30days. ',
                    "code"=> 14999
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'M',
                    "amount" => 20000,
                    "description"=>'  120GB for N20,000 valid for 30days. ',
                    "code"=> 19999.02
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'M',
                    "amount" => 30000,
                    "description"=>'  200GB for N30,000 valid for 30days. ',
                    "code"=> 29999.02
                ],

                [
                    "mno" => "AIRTEL",
                    "mno_id"=>1,
                    "validity" => 'M',
                    "amount" => 36000,
                    "description"=>'  280GB for N36,000 valid for 30days. ',
                    "code"=> 35999.02
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'D',
                    "amount" => 100,
                    "description"=>'DataPlan 100MB Daily',
                    "code"=> 100
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'D',
                    "amount" => 200,
                    "description"=>'Data Plan 200MB 3-Day Plan',
                    "code"=> 200
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'W',
                    "amount" => 300,
                    "description"=>'DataPlan 350MB 7Days',
                    "code"=> 300
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'W',
                    "amount" => 500,
                    "description"=>'Data Plan 750MB 2-Week Plan',
                    "code"=> 500
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'M',
                    "amount" => 1200,
                    "description"=>'DataPlan 2GB  Monthly',
                    "code"=> 1200
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'M',
                    "amount" => 1000,
                    "description"=>'DataPlan 1.5GB 1-Month Mobile',
                    "code"=> 1000
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'D',
                    "amount" => 300,
                    "description"=>'DataPlan 1GB',
                    "code"=> 300
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'W',
                    "amount" => 500,
                    "description"=>'DataPlan 750MB',
                    "code"=> 500
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'M',
                    "amount" => 1500,
                    "description"=>'DataPlan 3GB',
                    "code"=> 1500
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'M',
                    "amount" => 6000,
                    "description"=>'25GB Monthly Plan',
                    "code"=> 6000
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'W',
                    "amount" => 500,
                    "description"=>'1GB Weekly Plan',
                    "code"=> 500
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'W',
                    "amount" => 1500,
                    "description"=>'6GB Weekly Plan',
                    "code"=> 1500
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'M',
                    "amount" => 2500,
                    "description"=>'6GB Monthly Plan',
                    "code"=> 2500
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'M',
                    "amount" => 3000,
                    "description"=>'10GB Monthly Plan',
                    "code"=> 3000
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'M',
                    "amount" => 20000,
                    "description"=>'110GB Monthly Plan',
                    "code"=> 20000
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'M',
                    "amount" => 10000,
                    "description"=>'25GB SME Monthly Plan',
                    "code"=> 10000
                ],

                [
                    "mno" => "MTN",
                    "mno_id"=>2,
                    "validity" => 'M',
                    "amount" => 20000,
                    "description"=>'35GB SME Monthly Plan',
                    "code"=> 20000
                ],

                [
                    "mno" => "GLO",
                    "mno_id"=>3,
                    "validity" => 'D',
                    "amount" => 50,
                    "description"=>'45MB + 5MB Night',
                    "code"=> 50
                ],

                [
                    "mno" => "GLO",
                    "mno_id"=>3,
                    "validity" => 'D',
                    "amount" => 100,
                    "description"=>'115Mb + 35MB Night',
                    "code"=> 100
                ],

                [
                    "mno" => "GLO",
                    "mno_id"=>3,
                    "validity" => 'M',
                    "amount" => 100,
                    "description"=>'115Mb + 35MB Night',
                    "code"=> 100
                ],

                [
                    "mno" => "GLO",
                    "mno_id"=>3,
                    "validity" => 'M',
                    "amount" => 1000,
                    "description"=>'1.9GB + 1GB Night',
                    "code"=> 1000
                ],

                [
                    "mno" => "GLO",
                    "mno_id"=>3,
                    "validity" => 'M',
                    "amount" => 1500,
                    "description"=>'3.5GB + 600MB Night',
                    "code"=> 1500
                ],

                [
                    "mno" => "GLO",
                    "mno_id"=>3,
                    "validity" => 'M',
                    "amount" => 2000,
                    "description"=>'5.2GB + 600MB Night',
                    "code"=> 2000
                ],

                [
                    "mno" => "GLO",
                    "mno_id"=>3,
                    "validity" => 'M',
                    "amount" => 2500,
                    "description"=>'6.8GB + 900MB Night',
                    "code"=> 2500
                ],

                [
                    "mno" => "GLO",
                    "mno_id"=>3,
                    "validity" => 'M',
                    "amount" => 3000,
                    "description"=>'10GB +1GB Night',
                    "code"=> 3000
                ],

                [
                    "mno" => "GLO",
                    "mno_id"=>3,
                    "validity" => 'M',
                    "amount" => 4000,
                    "description"=>'14GB + 1GB Night',
                    "code"=> 4000
                ],

                [
                    "mno" => "GLO",
                    "mno_id"=>3,
                    "validity" => 'M',
                    "amount" => 5000,
                    "description"=>'20GB + 2GB Night',
                    "code"=> 5000
                ],

                [
                    "mno" => "GLO",
                    "mno_id"=>3,
                    "validity" => 'M',
                    "amount" => 8000,
                    "description"=>'27.5GB + 2GB Night',
                    "code"=> 8000
                ],

                [
                    "mno" => "GLO",
                    "mno_id"=>3,
                    "validity" => 'M',
                    "amount" => 10000,
                    "description"=>'46GB + 4GB',
                    "code"=> 10000
                ],

                [
                    "mno" => "GLO",
                    "mno_id"=>3,
                    "validity" => 'M',
                    "amount" => 15000,
                    "description"=>'86GB + 7GB',
                    "code"=> 15000
                ],

                [
                    "mno" => "GLO",
                    "mno_id"=>3,
                    "validity" => 'M',
                    "amount" => 18000,
                    "description"=>'109GB + 10Gb',
                    "code"=> 18000
                ],

                [
                    "mno" => "GLO",
                    "mno_id"=>3,
                    "validity" => 'M',
                    "amount" => 20000,
                    "description"=>'126GB + 12GB',
                    "code"=> 20000
                ],

                [
                    "mno" => "9MOBILE",
                    "mno_id"=>4,
                    "validity" => 'D',
                    "amount" => 50,
                    "description"=>'Daily 25MB',
                    "code"=> 50
                ],
                [
                    "mno" => "9MOBILE",
                    "mno_id"=>4,
                    "validity" => 'D',
                    "amount" => 100,
                    "description"=>'Daily 100MB',
                    "code"=> 100
                ],

                [
                    "mno" => "9MOBILE",
                    "mno_id"=>4,
                    "validity" => 'D',
                    "amount" => 200,
                    "description"=>'Daily 650MB',
                    "code"=> 200
                ],

                [
                    "mno" => "9MOBILE",
                    "mno_id"=>4,
                    "validity" => 'W',
                    "amount" => 1500,
                    "description"=>'7GB Weekly',
                    "code"=> 1500
                ],

                [
                    "mno" => "9MOBILE",
                    "mno_id"=>4,
                    "validity" => 'M',
                    "amount" => 500,
                    "description"=>'500MB Monthly',
                    "code"=> 500
                ],

                [
                    "mno" => "9MOBILE",
                    "mno_id"=>4,
                    "validity" => 'M',
                    "amount" => 1000,
                    "description"=>'1.5GB Monthly',
                    "code"=> 1000
                ],

                [
                    "mno" => "9MOBILE",
                    "mno_id"=>4,
                    "validity" => 'M',
                    "amount" => 1200,
                    "description"=>'2GB Monthly',
                    "code"=> 1200
                ],

                [
                    "mno" => "9MOBILE",
                    "mno_id"=>4,
                    "validity" => 'M',
                    "amount" => 2000,
                    "description"=>'4.5GB Monthly',
                    "code"=> 2000
                ],

                [
                    "mno" => "9MOBILE",
                    "mno_id"=>4,
                    "validity" => 'M',
                    "amount" => 5000,
                    "description"=>'15GB Monthly',
                    "code"=> 5000
                ],

                [
                    "mno" => "9MOBILE",
                    "mno_id"=>4,
                    "validity" => 'M',
                    "amount" => 4000,
                    "description"=>'11GB Monthly',
                    "code"=> 4000
                ],

                [
                    "mno" => "9MOBILE",
                    "mno_id"=>4,
                    "validity" => 'M',
                    "amount" => 10000,
                    "description"=>'40GB Monthly',
                    "code"=> 10000
                ],

                [
                    "mno" => "9MOBILE",
                    "mno_id"=>4,
                    "validity" => 'M',
                    "amount" => 15000,
                    "description"=>'75GB Monthly',
                    "code"=> 15000
                ]

        ];

        for ($i = 0; $i < count($data); $i++)
            \DB::table('data_packages')->insert($data[$i]);
    }
}

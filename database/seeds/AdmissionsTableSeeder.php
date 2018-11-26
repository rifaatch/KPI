<?php

use Illuminate\Database\Seeder;

class AdmissionsTableSeeder  extends Seeder
{

    public function run()
    {

        DB::table('admissions')->insert([
            [
                'name' => 'Samer Joujou',
                'zoho_id' => '1000000000000000125',
                'office_id' => '1'

            ],
            [
                'name' => 'Ziad Maher',
                'zoho_id' => '1000000000000000126',
                'office_id' => '1'
            ],

            [
                'name' => 'Jerry Ismail',
                'zoho_id' => '1000000000000000127',
                'office_id' => '2'
            ],

            [
                'name' => 'Ema Aziz',
                'zoho_id' => '1000000000000000128',
                'office_id' => '2'

            ],
            [
                'name' => 'Issa Douman',
                'zoho_id' => '1000000000000000129',
                'office_id' => '3'
            ],

            [
                'name' => 'Joelie  Qamar',
                'zoho_id' => '1000000000000000130',
                'office_id' => '4'
            ],


        ]);

    }


}

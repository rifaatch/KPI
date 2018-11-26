<?php

use Illuminate\Database\Seeder;

class CounselorsTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('counselors')->insert([
            [
                'name' => 'Imad Jmal',
                'zoho_id' => '1000000000000000025',
                'office_id' => '1'

            ],
            [
                'name' => 'Ahmad Ahmad',
                'zoho_id' => '1000000000000000026',
                'office_id' => '1'
            ],

            [
                'name' => 'Lamiss Ismail',
                'zoho_id' => '1000000000000000027',
                'office_id' => '2'
            ],

            [
                'name' => 'Jalal Zriek',
                'zoho_id' => '1000000000000000028',
                'office_id' => '2'

            ],
            [
                'name' => 'Moussa Issa',
                'zoho_id' => '1000000000000000029',
                'office_id' => '3'
            ],

            [
                'name' => 'Jon Linon',
                'zoho_id' => '1000000000000000030',
                'office_id' => '4'
            ],


        ]);

    }


}

<?php

use Illuminate\Database\Seeder;

class OfficesTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('offices')->insert([
        [
            'office_name'=>'Tripoli',

        ],
        [
                'office_name'=>'Beirut',

            ],

            [
                'office_name'=>'Riyadh',

            ],

            [
                'office_name'=>'Sydney',

            ],

            [
                'office_name'=>'Dubai',

            ],

        ]);

    }



}

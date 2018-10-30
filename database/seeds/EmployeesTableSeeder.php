<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('employees')->insert([
            [
                'name' => 'Karim Salim',
                'zoho_id' => '1000000000000000001',
                'office_id' => '1'

            ],
            [
                'name' => 'Ahmad Dani',
                'zoho_id' => '1000000000000000002',
                'office_id' => '1'
            ],

            [
                'name' => 'Lamiss lokman',
                'zoho_id' => '1000000000000000003',
                'office_id' => '2'
            ],

            [
                'name' => 'Jalal Alam',
                'zoho_id' => '1000000000000000004',
                'office_id' => '2'

            ],
            [
                'name' => 'Hilal Moussa',
                'zoho_id' => '1000000000000000005',
                'office_id' => '3'
            ],

            [
                'name' => 'Jon Liloi',
                'zoho_id' => '1000000000000000006',
                'office_id' => '4'
            ],


        ]);

    }


}

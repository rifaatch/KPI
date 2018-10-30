<?php

use Illuminate\Database\Seeder;

class KpiIndicatorsTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('kpi_indicators')->insert([
            [
                'employee_id' => '1',
                'action' => '3',
                'newlead' => '3',
                'new_applications' => '3',
                'application_events' => '3',
                'new_contacts' => '3',
                'contact_events' => '3'

            ],
            [
                'employee_id' => '2',
                'action' => '4',
                'newlead' => '3',
                'new_applications' => '3',
                'application_events' => '3',
                'new_contacts' => '2',
                'contact_events' => '1'

            ],
            [
                'employee_id' => '3',
                'action' => '5',
                'newlead' => '3',
                'new_applications' => '0',
                'application_events' => '2',
                'new_contacts' => '3',
                'contact_events' => '3'

            ],
            [
                'employee_id' => '4',
                'action' => '3',
                'newlead' => '2',
                'new_applications' => '5',
                'application_events' => '3',
                'new_contacts' => '3',
                'contact_events' => '3'

            ],
            [
                'employee_id' => '5',
                'action' => '1',
                'newlead' => '3',
                'new_applications' => '3',
                'application_events' => '4',
                'new_contacts' => '3',
                'contact_events' => '4'

            ],

            [
                'employee_id' => '6',
                'action' => '1',
                'newlead' => '13',
                'new_applications' => '2',
                'application_events' => '4',
                'new_contacts' => '0',
                'contact_events' => '4'

            ],




        ]);

    }


}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            OfficesTableSeeder::class,
            EmployeesTableSeeder::class,
            KpiIndicatorsTableSeeder::class,
            AdmissionsTableSeeder::class,
            CounselorsTableSeeder::class

        ]);

    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKpiIndicatorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kpi_indicators', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('employee_id')->index('employee_id')->unique();
			$table->integer('action');
			$table->integer('newlead');

            $table->integer('new_applications');
            $table->integer('application_events');

            $table->integer('new_contacts');
            $table->integer('contact_events');

			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kpi_indicators');
	}

}

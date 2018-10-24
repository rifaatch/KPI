<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToApplicationEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('application_events', function(Blueprint $table)
		{
			$table->foreign('employee_id', 'application_events_ibfk_1')->references('id')->on('employees')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('aplication_id', 'application_events_ibfk_2')->references('id')->on('applications')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('application_events', function(Blueprint $table)
		{
			$table->dropForeign('application_events_ibfk_1');
			$table->dropForeign('application_events_ibfk_2');
		});
	}

}

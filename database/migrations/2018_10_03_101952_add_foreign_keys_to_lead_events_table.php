<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLeadEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lead_events', function(Blueprint $table)
		{
			$table->foreign('lead_id', 'lead_events_ibfk_1')->references('id')->on('leads')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('employ_id', 'lead_events_ibfk_2')->references('id')->on('employees')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('old_employee_id', 'lead_events_ibfk_3')->references('id')->on('employees')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lead_events', function(Blueprint $table)
		{
			$table->dropForeign('lead_events_ibfk_1');
			$table->dropForeign('lead_events_ibfk_2');
			$table->dropForeign('lead_events_ibfk_3');
		});
	}

}

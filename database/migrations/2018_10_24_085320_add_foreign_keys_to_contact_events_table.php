<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContactEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contact_events', function(Blueprint $table)
		{
			$table->foreign('employee_id', 'contact_events_ibfk_1')->references('id')->on('employees')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contact_id', 'contact_events_ibfk_2')->references('id')->on('contacts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contact_events', function(Blueprint $table)
		{
			$table->dropForeign('contact_events_ibfk_1');
			$table->dropForeign('contact_events_ibfk_2');
		});
	}

}

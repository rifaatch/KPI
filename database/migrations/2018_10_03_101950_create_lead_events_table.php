<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeadEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lead_events', function(Blueprint $table)
		{
			$table->integer('id', true);
		    $table->integer('zoho_id');
            $table->integer('action_id');

			$table->integer('employ_id')->index('employ_id');
			$table->integer('old_employee_id')->nullable()->index('old_employee_id');
			$table->string('action_name', 50);
			$table->text('description')->nullable();
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
		Schema::drop('lead_events');
	}

}

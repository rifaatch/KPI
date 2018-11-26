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
		    $table->integer('lead_id')->index('lead_id');;
            $table->bigInteger('zoho_id'); //this id is comming also fro zoho
            $table->bigInteger('action_id');

			$table->integer('employee_id')->index('employee_id');

            $table->integer('counselor_id')->nullable()->index('counselor_id');
            $table->integer('admission_id')->nullable()->index('admission_id');

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

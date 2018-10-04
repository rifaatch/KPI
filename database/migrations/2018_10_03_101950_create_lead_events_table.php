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
			$table->integer('owner_id')->nullable()->index('owner_id');
			$table->string('event_name', 50);
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

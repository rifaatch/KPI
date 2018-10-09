<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leads', function(Blueprint $table)
		{
			$table->integer('id', true);
            $table->integer('zoho_id');
			$table->enum('status', array('active','nactive','closed','converted','cancelled','creation'))->nullable();
			$table->string('client_name', 100)->nullable();
			$table->string('description', 100)->nullable();
			$table->string('action', 100)->nullable();
			$table->integer('employee_id')->index('employ_id');
		//	$table->string('employ_name', 100)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('leads');
	}

}

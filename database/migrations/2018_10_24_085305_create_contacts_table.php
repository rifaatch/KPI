<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->bigInteger('zoho_id');
			$table->enum('status', array('active','nactive','closed','cancelled','creation'));
			$table->string('client_name', 100)->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('source', 100)->nullable();
			$table->integer('employee_id')->index('employee_id');
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
		Schema::drop('contacts');
	}

}

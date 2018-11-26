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
            $table->bigInteger('zoho_id');
			$table->enum('status', array('active','nactive','closed','converted','cancelled','creation'))->nullable();
			$table->string('client_name', 100)->nullable();
            $table->text('description', 65535)->nullable();
			$table->string('action', 100)->nullable();
            $table->string('action', 100)->nullable();
            $table->text('source_details')->nullable();

			$table->integer('employee_id')->index('employee_id');

            $table->integer('counselor_id')->nullable()->index('counselor_id');
            $table->integer('admission_id')->nullable()->index('admission_id');


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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCounselorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('counselors', function(Blueprint $table)
		{
			$table->foreign('office_id', 'counselors_ibfk_1')->references('id')->on('offices')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('counselors', function(Blueprint $table)
		{
			$table->dropForeign('counselors_ibfk_1');
		});
	}

}

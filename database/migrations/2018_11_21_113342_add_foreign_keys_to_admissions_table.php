<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAdmissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('admissions', function(Blueprint $table)
		{
			$table->foreign('office_id', 'admissions_ibfk_1')->references('id')->on('offices')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('admissions', function(Blueprint $table)
		{
			$table->dropForeign('admissions_ibfk_1');
		});
	}

}

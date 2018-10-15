<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToKpiIndicatorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('kpi_indicators', function(Blueprint $table)
		{
			$table->foreign('employee_id', 'kpi_indicators_ibfk_1')->references('id')->on('employees')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('kpi_indicators', function(Blueprint $table)
		{
			$table->dropForeign('kpi_indicators_ibfk_1');
		});
	}

}

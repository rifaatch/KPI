<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationEventsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_events', function (Blueprint $table) {
            $table->integer('id', true);
            $table->bigInteger('zoho_id');
            $table->bigInteger('action_id');
            $table->integer('application_id')->index('application_id');
            $table->integer('employee_id')->index('employee_id');
            $table->integer('old_employee_id')->nullable();
            $table->string('action_name', 50);
            $table->text('description', 65535)->nullable();
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
        Schema::drop('application_events');
    }

}

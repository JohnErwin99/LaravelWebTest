<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_availabilities', function (Blueprint $table) {
            $table->id('availability_id');
            $table->unsignedBigInteger('employee_id', false);
            $table->unsignedBigInteger('site_id', false);
            $table->time('shift_start_time');
            $table->time('shift_end_time');
            $table->time('break_start');
            $table->time('break_end');
            $table->date('availability_date');
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
        Schema::dropIfExists('employee_availabilities');
    }
}

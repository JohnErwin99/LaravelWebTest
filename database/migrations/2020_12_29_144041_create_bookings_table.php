<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');
            $table->unsignedBigInteger('customer_id', false);
            $table->unsignedBigInteger('site_id', false);
            $table->unsignedBigInteger('employee_id', false);
            $table->date('booking_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('status', 15);
            $table->text('booking_details')->nullable();
            $table->string('service', 225);
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
        Schema::dropIfExists('bookings');
    }
}

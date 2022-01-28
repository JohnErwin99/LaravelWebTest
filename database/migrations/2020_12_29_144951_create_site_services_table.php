<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_services', function (Blueprint $table) {
            $table->id('site_service_id');
            $table->unsignedBigInteger('service_id', false);
            $table->foreignId('site_id')->references('site_id')->on('sites');
            $table->decimal('cost', 13, 2, true);
            $table->string('service_duration', 3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_services');
    }
}

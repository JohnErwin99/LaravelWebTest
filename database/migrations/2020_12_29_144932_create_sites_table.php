<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id('site_id', 11);
            $table->unsignedBigInteger('business_owner_id')->unique();
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->string('business_name', 50)->nullable();
            $table->string('business_domain', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('longitude', 50)->nullable();
            $table->string('latitude', 50)->nullable();
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
        Schema::dropIfExists('sites');
    }
}

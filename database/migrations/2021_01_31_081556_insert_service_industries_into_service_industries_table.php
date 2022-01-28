<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertServiceIndustriesIntoServiceIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('service_industries')->insert([
            ["industry_category_name" => 'Auto-mechanic'],
            ["industry_category_name" => 'Face treatments'],
            ["industry_category_name" => 'Hair removal'],
            ["industry_category_name" => 'Hair salon'],
            ["industry_category_name" => 'Makeup / Lashes / brows'],
            ["industry_category_name" => 'Med Spa'],
            ["industry_category_name" => 'Nails'],
            ["industry_category_name" => 'Tanning'],
            ["industry_category_name" => 'Tattoo/piercing'],
            ["industry_category_name" => 'Dentistry'],
            ["industry_category_name" => 'Law']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('service_industries')->delete();
    }
}

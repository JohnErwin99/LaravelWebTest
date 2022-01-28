<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertServicesIntoServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('services')->insert([
            ["service_name" =>'Brakes', "service_industry_id" => 1],
            ["service_name" =>'Electronic Fuel Injection', "service_industry_id" => 1],
            ["service_name" =>'Heating and Air Conditioning', "service_industry_id" => 1],
            ["service_name" =>'Muffler', "service_industry_id" => 1],
            ["service_name" =>'Oil Change', "service_industry_id" => 1],
            ["service_name" =>'Performance', "service_industry_id" => 1],
            ["service_name" =>'Rustproofing', "service_industry_id" => 1],
            ["service_name" =>'Shocks and Suspension', "service_industry_id" => 1],
            ["service_name" =>'Steering', "service_industry_id" => 1],
            ["service_name" => 'Tire repair', "service_industry_id" => 1],
            ["service_name" => 'Tire Rotation', "service_industry_id" => 1],
            ["service_name" => 'Transmission', "service_industry_id" => 1],
            ["service_name" => 'Tune-up', "service_industry_id" => 1],
            ["service_name" => 'Vehicle Esthetics', "service_industry_id" => 1],
            ["service_name" => 'Wheel Alignment', "service_industry_id" => 1],
            ["service_name" => 'Wheel balancing', "service_industry_id" => 1],
            ["service_name" => 'Acne', "service_industry_id" => 2],
            ["service_name" => 'Botox', "service_industry_id" => 2],
            ["service_name" => 'Facial', "service_industry_id" => 2],
            ["service_name" => 'Microdermabrasion', "service_industry_id" => 2],
            ["service_name" => 'Nuface', "service_industry_id" => 2],
            ["service_name" => 'Peels', "service_industry_id" => 2],
            ["service_name" => 'General', "service_industry_id" => 2],
            ["service_name" => 'Electrolysis', "service_industry_id" => 3],
            ["service_name" => 'Hair bleaching', "service_industry_id" => 3],
            ["service_name" => 'Laser', "service_industry_id" => 3],
            ["service_name" => 'Shaving', "service_industry_id" => 3],
            ["service_name" => 'Threading', "service_industry_id" => 3],
            ["service_name" => 'Waxing', "service_industry_id" => 3],
            ["service_name" => 'General Hair Removal', "service_industry_id" => 3],
            ["service_name" => 'Blowouts', "service_industry_id" => 4],
            ["service_name" => 'Braids', "service_industry_id" => 4],
            ["service_name" => 'Color', "service_industry_id" => 4],
            ["service_name" => 'Haircut', "service_industry_id" => 4],
            ["service_name" => 'Hair extensions', "service_industry_id" => 4],
            ["service_name" => 'Highlights/lowlights', "service_industry_id" => 4],
            ["service_name" => 'Kids', "service_industry_id" => 4],
            ["service_name" => 'Men\'s cut', "service_industry_id" => 4],
            ["service_name" => 'Special occasion', "service_industry_id" => 4],
            ["service_name" => 'Hair treatments', "service_industry_id" => 4],
            ["service_name" => 'Women\'s cuts', "service_industry_id" => 4],
            ["service_name" => 'Updo', "service_industry_id" => 4],
            ["service_name" => 'General', "service_industry_id" => 4],
            ["service_name" => 'Makeup application', "service_industry_id" => 5],
            ["service_name" => 'Bridal', "service_industry_id" => 5],
            ["service_name" => 'Eyelashes extension', "service_industry_id" => 5],
            ["service_name" => 'Latisse', "service_industry_id" => 5],
            ["service_name" => 'Microblading', "service_industry_id" => 5],
            ["service_name" => 'Permanent', "service_industry_id" => 5],
            ["service_name" => 'Semi-permanent', "service_industry_id" => 5],
            ["service_name" => 'Threading', "service_industry_id" => 5],
            ["service_name" => 'Trial', "service_industry_id" => 5],
            ["service_name" => 'General', "service_industry_id" => 5],
            ["service_name" => 'Acne', "service_industry_id" => 6],
            ["service_name" => 'Body contouring', "service_industry_id" => 6],
            ["service_name" => 'Botox', "service_industry_id" => 6],
            ["service_name" => 'Chemical peel', "service_industry_id" => 6],
            ["service_name" => 'Dermabrasion/microdermabrasion', "service_industry_id" => 6],
            ["service_name" => 'Dermal fillers', "service_industry_id" => 6],
            ["service_name" => 'Dermaplaning', "service_industry_id" => 6],
            ["service_name" => 'Face lift', "service_industry_id" => 6],
            ["service_name" => 'Hair removal', "service_industry_id" => 6],
            ["service_name" => 'Hair replacement', "service_industry_id" => 6],
            ["service_name" => 'Juvaderm', "service_industry_id" => 6],
            ["service_name" => 'Laser hair removel', "service_industry_id" => 6],
            ["service_name" => 'Light therapy', "service_industry_id" => 6],
            ["service_name" => 'Liposuction', "service_industry_id" => 6],
            ["service_name" => 'Microblading', "service_industry_id" => 6],
            ["service_name" => 'NuFace', "service_industry_id" => 6],
            ["service_name" => 'Permanent makeup', "service_industry_id" => 6],
            ["service_name" => 'Rejuvenation', "service_industry_id" => 6],
            ["service_name" => 'Scar removal', "service_industry_id" => 6],
            ["service_name" => 'Skin removal', "service_industry_id" => 6],
            ["service_name" => 'Scierotherapy', "service_industry_id" => 6],
            ["service_name" => 'General', "service_industry_id" => 6],
            ["service_name" => 'Acrylic', "service_industry_id" => 7],
            ["service_name" => 'Gel', "service_industry_id" => 7],
            ["service_name" => 'Manicure', "service_industry_id" => 7],
            ["service_name" => 'Pedicure', "service_industry_id" => 7],
            ["service_name" => 'General', "service_industry_id" => 7],
            ["service_name" => 'Organic', "service_industry_id" => 8],
            ["service_name" => 'Spray tan', "service_industry_id" => 8],
            ["service_name" => 'Sunless bed', "service_industry_id" => 8],
            ["service_name" => 'General', "service_industry_id" => 8],
            ["service_name" => 'Body', "service_industry_id" => 9],
            ["service_name" => 'Body', "service_industry_id" => 9],
            ["service_name" => 'Consultation', "service_industry_id" => 9],
            ["service_name" => 'Ear', "service_industry_id" => 9],
            ["service_name" => 'Henna', "service_industry_id" => 9],
            ["service_name" => 'Removal', "service_industry_id" => 9],
            ["service_name" => 'General', "service_industry_id" => 9],
            ["service_name" => 'Complete exams, x-rays and dental cleanings', "service_industry_id" => 10],
            ["service_name" => 'Fillings, root canals and extractions', "service_industry_id" => 10],
            ["service_name" => 'Cosmetic (Whitening, porcelain and composite veneers)', "service_industry_id" => 10],
            ["service_name" => 'implants - placement and restoration', "service_industry_id" => 10],
            ["service_name" => 'Crowns, bridges, full and partial dentures', "service_industry_id" => 10],
            ["service_name" => 'implants', "service_industry_id" => 10],
            ["service_name" => 'Orthodontics', "service_industry_id" => 10],
            ["service_name" => 'Oral appliances for control of sleep apnea', "service_industry_id" => 10],
            ["service_name" => 'Preventive care', "service_industry_id" => 10],
            ["service_name" => 'Periodontal therapy', "service_industry_id" => 10],
            ["service_name" => 'Nutritional counselling', "service_industry_id" => 10],
            ["service_name" => 'Relaxation techniques', "service_industry_id" => 10],
            ["service_name" => 'Consultation', "service_industry_id" => 11],
            ["service_name" => 'Client Visit', "service_industry_id"=> 11]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('services')->delete();
    }
}

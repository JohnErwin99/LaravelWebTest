<?php

namespace Database\Seeders;

use Brick\Math\BigInteger;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 29; $i++) {
        DB::table('sites')->insert(
            [
                'site_id' => BigInteger::randomRange(1, 300),
                'business_owner_id' => BigInteger::randomRange(1, 300),
                'site_name' => Str::random(10),
                'site_email' => Str::random(10).'@gmail.com',
                'business_domain' => Str::random(8),
                'address' => Str::random(14),
                'postal_code' => Str::random(10),
                'phone_number' => Str::random(15),
                'longitude' => Str::random(20),
                'latitude' => Str::random(20)
            ]
        );
    }
    }
}

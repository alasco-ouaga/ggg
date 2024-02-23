<?php

namespace Database\Seeders;

use Botble\RealEstate\Facades\RealEstateHelper;
use Botble\RealEstate\Models\Property;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        Property::query()->update(['expire_date' => Carbon::now()->addDays(RealEstateHelper::propertyExpiredDays())]);

        DB::statement('UPDATE re_properties SET views = FLOOR(rand() * 10000) + 1;');
    }
}

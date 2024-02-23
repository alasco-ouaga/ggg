<?php

namespace Database\Seeders;

use Botble\Location\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            "name"=>"Burkina Faso",
            "nationality"=>"Burkinabé",
            "order"=>0,
            "is_default"=>false,
            "status"=>"published",
            "code"=>"BF",
        ];
        
        Country::insert($countries);
    }
}

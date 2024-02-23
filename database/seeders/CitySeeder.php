<?php

namespace Database\Seeders;

use Botble\Location\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                "name" => "Ouagadougou",
                "state_id" => 1,
                "country_id" => 1,
                "order" => 0,
                "is_default" => false,
                "status" => "published",
            ],
            [
                "name" => "Koudougou",
                "state_id" => 1,
                "country_id" => 1,
                "order" => 0,
                "is_default" => false,
                "status" => "published",
            ],
            [
                "name" => "Ziniaré",
                "state_id" => 1,
                "country_id" => 1,
                "order" => 0,
                "is_default" => false,
                "status" => "published",
            ],
            [
                "name" => "Kongoussi",
                "state_id" => 1,
                "country_id" => 1,
                "order" => 0,
                "is_default" => false,
                "status" => "published",
            ],
            [
                "name" => "Boussé",
                "state_id" => 1,
                "country_id" => 1,
                "order" => 0,
                "is_default" => false,
                "status" => "published",
            ],
            [
                "name" => "Zorgho",
                "state_id" => 1,
                "country_id" => 1,
                "order" => 0,
                "is_default" => false,
                "status" => "published",
            ],
            [
                "name" => "Kaya",
                "state_id" => 1,
                "country_id" => 1,
                "order" => 0,
                "is_default" => false,
                "status" => "published",
            ],
            [
                "name" => "Réo",
                "state_id" => 1,
                "country_id" => 1,
                "order" => 0,
                "is_default" => false,
                "status" => "published",
            ],
            [
                "name" => "Koupéla",
                "state_id" => 1,
                "country_id" => 1,
                "order" => 0,
                "is_default" => false,
                "status" => "published",
            ],
            [
                "name" => "Kokologho",
                "state_id" => 1,
                "country_id" => 1,
                "order" => 0,
                "is_default" => false,
                "status" => "published",
            ],
        ];

        City::insert($cities);
    }
}

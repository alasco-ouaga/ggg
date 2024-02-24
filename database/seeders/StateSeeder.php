<?php

namespace Database\Seeders;

use Botble\Location\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $regions = [
                [
                    "name" => "Centre",
                    "country_id" => 1,
                    "is_default" => true,
                    "status" => "published",
                    "order" => 1,
                ],
                [
                    "name" => "Hauts-Bassins",
                    "country_id" => 1,
                    "is_default" => false,
                    "status" => "published",
                    "order" => 0,
                ],
                [
                    "name" => "Centre-Ouest",
                    "country_id" => 1,
                    "is_default" => false,
                    "status" => "published",
                    "order" => 0,
                ],
                [
                    "name" => "Sud-Ouest",
                    "country_id" => 1,
                    "is_default" => false,
                    "status" => "published",
                    "order" => 0,
                ],
                [
                    "name" => "Boucle du Mouhoun",
                    "country_id" => 1,
                    "is_default" => false,
                    "status" => "published",
                    "order" => 0,
                ],
                [
                    "name" => "Cascades",
                    "country_id" => 1,
                    "is_default" => false,
                    "status" => "published",
                    "order" => 0,
                ],
                [
                    "name" => "Centre-Est",
                    "country_id" => 1,
                    "is_default" => false,
                    "status" => "published",
                    "order" => 0,
                ],
                [
                    "name" => "Centre-Nord",
                    "country_id" => 1,
                    "is_default" => false,
                    "status" => "published",
                    "order" => 0,
                ],
                
                [
                    "name" => "Centre-Sud",
                    "country_id" => 1,
                    "is_default" => false,
                    "status" => "published",
                    "order" => 0,
                ],
                [
                    "name" => "Est",
                    "country_id" => 1,
                    "is_default" => false,
                    "status" => "published",
                    "order" => 0,
                ],
                [
                    "name" => "Nord",
                    "country_id" => 1,
                    "is_default" => false,
                    "status" => "published",
                    "order" => 0,
                ],
                [
                    "name" => "Plateau-Central",
                    "country_id" => 1,
                    "is_default" => false,
                    "status" => "published",
                    "order" => 0,
                ],
                [
                    "name" => "Sahel",
                    "country_id" => 1,
                    "is_default" => false,
                    "status" => "published",
                    "order" => 0,
                ],
               
            ];

            State::insert($regions);
    }
}

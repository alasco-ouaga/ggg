<?php

namespace Database\Seeders;

use App\Models\Locality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocalitySeeder extends Seeder
{

    public function run()
    {
        $localities = [
            [
                "name" => "Tampouy",
                "city_id" => 1,
            ],
            [
                "name" => "Patte d'Oie",
                "city_id" => 1,
            ],
            [
                "name" => "Gounghin",
                "city_id" => 1,
            ],
            [
                "name" => "Larle",
                "city_id" => 1,
            ],
            [
                "name" => "Noncin",
                "city_id" => 1,
            ],

            [
                "name" => "Rimkieta",
                "city_id" => 1,
            ],

            [
                "name" => "Kilwin",
                "city_id" => 1,
            ],
        ];
        Locality::insert($localities);
    }
}

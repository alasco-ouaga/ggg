<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Base\Supports\Database;

class DatabaseSeeder extends BaseSeeder
{
    public function run(): void
    {
        // Database::restoreFromPath(base_path('database.sql'));

        $this->activateAllPlugins();

        $this->call([
            LanguageSeeder::class,
            CurrencySeeder::class,
            CategorySeeder::class,
            FacilitySeeder::class,
            FeatureSeeder::class,
            PackageSeeder::class,
            AccountSeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
            PageSeeder::class,
            LatLongSeeder::class,
            MenuSeeder::class,
            ThemeOptionSeeder::class,
            BlogSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            LocalitySeeder::class,
        ]);

        $this->uploadFiles('banner');
        $this->uploadFiles('cities');
        $this->uploadFiles('logo');
        $this->uploadFiles('projects');
        $this->uploadFiles('properties');
        $this->uploadFiles('users');

        $this->finished();
    }
}

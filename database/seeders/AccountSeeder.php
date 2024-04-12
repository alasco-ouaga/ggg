<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\RealEstate\Models\Account;
use Botble\RealEstate\Models\Property;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountSeeder extends BaseSeeder
{
    public function run(): void
    {
        $files = $this->uploadFiles('accounts');
        $faker = fake();

        $accounts = [
            [
                'first_name' => "Ilboudo",
                'last_name' => "Alassane",
                'status' => true,
                'email' => 'alascosite@gmail.com',
                'username' => "alassane",
                'password' => Hash::make('madrilene'),
                'dob' => $faker->dateTime(),
                'phone' => "0022674709404",
                'description' => "Notre souhait , votre satisfaction",
                'credits' => 10,
                'confirmed_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'avatar_id' => $faker->randomElements($files)[0]['data']->id,
            ],
            [
                'first_name' => "Sawadogo",
                'last_name' => "Ousseni",
                'email' => 'alassane.bousse@gmail.com',
                'status' => false,
                'username' => "ousseni",
                'password' => Hash::make('madrilene'),
                'dob' => $faker->dateTime(),
                'phone' => "0022674709405",
                'description' => "Notre souhait , votre satisfaction",
                'credits' => 10,
                'confirmed_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'avatar_id' => $faker->randomElements($files)[0]['data']->id,
            ],
            [
                'first_name' => "Sawadogo",
                'last_name' => "Adamo",
                'status' => false,
                'email' => 'adamo@eliteit.com',
                'username' => "adamo",
                'password' => Hash::make('madrilene'),
                'dob' => $faker->dateTime(),
                'phone' => "0022674709406",
                'description' => "Notre souhait , votre satisfaction",
                'credits' => 10,
                'confirmed_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'avatar_id' => $faker->randomElements($files)[0]['data']->id,
            ],
            [
                'first_name' => "Lompo",
                'last_name' => "Laurent",
                'email' => 'lompo@eliteit.com',
                'status' => false,
                'username' => "lompo",
                'password' => Hash::make('madrilene'),
                'dob' => $faker->dateTime(),
                'phone' =>  "0022674709407",
                'description' => "Notre souhait , votre satisfaction",
                'credits' => 10,
                'confirmed_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'avatar_id' => $faker->randomElements($files)[0]['data']->id,
            ],
            
        ];
        Account::insert($accounts);

        foreach (Account::query()->get() as $account) {
            if (is_int($account->id) && $account->id % 2 == 0) {
                $account->is_featured = true;
                $account->save();
            }
        }
    }
}

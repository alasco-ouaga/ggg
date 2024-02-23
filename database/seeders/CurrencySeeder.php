<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\RealEstate\Models\Currency;

class CurrencySeeder extends BaseSeeder
{
    public function run(): void
    {
        Currency::query()->truncate();
        $currencies = [
            [
                'title' => 'USD',
                'symbol' => '$',
                'is_prefix_symbol' => true,
                'order' => 0,
                'decimals' => 2,
                'is_default' => 1,
                'exchange_rate' => 1,
            ],
            [
                'title' => 'EUR',
                'symbol' => '€',
                'is_prefix_symbol' => false,
                'order' => 1,
                'decimals' => 2,
                'is_default' => 0,
                'exchange_rate' => 0.91,
            ],
            [
                'title' => 'FCFA',
                'symbol' => 'FCFA',
                'is_prefix_symbol' => true,
                'order' => 2,
                'decimals' => 0,
                'is_default' => 0,
                'exchange_rate' => 0.0017, // Ajoutez ici le taux de change correct du CFA par rapport au dollar ou à l'euro
            ],
        ];

        foreach ($currencies as $currency) {
            Currency::query()->create($currency);
        }
    }
}

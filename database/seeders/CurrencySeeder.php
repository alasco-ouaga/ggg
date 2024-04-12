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
                'title' => 'FCFA',
                'symbol' => 'FCFA',
                'is_prefix_symbol' => true,
                'order' => 2,
                'decimals' => 0,
                'is_default' => 0,
                'exchange_rate' => 0, // Ajoutez ici le taux de change correct du CFA par rapport au dollar ou à l'euro
            ],
        ];

        foreach ($currencies as $currency) {
            Currency::query()->create($currency);
        }
    }
}

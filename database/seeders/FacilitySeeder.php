<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\RealEstate\Models\Facility;
use Botble\RealEstate\Models\Property;

class FacilitySeeder extends BaseSeeder
{
    public function run(): void
    {
        Facility::query()->truncate();
        $facilities = [
            [
                'name' => 'Hôpital',
                'icon' => 'far fa-hospital',
            ],
            [
                'name' => 'Supermarché',
                'icon' => 'fas fa-cart-plus',
            ],
            [
                'name' => 'École',
                'icon' => 'fas fa-school',
            ],
            [
                'name' => 'Divertissement',
                'icon' => 'fas fa-hotel',
            ],
            [
                'name' => 'Pharmacie',
                'icon' => 'fas fa-prescription-bottle-alt',
            ],
            [
                'name' => 'Aéroport',
                'icon' => 'fas fa-plane-departure',
            ],
            [
                'name' => 'Chemins de fer',
                'icon' => 'fas fa-subway',
            ],
            [
                'name' => 'Arrêt de bus',
                'icon' => 'fas fa-bus',
            ],
            [
                'name' => 'Plage',
                'icon' => 'fas fa-umbrella-beach',
            ],
            [
                'name' => 'Centre commercial',
                'icon' => 'fas fa-cart-plus',
            ],
            [
                'name' => 'Banque',
                'icon' => 'fas fa-university',
            ],
        ];

        foreach ($facilities as $facility) {
            Facility::query()->create($facility);
        }

        foreach (Property::query()->get() as $property) {
            $property->facilities()->detach();
            for ($i = 1; $i < 12; $i++) {
                $property->facilities()->attach($i, ['distance' => rand(1, 20) . 'km']);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use LucasDotVin\Soulbscription\Enums\PeriodicityType;
use LucasDotVin\Soulbscription\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // API Requests (Consumable feature, renewed daily)
        Feature::create([
            'consumable' => true,
            'name' => 'api-requests',
            'periodicity_type' => PeriodicityType::Day,
            'periodicity' => 1,
        ]);

        // Restrict access to certain APIs for Free plan
        $restrictedApiAccess = Feature::create([
            'consumable' => false,
            'name' => 'restricted-api-access',  // Feature for access control
        ]);
    }
}

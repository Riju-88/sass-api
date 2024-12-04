<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use LucasDotVin\Soulbscription\Enums\PeriodicityType;
use LucasDotVin\Soulbscription\Models\Feature;
use LucasDotVin\Soulbscription\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $free = Plan::create([
            'name' => 'free',
            'periodicity_type' => null,
            'periodicity' => null,
        ]);

        $silver = Plan::create([
            'name' => 'silver',
            'periodicity_type' => PeriodicityType::Month,
            'periodicity' => 1,
        ]);

        $gold = Plan::create([
            'name' => 'gold',
            'periodicity_type' => PeriodicityType::Month,
            'periodicity' => 1,
        ]);

        // Fetch features
        $apiRequests = Feature::where('name', 'api-requests')->first();
        $restrictedApiAccess = Feature::where('name', 'restricted-api-access')->first();

        // Attach features to the plans
        // Free Plan: 10 requests/day, No restricted API access
        $free->features()->attach($apiRequests, ['charges' => 10]);

        // Silver Plan: 20 requests/day, Access to restricted APIs
        $silver->features()->attach($apiRequests, ['charges' => 20]);
        $silver->features()->attach($restrictedApiAccess);

        // Gold Plan: 30 requests/day, Access to restricted APIs
        $gold->features()->attach($apiRequests, ['charges' => 30]);
        $gold->features()->attach($restrictedApiAccess);
    }
}

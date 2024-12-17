<?php

namespace App\Filament\Resources\PlanResource\Pages;

use App\Filament\Resources\PlanResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use LucasDotVin\Soulbscription\Models\Feature;
use LucasDotVin\Soulbscription\Models\Plan;

class CreatePlan extends CreateRecord
{
    protected static string $resource = PlanResource::class;

    /**
     * Override the record creation logic to prevent duplicates.
     */
    protected function handleRecordCreation(array $data): Model
    {
        // Manually create the Plan model
        $plan = Plan::create([
            'name' => $data['name'],
            'periodicity_type' => $data['periodicity_type'],
            'periodicity' => $data['periodicity'],
        ]);

        // Sync features with charges
        $this->syncFeaturesWithCharges($plan, $data['features_with_charges'] ?? []);

        return $plan;  // Return the created Plan instance
    }

    /**
     * Sync the features with their respective charges.
     */
    private function syncFeaturesWithCharges(Plan $plan, array $featuresWithCharges): void
    {
        // Prepare data for sync: [feature_id => ['charges' => value]]
        $syncData = [];
        foreach ($featuresWithCharges as $item) {
            $syncData[$item['feature_id']] = ['charges' => $item['charges']];
        }

        // Sync features with charges
        $plan->features()->sync($syncData);
    }
}

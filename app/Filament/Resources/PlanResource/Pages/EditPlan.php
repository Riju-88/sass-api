<?php

namespace App\Filament\Resources\PlanResource\Pages;

use App\Filament\Resources\PlanResource;
use App\Models\Plandetail;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;
use LucasDotVin\Soulbscription\Models\Feature;

class EditPlan extends EditRecord
{
    protected static string $resource = PlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    /**
     * Prepare form data for the edit form.
     * Populate the Repeater with existing features and charges.
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $plan = $this->getRecord();

        // Fetch features with charges and format for the Repeater
        $data['features_with_charges'] = $plan->features->map(function ($feature) {
            return [
                'feature_id' => $feature->id,
                'charges' => $feature->pivot->charges,
            ];
        })->toArray();

        // Fetch the plandetail and populate its fields
        $plandetail = Plandetail::where('plan_id', $plan->id)->first();
        if ($plandetail) {
            $data['description'] = $plandetail->description;
            $data['price'] = $plandetail->price;
        }

        return $data;
    }

    /**
     * Process and save the updated form data.
     * Attach features with charges to the pivot table and update plandetail.
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->syncFeaturesWithCharges($data);

        // Update the plandetail record
        $this->updatePlanDetail($data);

        unset($data['features_with_charges']);  // Remove Repeater data after processing
        unset($data['description'], $data['price']);  // Remove plandetail data after processing

        return $data;
    }

    /**
     * Sync the features with their respective charges.
     */
    private function syncFeaturesWithCharges(array $data): void
    {
        $plan = $this->getRecord();

        if (!isset($data['features_with_charges'])) {
            return;
        }

        // Prepare data for sync: [feature_id => ['charges' => value]]
        $syncData = [];
        foreach ($data['features_with_charges'] as $item) {
            $syncData[$item['feature_id']] = ['charges' => $item['charges']];
        }

        // Sync features with charges
        $plan->features()->sync($syncData);
    }

    /**
     * Update the plandetail record.
     */
    private function updatePlanDetail(array $data): void
    {
        $plan = $this->getRecord();

        // Find or create the plandetail for the current plan
        $plandetail = Plandetail::firstOrNew(['plan_id' => $plan->id]);

        // Update the plandetail fields
        $plandetail->description = $data['description'] ?? $plandetail->description;
        $plandetail->price = $data['price'] ?? $plandetail->price;
        $plandetail->save();
    }
}

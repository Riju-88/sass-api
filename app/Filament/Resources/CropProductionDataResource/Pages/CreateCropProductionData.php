<?php

namespace App\Filament\Resources\CropProductionDataResource\Pages;

use App\Filament\Resources\CropProductionDataResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCropProductionData extends CreateRecord
{
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
    
    protected static string $resource = CropProductionDataResource::class;
}

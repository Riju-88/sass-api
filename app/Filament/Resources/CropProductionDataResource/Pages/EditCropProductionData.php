<?php

namespace App\Filament\Resources\CropProductionDataResource\Pages;

use App\Filament\Resources\CropProductionDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCropProductionData extends EditRecord
{
    protected static string $resource = CropProductionDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

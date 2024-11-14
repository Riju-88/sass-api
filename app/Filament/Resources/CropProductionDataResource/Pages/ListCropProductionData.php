<?php

namespace App\Filament\Resources\CropProductionDataResource\Pages;

use App\Filament\Resources\CropProductionDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCropProductionData extends ListRecords
{
    protected static string $resource = CropProductionDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\AnnualTemperatureResource\Pages;

use App\Filament\Resources\AnnualTemperatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnnualTemperatures extends ListRecords
{
    protected static string $resource = AnnualTemperatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

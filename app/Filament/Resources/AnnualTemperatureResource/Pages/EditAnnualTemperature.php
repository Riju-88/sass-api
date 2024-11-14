<?php

namespace App\Filament\Resources\AnnualTemperatureResource\Pages;

use App\Filament\Resources\AnnualTemperatureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAnnualTemperature extends EditRecord
{
    protected static string $resource = AnnualTemperatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

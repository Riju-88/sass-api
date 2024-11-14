<?php

namespace App\Filament\Resources\AnnualTemperatureResource\Pages;

use App\Filament\Resources\AnnualTemperatureResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateAnnualTemperature extends CreateRecord
{
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected static string $resource = AnnualTemperatureResource::class;
}

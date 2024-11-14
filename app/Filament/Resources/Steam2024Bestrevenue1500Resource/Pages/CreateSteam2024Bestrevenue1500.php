<?php

namespace App\Filament\Resources\Steam2024Bestrevenue1500Resource\Pages;

use App\Filament\Resources\Steam2024Bestrevenue1500Resource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateSteam2024Bestrevenue1500 extends CreateRecord
{
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected static string $resource = Steam2024Bestrevenue1500Resource::class;
}

<?php

namespace App\Filament\Resources\SportsResource\Pages;

use App\Filament\Resources\SportsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSports extends CreateRecord
{
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
    protected static string $resource = SportsResource::class;
}

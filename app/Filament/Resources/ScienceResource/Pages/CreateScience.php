<?php

namespace App\Filament\Resources\ScienceResource\Pages;

use App\Filament\Resources\ScienceResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateScience extends CreateRecord
{
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected static string $resource = ScienceResource::class;
}

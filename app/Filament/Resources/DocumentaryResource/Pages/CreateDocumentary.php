<?php

namespace App\Filament\Resources\DocumentaryResource\Pages;

use App\Filament\Resources\DocumentaryResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateDocumentary extends CreateRecord
{
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected static string $resource = DocumentaryResource::class;
}

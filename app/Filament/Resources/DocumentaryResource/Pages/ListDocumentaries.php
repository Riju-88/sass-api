<?php

namespace App\Filament\Resources\DocumentaryResource\Pages;

use App\Filament\Resources\DocumentaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDocumentaries extends ListRecords
{
    protected static string $resource = DocumentaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

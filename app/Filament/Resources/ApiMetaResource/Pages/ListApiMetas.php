<?php

namespace App\Filament\Resources\ApiMetaResource\Pages;

use App\Filament\Resources\ApiMetaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApiMetas extends ListRecords
{
    protected static string $resource = ApiMetaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

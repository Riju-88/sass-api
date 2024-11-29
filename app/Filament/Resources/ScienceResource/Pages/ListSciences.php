<?php

namespace App\Filament\Resources\ScienceResource\Pages;

use App\Filament\Resources\ScienceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSciences extends ListRecords
{
    protected static string $resource = ScienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

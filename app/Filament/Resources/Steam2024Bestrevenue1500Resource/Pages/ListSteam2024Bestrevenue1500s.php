<?php

namespace App\Filament\Resources\Steam2024Bestrevenue1500Resource\Pages;

use App\Filament\Resources\Steam2024Bestrevenue1500Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSteam2024Bestrevenue1500s extends ListRecords
{
    protected static string $resource = Steam2024Bestrevenue1500Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

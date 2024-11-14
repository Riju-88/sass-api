<?php

namespace App\Filament\Resources\Steam2024Bestrevenue1500Resource\Pages;

use App\Filament\Resources\Steam2024Bestrevenue1500Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSteam2024Bestrevenue1500 extends EditRecord
{
    protected static string $resource = Steam2024Bestrevenue1500Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

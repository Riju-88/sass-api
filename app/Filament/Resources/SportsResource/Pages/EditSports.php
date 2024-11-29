<?php

namespace App\Filament\Resources\SportsResource\Pages;

use App\Filament\Resources\SportsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSports extends EditRecord
{
    protected static string $resource = SportsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

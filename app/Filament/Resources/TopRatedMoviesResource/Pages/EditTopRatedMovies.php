<?php

namespace App\Filament\Resources\TopRatedMoviesResource\Pages;

use App\Filament\Resources\TopRatedMoviesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTopRatedMovies extends EditRecord
{
    protected static string $resource = TopRatedMoviesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

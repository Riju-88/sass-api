<?php

namespace App\Filament\Resources\TopRatedMoviesResource\Pages;

use App\Filament\Resources\TopRatedMoviesResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateTopRatedMovies extends CreateRecord
{
    /**
     * Sets the user_id on the record being created.
     *
     * @param array $data
     * @return array
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected static string $resource = TopRatedMoviesResource::class;
}

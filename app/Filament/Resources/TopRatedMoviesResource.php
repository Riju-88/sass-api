<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopRatedMoviesResource\Pages;
use App\Filament\Resources\TopRatedMoviesResource\RelationManagers;
use App\Models\TopRatedMovies;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TopRatedMoviesResource extends Resource
{
    protected static ?string $model = TopRatedMovies::class;

    protected static ?string $navigationGroup = 'APIs';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('popularity')
                    ->numeric(),
                Forms\Components\TextInput::make('release_date')
                    ->maxLength(10),
                Forms\Components\TextInput::make('title')
                    ->maxLength(62),
                Forms\Components\TextInput::make('vote_average')
                    ->numeric(),
                // Forms\Components\TextInput::make('user_id')
                //     ->required()
                //     ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('popularity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('release_date')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vote_average')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTopRatedMovies::route('/'),
            'create' => Pages\CreateTopRatedMovies::route('/create'),
            'edit' => Pages\EditTopRatedMovies::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Steam2024Bestrevenue1500Resource\Pages;
use App\Filament\Resources\Steam2024Bestrevenue1500Resource\RelationManagers;
use App\Models\Steam2024Bestrevenue1500;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class Steam2024Bestrevenue1500Resource extends Resource
{
    protected static ?string $model = Steam2024Bestrevenue1500::class;

    protected static ?string $navigationGroup = 'APIs';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(207),
                Forms\Components\TextInput::make('releaseDate')
                    ->maxLength(10),
                Forms\Components\TextInput::make('copiesSold')
                    ->numeric(),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\TextInput::make('revenue')
                    ->maxLength(18),
                Forms\Components\TextInput::make('avgPlaytime')
                    ->maxLength(18),
                Forms\Components\TextInput::make('reviewScore')
                    ->numeric(),
                Forms\Components\TextInput::make('publisherClass')
                    ->maxLength(8),
                Forms\Components\TextInput::make('publishers')
                    ->maxLength(60),
                Forms\Components\TextInput::make('developers')
                    ->maxLength(70),
                Forms\Components\TextInput::make('steamId')
                    ->numeric(),
                // Forms\Components\TextInput::make('user_id')
                //     ->required()
                //     ->numeric()
                //     ->disabled()
                // ->default(auth()->user()->id),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('releaseDate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('copiesSold')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('revenue')
                    ->searchable(),
                Tables\Columns\TextColumn::make('avgPlaytime')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reviewScore')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('publisherClass')
                    ->searchable(),
                Tables\Columns\TextColumn::make('publishers')
                    ->searchable(),
                Tables\Columns\TextColumn::make('developers')
                    ->searchable(),
                Tables\Columns\TextColumn::make('steamId')
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
            'index' => Pages\ListSteam2024Bestrevenue1500s::route('/'),
            'create' => Pages\CreateSteam2024Bestrevenue1500::route('/create'),
            'edit' => Pages\EditSteam2024Bestrevenue1500::route('/{record}/edit'),
        ];
    }
}

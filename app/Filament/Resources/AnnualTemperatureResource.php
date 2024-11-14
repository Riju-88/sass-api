<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnnualTemperatureResource\Pages;
use App\Filament\Resources\AnnualTemperatureResource\RelationManagers;
use App\Models\AnnualTemperature;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnnualTemperatureResource extends Resource
{
    protected static ?string $model = AnnualTemperature::class;

    protected static ?string $navigationGroup = 'APIs';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('country')
                    ->maxLength(44),
                Forms\Components\TextInput::make('Year')
                    ->numeric(),
                Forms\Components\TextInput::make('Temperature anomaly')
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
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Year')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Temperature anomaly')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListAnnualTemperatures::route('/'),
            'create' => Pages\CreateAnnualTemperature::route('/create'),
            'edit' => Pages\EditAnnualTemperature::route('/{record}/edit'),
        ];
    }
}

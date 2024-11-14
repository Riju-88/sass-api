<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CropProductionDataResource\Pages;
use App\Filament\Resources\CropProductionDataResource\RelationManagers;
use App\Models\CropProductionData;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CropProductionDataResource extends Resource
{
    protected static ?string $model = CropProductionData::class;

    protected static ?string $navigationGroup = 'APIs';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('State_Name')
                    ->maxLength(22),
                Forms\Components\TextInput::make('District_Name')
                    ->maxLength(26),
                Forms\Components\TextInput::make('Crop_Year')
                    ->numeric(),
                Forms\Components\TextInput::make('Season')
                    ->maxLength(11),
                Forms\Components\TextInput::make('Crop')
                    ->maxLength(25),
                Forms\Components\TextInput::make('Area')
                    ->numeric(),
                Forms\Components\TextInput::make('Production')
                    ->maxLength(10),
                // Forms\Components\TextInput::make('user_id')
                //     ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('State_Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('District_Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Crop_Year')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Season')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Crop')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Area')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Production')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListCropProductionData::route('/'),
            'create' => Pages\CreateCropProductionData::route('/create'),
            'edit' => Pages\EditCropProductionData::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeatureResource\Pages;
use App\Filament\Resources\FeatureResource\RelationManagers;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use LucasDotVin\Soulbscription\Enums\PeriodicityType;
use LucasDotVin\Soulbscription\Models\Feature;  // Use the custom namespace

class FeatureResource extends Resource
{
    protected static ?string $model = Feature::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                    ->live(onBlur: true)  // Update when the user finishes typing (on blur)
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        // Only update the name field if it isn't already slugified
                        if ($state && $state !== Str::slug($state)) {
                            $set('name', Str::slug($state));  // Slugify the name
                        }
                    })
                    ->required(),
                Toggle::make('consumable')
                    ->label('Consumable')
                    ->default(false),
                Toggle::make('quota')
                    ->label('Quota')
                    ->default(false),
                Toggle::make('postpaid')
                    ->label('Postpaid')
                    ->default(false),
                Select::make('periodicity_type')
                    ->label('Periodicity Type')
                    ->options([
                        PeriodicityType::Day => 'Day',
                        PeriodicityType::Month => 'Month',
                        PeriodicityType::Year => 'Year',
                    ]),
                // ->required()
                // ->visible(fn($get) => $get('consumable'))
                TextInput::make('periodicity')
                    ->label('Periodicity')
                    ->numeric(),
                // ->visible(fn($get) => $get('consumable'))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')->label('Name')->sortable()->searchable(),
                IconColumn::make('consumable')->label('Consumable')->boolean(),
                TextColumn::make('periodicity_type')->label('Periodicity Type'),
                TextColumn::make('periodicity')->label('Periodicity')->sortable(),
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
            'index' => Pages\ListFeatures::route('/'),
            'create' => Pages\CreateFeature::route('/create'),
            'edit' => Pages\EditFeature::route('/{record}/edit'),
        ];
    }
}

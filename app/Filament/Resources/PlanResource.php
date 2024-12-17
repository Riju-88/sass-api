<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlanResource\Pages;
use App\Filament\Resources\PlanResource\RelationManagers;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use LucasDotVin\Soulbscription\Models\Feature;
use LucasDotVin\Soulbscription\Models\Plan;

class PlanResource extends Resource
{
    protected static ?string $model = Plan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                    ->required()
                    ->label('Plan Name'),
                Select::make('periodicity_type')
                    ->label('Periodicity Type')
                    ->options([
                        'day' => 'Day',
                        'month' => 'Month',
                        'year' => 'Year',
                    ])
                    ->nullable()
                    ->default(null),
                TextInput::make('periodicity')
                    ->numeric()
                    ->nullable()
                    ->label('Periodicity'),
                Repeater::make('features_with_charges')
                    ->label('Features and Charges')
                    ->schema([
                        Select::make('feature_id')
                            ->label('Feature')
                            ->options(Feature::pluck('name', 'id'))
                            ->required()
                            ->searchable()
                            ->live(),
                        TextInput::make('charges')
                            ->label('Charges')
                            ->numeric()
                            ->nullable()
                            ->visible(fn($get) => Feature::find($get('feature_id'))->consumable ?? true),
                    ])
                    ->minItems(1)
                    ->columns(2)
                    ->helperText('Add features with their respective charges.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')->label('Name')->sortable()->searchable(),
                TextColumn::make('periodicity_type')->label('Periodicity Type'),
                TextColumn::make('periodicity')->label('Periodicity'),
                ToggleColumn::make('active')->label('Active'),
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
            'index' => Pages\ListPlans::route('/'),
            'create' => Pages\CreatePlan::route('/create'),
            'edit' => Pages\EditPlan::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApiMetaResource\Pages;
use App\Filament\Resources\ApiMetaResource\RelationManagers;
use App\Models\ApiMeta;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\App;

class ApiMetaResource extends Resource
{
    protected static ?string $model = ApiMeta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('description')->required(),
                TextInput::make('name')->required(),
                TextInput::make('price')->numeric()->minValue(0)->required(),
                Select::make('related_table')
                    ->options(function () {
                        $modelPath = app_path('Models');
                        $options = [];

                        foreach (glob($modelPath . '/*.php') as $file) {
                            $modelName = pathinfo($file, PATHINFO_FILENAME);
                            $fullClassName = 'App\\Models\\' . $modelName;

                            if (class_exists($fullClassName) && is_subclass_of($fullClassName, 'Illuminate\Database\Eloquent\Model')) {
                                $modelInstance = new $fullClassName();  // Create an instance of the model
                                $tableName = $modelInstance->getTable();  // Get the table name

                                // Format the table name to capitalized words with spaces
                                $formattedName = ucfirst(str_replace('_', ' ', $tableName));

                                $options[$tableName] = $formattedName;  // Display formatted name but keep original value
                            }
                        }

                        return $options;
                    })
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('related_table')
                    ->label('Related Table')
                    ->searchable(),
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
            'index' => Pages\ListApiMetas::route('/'),
            'create' => Pages\CreateApiMeta::route('/create'),
            'edit' => Pages\EditApiMeta::route('/{record}/edit'),
        ];
    }
}

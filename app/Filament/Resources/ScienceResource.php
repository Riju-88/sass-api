<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScienceResource\Pages;
use App\Filament\Resources\ScienceResource\RelationManagers;
use App\Models\Science;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScienceResource extends Resource
{
    protected static ?string $model = Science::class;

    protected static ?string $navigationGroup = 'APIs';

    protected static ?string $pluralModelLabel = 'Science';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->maxLength(300),
                Forms\Components\TextInput::make('score')
                    ->numeric(),
                Forms\Components\TextInput::make('upvote_ratio')
                    ->numeric(),
                Forms\Components\TextInput::make('num_comments')
                    ->numeric(),
                Forms\Components\TextInput::make('created_utc')
                    ->maxLength(19),
                Forms\Components\TextInput::make('subreddit')
                    ->maxLength(7),
                Forms\Components\TextInput::make('subscribers')
                    ->numeric(),
                Forms\Components\TextInput::make('permalink')
                    ->maxLength(100),
                Forms\Components\TextInput::make('url')
                    ->maxLength(524),
                Forms\Components\TextInput::make('domain')
                    ->maxLength(36),
                Forms\Components\TextInput::make('num_awards')
                    ->numeric(),
                Forms\Components\TextInput::make('num_crossposts')
                    ->numeric(),
                Forms\Components\TextInput::make('crosspost_subreddits')
                    ->maxLength(100),
                Forms\Components\TextInput::make('post_type')
                    ->maxLength(20),
                Forms\Components\TextInput::make('is_nsfw')
                    ->maxLength(5),
                Forms\Components\TextInput::make('is_bot')
                    ->maxLength(5),
                Forms\Components\TextInput::make('is_megathread')
                    ->maxLength(5),
                Forms\Components\Textarea::make('body')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('score')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('upvote_ratio')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('num_comments')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_utc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subreddit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subscribers')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('permalink')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('domain')
                    ->searchable(),
                Tables\Columns\TextColumn::make('num_awards')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('num_crossposts')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('crosspost_subreddits')
                    ->searchable(),
                Tables\Columns\TextColumn::make('post_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_nsfw')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_bot')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_megathread')
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
            'index' => Pages\ListSciences::route('/'),
            'create' => Pages\CreateScience::route('/create'),
            'edit' => Pages\EditScience::route('/{record}/edit'),
        ];
    }
}

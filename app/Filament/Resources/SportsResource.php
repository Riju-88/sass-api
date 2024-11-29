<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SportsResource\Pages;
use App\Filament\Resources\SportsResource\RelationManagers;
use App\Models\Sports;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SportsResource extends Resource
{
    protected static ?string $model = Sports::class;

    protected static ?string $navigationGroup = 'APIs';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->maxLength(289),
                Forms\Components\TextInput::make('score')
                    ->numeric(),
                Forms\Components\TextInput::make('upvote_ratio')
                    ->numeric(),
                Forms\Components\TextInput::make('num_comments')
                    ->numeric(),
                Forms\Components\TextInput::make('created_utc')
                    ->maxLength(19),
                Forms\Components\TextInput::make('subreddit')
                    ->maxLength(6),
                Forms\Components\TextInput::make('subscribers')
                    ->numeric(),
                Forms\Components\TextInput::make('permalink')
                    ->maxLength(99),
                Forms\Components\TextInput::make('url')
                    ->maxLength(176),
                Forms\Components\TextInput::make('domain')
                    ->maxLength(29),
                Forms\Components\TextInput::make('num_awards')
                    ->numeric(),
                Forms\Components\TextInput::make('num_crossposts')
                    ->numeric(),
                Forms\Components\TextInput::make('crosspost_subreddits')
                    ->maxLength(20),
                Forms\Components\TextInput::make('post_type')
                    ->maxLength(5),
                Forms\Components\TextInput::make('is_nsfw')
                    ->maxLength(5),
                Forms\Components\TextInput::make('is_bot')
                    ->maxLength(5),
                Forms\Components\TextInput::make('is_megathread')
                    ->maxLength(5),
                Forms\Components\Textarea::make('body')
                    ->columnSpanFull(),
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
            'index' => Pages\ListSports::route('/'),
            'create' => Pages\CreateSports::route('/create'),
            'edit' => Pages\EditSports::route('/{record}/edit'),
        ];
    }
}

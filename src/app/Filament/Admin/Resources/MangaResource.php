<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MangaResource\Pages;
use App\Filament\Admin\Resources\MangaResource\RelationManagers;
use App\Models\Manga;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use App\Models\Author;
use App\Models\Genre;

class MangaResource extends Resource
{
    protected static ?string $model = Manga::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

public static function form(Form $form): Form
{
    return $form->schema([
        TextInput::make('title')->required()->maxLength(255),
        Textarea::make('synopsis'),
        TextInput::make('cover_image')->label('Cover Image URL'),
        Select::make('status')
            ->options([
                'ongoing' => 'Ongoing',
                'completed' => 'Completed',
            ])
            ->required(),
        DatePicker::make('published_at'),

        Select::make('authors')
            ->multiple()
            ->relationship('authors', 'name')
            ->preload(),

        Select::make('genres')
            ->multiple()
            ->relationship('genres', 'name')
            ->preload(),
    ]);
}

  public static function table(Table $table): Table
{
    return $table->columns([
        TextColumn::make('title')->searchable(),
        TextColumn::make('status'),
        TextColumn::make('published_at')->date(),
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
            'index' => Pages\ListMangas::route('/'),
            'create' => Pages\CreateManga::route('/create'),
            'edit' => Pages\EditManga::route('/{record}/edit'),
        ];
    }
}

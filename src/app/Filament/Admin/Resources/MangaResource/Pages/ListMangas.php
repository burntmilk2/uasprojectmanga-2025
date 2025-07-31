<?php

namespace App\Filament\Admin\Resources\MangaResource\Pages;

use App\Filament\Admin\Resources\MangaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMangas extends ListRecords
{
    protected static string $resource = MangaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

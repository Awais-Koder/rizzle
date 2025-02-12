<?php

namespace App\Filament\Resources\GifResource\Pages;

use App\Filament\Resources\GifResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGifs extends ListRecords
{
    protected static string $resource = GifResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

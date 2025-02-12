<?php

namespace App\Filament\Resources\GifResource\Pages;

use App\Filament\Resources\GifResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGif extends EditRecord
{
    protected static string $resource = GifResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\TravelResource\Pages;

use App\Filament\Resources\TravelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTravel extends EditRecord
{
    protected static string $resource = TravelResource::class;
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['images'] = json_encode($data['images']);
        // dd($data);
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\TravelBranchResource\Pages;

use App\Filament\Resources\TravelBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTravelBranch extends EditRecord
{
    protected static string $resource = TravelBranchResource::class;
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

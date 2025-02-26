<?php

namespace App\Filament\Resources\FoodBranchResource\Pages;

use App\Filament\Resources\FoodBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFoodBranch extends EditRecord
{
    protected static string $resource = FoodBranchResource::class;
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if(!empty($data['images'])){
            $data['images'] = json_encode($data['images']);
        }
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

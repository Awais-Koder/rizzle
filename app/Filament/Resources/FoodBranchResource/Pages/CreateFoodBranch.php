<?php

namespace App\Filament\Resources\FoodBranchResource\Pages;

use App\Filament\Resources\FoodBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFoodBranch extends CreateRecord
{
    protected static string $resource = FoodBranchResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if(!empty($data['images'])){
            $data['images'] = json_encode($data['images']);
        }
        // dd($data);
        return $data;
    }
}

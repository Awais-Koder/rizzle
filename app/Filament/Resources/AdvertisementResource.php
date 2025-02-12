<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdvertisementResource\Pages;
use App\Filament\Resources\AdvertisementResource\RelationManagers;
use App\Models\Advertisement;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdvertisementResource extends Resource
{
    protected static ?string $model = Advertisement::class;
    protected static ?string $navigationGroup = 'Ads';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('home_banner')
                ->multiple()
                ->uploadingMessage('Uploading attachment...')
                ->imageEditor()
                ->reorderable()
                ->openable()
                ->loadingIndicatorPosition('left')
                ->panelLayout('integrated')
                ->removeUploadedFileButtonPosition('right')
                ->uploadButtonPosition('left')
                ->uploadProgressIndicatorPosition('left')
                ->downloadable()
                ->panelLayout('grid')
                ->formatStateUsing(function ($record) {
                    if (!empty($record->home_banner))
                        return json_decode($record->home_banner, true); // Decode and show the images
                }),
                Forms\Components\FileUpload::make('sponsor_video')
                ->multiple()
                ->uploadingMessage('Uploading attachment...')
                ->imageEditor()
                ->reorderable()
                ->openable()
                ->loadingIndicatorPosition('left')
                ->panelLayout('integrated')
                ->removeUploadedFileButtonPosition('right')
                ->uploadButtonPosition('left')
                ->uploadProgressIndicatorPosition('left')
                ->downloadable()
                ->panelLayout('grid')
                ->formatStateUsing(function ($record) {
                    if (!empty($record->sponsor_video))
                        return json_decode($record->sponsor_video, true); // Decode and show the images
                }),
                Forms\Components\FileUpload::make('education_ad')
                    ->multiple()
                ->uploadingMessage('Uploading attachment...')
                ->imageEditor()
                ->reorderable()
                ->openable()
                ->loadingIndicatorPosition('left')
                ->panelLayout('integrated')
                ->removeUploadedFileButtonPosition('right')
                ->uploadButtonPosition('left')
                ->uploadProgressIndicatorPosition('left')
                ->downloadable()
                ->panelLayout('grid')
                ->formatStateUsing(function ($record) {
                    if (!empty($record->education_ad))
                        return json_decode($record->education_ad, true); // Decode and show the images
                }),
                Forms\Components\FileUpload::make('travel_ad')
                    ->multiple()
                ->uploadingMessage('Uploading attachment...')
                ->imageEditor()
                ->reorderable()
                ->openable()
                ->loadingIndicatorPosition('left')
                ->panelLayout('integrated')
                ->removeUploadedFileButtonPosition('right')
                ->uploadButtonPosition('left')
                ->uploadProgressIndicatorPosition('left')
                ->downloadable()
                ->panelLayout('grid')
                ->formatStateUsing(function ($record) {
                    if (!empty($record->travel_ad))
                        return json_decode($record->travel_ad, true); // Decode and show the images
                }),
                Forms\Components\FileUpload::make('food_ad')
                    ->multiple()
                ->uploadingMessage('Uploading attachment...')
                ->imageEditor()
                ->reorderable()
                ->openable()
                ->loadingIndicatorPosition('left')
                ->panelLayout('integrated')
                ->removeUploadedFileButtonPosition('right')
                ->uploadButtonPosition('left')
                ->uploadProgressIndicatorPosition('left')
                ->downloadable()
                ->panelLayout('grid')
                ->formatStateUsing(function ($record) {
                    if (!empty($record->food_ad))
                        return json_decode($record->food_ad, true); // Decode and show the images
                }),
                Forms\Components\FileUpload::make('shop_ad')
                    ->multiple()
                ->uploadingMessage('Uploading attachment...')
                ->imageEditor()
                ->reorderable()
                ->openable()
                ->loadingIndicatorPosition('left')
                ->panelLayout('integrated')
                ->removeUploadedFileButtonPosition('right')
                ->uploadButtonPosition('left')
                ->uploadProgressIndicatorPosition('left')
                ->downloadable()
                ->panelLayout('grid')
                ->formatStateUsing(function ($record) {
                    if (!empty($record->shop_ad))
                        return json_decode($record->shop_ad, true); // Decode and show the images
                }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
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
            'index' => Pages\ListAdvertisements::route('/'),
            'create' => Pages\CreateAdvertisement::route('/create'),
            'edit' => Pages\EditAdvertisement::route('/{record}/edit'),
        ];
    }
}

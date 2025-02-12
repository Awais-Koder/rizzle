<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShopBranchResource\Pages;
use App\Filament\Resources\ShopBranchResource\RelationManagers;
use App\Models\ShopBranch;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShopBranchResource extends Resource
{
    protected static ?string $model = ShopBranch::class;
    protected static ?string $navigationGroup = 'Shop Management';
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('city_id')
                    ->preload()
                    ->optionsLimit(5)
                    ->searchable()
                    ->native(true)
                    ->relationship('city', 'name')
                    ->required(),
                Forms\Components\Select::make('shop_id')
                    ->preload()
                    ->optionsLimit(5)
                    ->searchable()
                    ->native(true)
                    ->relationship('shop', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),
                Forms\Components\FileUpload::make('images')
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
                    ->image()
                    ->formatStateUsing(function ($record) {
                        if (!empty($record->images))
                            return json_decode($record->images, true); // Decode and show the images
                    }),
                Forms\Components\Toggle::make('ad_tag'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('city.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shop.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\IconColumn::make('ad_tag')
                    ->boolean(),
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
            'index' => Pages\ListShopBranches::route('/'),
            'create' => Pages\CreateShopBranch::route('/create'),
            'edit' => Pages\EditShopBranch::route('/{record}/edit'),
        ];
    }
}

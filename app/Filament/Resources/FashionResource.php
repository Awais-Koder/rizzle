<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FashionResource\Pages;
use App\Filament\Resources\FashionResource\RelationManagers;
use App\Models\Fashion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FashionResource extends Resource
{
    protected static ?string $model = Fashion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('city_id')
                    ->preload()
                    ->optionsLimit(5)
                    ->searchable()
                    ->relationship('city', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->options([
                        'Regular' => 'Regular',
                        'Deal' => 'Deal',
                    ])
                    ->reactive()
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('phone_number')
                    ->required()
                    ->hidden(fn($get) => $get('type') == 'Deal')
                    ->maxLength(255),
                time_field(),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->hidden(fn($get) => $get('type') == 'Deal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('whatsapp_number')
                ->hidden(fn($get) => $get('type') == 'Deal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('discount')
                ->hidden(fn($get) => $get('type') == 'Deal')
                    ->numeric(),
                Forms\Components\Select::make('discount_type')
                ->hidden(fn($get) => $get('type') == 'Deal')
                    ->options([
                        'flat' => "Flat",
                        'upto' => "Upto",
                    ]),
                Forms\Components\TextInput::make('latitude')
                ->hidden(fn($get) => $get('type') == 'Deal')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('longitude')
                ->hidden(fn($get) => $get('type') == 'Deal')
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('image')
                    ->label('Icon')
                    ->image()
                    ->required(),
                Forms\Components\FileUpload::make('images')
                ->hidden(fn($get) => $get('type') == 'Deal')
                    ->label('Menu Images')
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
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('time')
                    ->formatStateUsing(function ($record) {
                        if (!empty($record->time)) {
                            return implode(', ', json_decode($record->time, true)); // Convert array to comma-separated string
                        }
                        return '-'; // Default placeholder if no data
                    }),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListFashions::route('/'),
            'create' => Pages\CreateFashion::route('/create'),
            'edit' => Pages\EditFashion::route('/{record}/edit'),
        ];
    }
}

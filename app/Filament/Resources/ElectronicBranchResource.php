<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ElectronicBranchResource\Pages;
use App\Filament\Resources\ElectronicBranchResource\RelationManagers;
use App\Models\ElectronicBranch;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ElectronicBranchResource extends Resource
{
    protected static ?string $model = ElectronicBranch::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('city_id')
                    ->relationship('city', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('electronic_id')
                    ->relationship('electronic', 'name')
                    ->searchable()
                    ->preload()
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
                    Forms\Components\FileUpload::make('deal_image')
                    ->label('Deal Image')
                    ->image()
                    ->imageEditor()
                    ->required(fn($get) => $get('type') == "Deal")
                    ->hidden(fn($get) => $get('type') == 'Regular'),
                Forms\Components\TextInput::make('phone_number')
                ->hidden(fn($get) => $get('type') == 'Deal')
                    ->required()
                    ->maxLength(255),
                time_field(),
                Forms\Components\TextInput::make('address')
                ->hidden(fn($get) => $get('type') == 'Deal')
                    ->required()
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
                ->hidden(fn($get) => $get('type') == 'Deal')
                    ->label('Icon')
                    ->image()
                    ->required(),
                Forms\Components\FileUpload::make('images')
                ->hidden(fn($get) => $get('type') == 'Deal')
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
                Tables\Columns\TextColumn::make('electronic.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
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
            'index' => Pages\ListElectronicBranches::route('/'),
            'create' => Pages\CreateElectronicBranch::route('/create'),
            'edit' => Pages\EditElectronicBranch::route('/{record}/edit'),
        ];
    }
}

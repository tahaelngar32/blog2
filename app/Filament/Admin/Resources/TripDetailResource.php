<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TripDetailResource\Pages;
use App\Filament\Admin\Resources\TripDetailResource\RelationManagers;
use App\Models\TripDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TripDetailResource extends Resource
{
    protected static ?string $model = TripDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Management System Trip';

    protected static ?int $navigationSort = 1;



    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                Forms\Components\Section::make('Trip')->schema([
                    Forms\Components\Select::make('trip_id')
                        ->relationship('trip','name')

                ]),
                Forms\Components\Section::make('Date')->schema([
                    Forms\Components\DatePicker::make('date_from')
                        ->required()
                        ->native(false),
                    Forms\Components\DatePicker::make('date_to')
                        ->required()
                        ->native(false),
                ])->columns(2),

                Forms\Components\Section::make('Price')->schema([
                    Forms\Components\TextInput::make('price_singel')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('price_group')
                        ->required()
                        ->numeric(),
                ])->columns(2),

                Forms\Components\Textarea::make('details')
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('trip.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_from')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_to')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_singel')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_group')
                    ->searchable(),
                Tables\Columns\TextColumn::make('details')
                    ->searchable(),
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListTripDetails::route('/'),
            'create' => Pages\CreateTripDetail::route('/create'),
            'view' => Pages\ViewTripDetail::route('/{record}'),
            'edit' => Pages\EditTripDetail::route('/{record}/edit'),
        ];
    }
}

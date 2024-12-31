<?php

namespace App\Filament\Admin\Resources\TripDetailResource\Pages;

use App\Filament\Admin\Resources\TripDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTripDetail extends EditRecord
{
    protected static string $resource = TripDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

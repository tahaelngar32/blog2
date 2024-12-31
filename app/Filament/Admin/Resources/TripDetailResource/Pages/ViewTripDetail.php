<?php

namespace App\Filament\Admin\Resources\TripDetailResource\Pages;

use App\Filament\Admin\Resources\TripDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTripDetail extends ViewRecord
{
    protected static string $resource = TripDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Admin\Resources\TripDetailResource\Pages;

use App\Filament\Admin\Resources\TripDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTripDetails extends ListRecords
{
    protected static string $resource = TripDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\MetingEventResource\Pages;

use App\Filament\Resources\MetingEventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMetingEvents extends ListRecords
{
    protected static string $resource = MetingEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

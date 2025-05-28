<?php

namespace App\Filament\Resources\WarisataResource\Pages;

use App\Filament\Resources\WarisataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWarisatas extends ListRecords
{
    protected static string $resource = WarisataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

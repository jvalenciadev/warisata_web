<?php

namespace App\Filament\Resources\WarisataResource\Pages;

use App\Filament\Resources\WarisataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWarisata extends EditRecord
{
    protected static string $resource = WarisataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

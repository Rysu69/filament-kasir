<?php

namespace App\Filament\Petugas\Resources\DetailpenjualansResource\Pages;

use App\Filament\Petugas\Resources\DetailpenjualansResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDetailpenjualans extends ListRecords
{
    protected static string $resource = DetailpenjualansResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

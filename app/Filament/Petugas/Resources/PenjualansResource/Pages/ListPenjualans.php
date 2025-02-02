<?php

namespace App\Filament\Petugas\Resources\PenjualansResource\Pages;

use App\Filament\Petugas\Resources\PenjualansResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenjualans extends ListRecords
{
    protected static string $resource = PenjualansResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

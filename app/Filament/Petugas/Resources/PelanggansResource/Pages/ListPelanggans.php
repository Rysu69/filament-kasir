<?php

namespace App\Filament\Petugas\Resources\PelanggansResource\Pages;

use App\Filament\Petugas\Resources\PelanggansResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPelanggans extends ListRecords
{
    protected static string $resource = PelanggansResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

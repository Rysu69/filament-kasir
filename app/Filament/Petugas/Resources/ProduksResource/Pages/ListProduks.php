<?php

namespace App\Filament\Petugas\Resources\ProduksResource\Pages;

use App\Filament\Petugas\Resources\ProduksResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProduks extends ListRecords
{
    protected static string $resource = ProduksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

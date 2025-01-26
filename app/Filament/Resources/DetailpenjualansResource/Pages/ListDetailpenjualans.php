<?php

namespace App\Filament\Resources\DetailpenjualansResource\Pages;

use App\Filament\Resources\DetailpenjualansResource;
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

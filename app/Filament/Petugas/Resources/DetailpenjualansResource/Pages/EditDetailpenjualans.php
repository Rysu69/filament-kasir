<?php

namespace App\Filament\Petugas\Resources\DetailpenjualansResource\Pages;

use App\Filament\Petugas\Resources\DetailpenjualansResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetailpenjualans extends EditRecord
{
    protected static string $resource = DetailpenjualansResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\DetailpenjualansResource\Pages;

use App\Filament\Resources\DetailpenjualansResource;
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

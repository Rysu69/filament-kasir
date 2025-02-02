<?php

namespace App\Filament\Petugas\Resources;

use App\Filament\Petugas\Resources\PelanggansResource\Pages;
use App\Filament\Petugas\Resources\PelanggansResource\RelationManagers;
use App\Models\Pelanggans;
use Filament\Forms;
use Filament\Forms\Components\{TextInput, TextArea};
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PelanggansResource extends Resource
{
    protected static ?string $model = Pelanggans::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('NamaPelanggan')
                    ->label('Nama Pelanggan')
                    ->required(),
                TextArea::make('Alamat')
                    ->label('Alamat')
                    ->required(),
                TextInput::make('NomorTelepon')
                    ->label('Telepon')
                    ->tel()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('PelangganID')
                    ->label('ID Pelanggan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('NamaPelanggan')
                    ->Label('Nama Pelangan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Alamat')
                    ->Label('Alamat')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::Make('NomorTelepon')
                    ->Label('Telepon')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPelanggans::route('/'),
            'create' => Pages\CreatePelanggans::route('/create'),
            'edit' => Pages\EditPelanggans::route('/{record}/edit'),
        ];
    }
}

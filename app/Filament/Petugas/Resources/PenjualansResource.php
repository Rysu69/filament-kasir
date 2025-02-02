<?php

namespace App\Filament\Petugas\Resources;

use App\Filament\Petugas\Resources\PenjualansResource\Pages;
use App\Filament\Petugas\Resources\PenjualansResource\RelationManagers;
use App\Models\Penjualans;
use Filament\Forms;
use Filament\Forms\Components\{Datepicker, Select, TextInput};
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenjualansResource extends Resource
{
    protected static ?string $model = Penjualans::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('PelangganID')
                    ->label('ID Pelanggan')
                    ->options(
                        \App\Models\Pelanggans::all()->pluck('NamaPelanggan', 'PelangganID')
                    )
                    ->required(),
                Datepicker::make('TanggalPenjualan')
                    ->label('Tanggal')
                    ->required(),
                TextInput::make('TotalHarga')
                    ->label('Total Harga')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(1000000)
                    ->step(0.01)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('PenjualanID')
                    ->label('ID Penjualan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('PelangganID')
                    ->label('ID Pelanggan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Pelanggans.NamaPelanggan')
                    ->label('Nama Pelanggan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('TanggalPenjualan')
                    ->label('Tanggal')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('TotalHarga')
                    ->label('Total Harga')
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
            'index' => Pages\ListPenjualans::route('/'),
            'create' => Pages\CreatePenjualans::route('/create'),
            'edit' => Pages\EditPenjualans::route('/{record}/edit'),
        ];
    }
}

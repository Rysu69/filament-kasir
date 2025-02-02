<?php

namespace App\Filament\Petugas\Resources;

use App\Filament\Petugas\Resources\DetailpenjualansResource\Pages;
use App\Filament\Petugas\Resources\DetailpenjualansResource\RelationManagers;
use App\Models\Detailpenjualans;
use Filament\Forms\Components\{Select, TextInput};
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailpenjualansResource extends Resource
{
    protected static ?string $model = Detailpenjualans::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('PenjualanID')
                    ->label('ID Penjualan')
                    ->options(
                        \App\Models\Penjualans::all()->pluck('PenjualanID', 'PenjualanID')
                    )
                    ->required(),
                Select::make('ProdukID')
                    ->label('Nama Produk')
                    ->options(
                        \App\Models\Produks::all()->pluck('NamaProduk', 'ProdukID')
                    )
                    ->required(),
                TextInput::make('Jumlah')
                    ->label('Jumlah')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(1000)
                    ->step(1)
                    ->required(),
                TextInput::make('Subtotal')
                    ->label('Subtotal')
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
                Tables\Columns\TextColumn::make('DetailID')
                    ->label('ID Detail')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('PenjualanID')
                    ->label('ID Penjualan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Produks.NamaProduk')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Jumlah')
                    ->label('Jumlah')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Subtotal')
                    ->label('Subtotal')
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
            'index' => Pages\ListDetailpenjualans::route('/'),
            'create' => Pages\CreateDetailpenjualans::route('/create'),
            'edit' => Pages\EditDetailpenjualans::route('/{record}/edit'),
        ];
    }
}

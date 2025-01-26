<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailpenjualansResource\Pages;
use App\Filament\Resources\DetailpenjualansResource\RelationManagers;
use App\Models\Detailpenjualans;
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
                Forms\Components\Select::make('PenjualanID')
                    ->label('ID Penjualan')
                    ->options(
                        \App\Models\Penjualans::all()->pluck('PenjualanID', 'PenjualanID')
                    )
                    ->required(),
                Forms\Components\Select::make('ProdukID')
                    ->label('ID Produk')
                    ->options(
                        \App\Models\Produks::all()->pluck('NamaProduk', 'ProdukID')
                    )
                    ->required(),
                Forms\Components\TextInput::make('Jumlah')
                    ->label('Jumlah')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(1000)
                    ->step(1)
                    ->required(),
                Forms\Components\TextInput::make('Subtotal')
                    ->label('Harga')
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
                Tables\Columns\TextColumn::make('ProdukID')
                    ->label('ID Produk')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Jumlah')
                    ->label('Jumlah')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Subtotal')
                    ->label('Harga')
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

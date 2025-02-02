<?php

namespace App\Filament\Petugas\Resources;

use App\Filament\Petugas\Resources\ProduksResource\Pages;
use App\Filament\Petugas\Resources\ProduksResource\RelationManagers;
use App\Models\Produks;
use Filament\Forms\Components\{TextInput, TextArea};
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProduksResource extends Resource
{
    protected static ?string $model = Produks::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('NamaProduk')
                    ->label('Nama Produk')
                    ->required(),
                TextInput::make('Harga')
                    ->label('Harga Produk')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(1000000)
                    ->step(0.01)
                    ->required(),
                TextInput::make('Stok')
                    ->label('Stok Produk')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(10000)
                    ->step(0.01)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ProdukID')
                ->label('Product ID')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('NamaProduk')
                ->label('Product Name')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('Harga')
                ->label('Harga')
                ->searchable()
                ->sortable()
                ->numeric(),
                Tables\Columns\TextColumn::make('Stok')
                ->label('Stok')
                ->searchable()
                ->sortable()
                ->numeric(),
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduks::route('/create'),
            'edit' => Pages\EditProduks::route('/{record}/edit'),
        ];
    }
}

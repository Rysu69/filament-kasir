<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produks extends Model
{
    protected $table = 'Produks';
    protected $primaryKey = 'ProdukID';

    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualans::class, 'ProdukID');
    }
}

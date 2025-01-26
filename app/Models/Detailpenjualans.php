<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detailpenjualans extends Model
{
    protected $table = 'Detailpenjualans';
    protected $primaryKey = 'DetailID';

    public function Penjualans()
    {
        return $this->belongsTo(Penjualans::class, 'PenjualanID');
    }

    public function Produks()
    {
        return $this->belongsTo(Produks::class, 'ProdukID');
    }
}

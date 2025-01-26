<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualans extends Model
{
    protected $table = 'Penjualans';
    protected $primaryKey = 'PenjualanID';

    public function Pelanggans()
    {
        return $this->belongsTo(Pelanggans::class, 'PelangganID');
    }

    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualans::class, 'PenjualanID');
    }
}

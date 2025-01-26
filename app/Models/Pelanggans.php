<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggans extends Model
{
    protected $table = 'Pelanggans';
    protected $primaryKey = 'PelangganID';

    public function penjualans()
    {
        return $this->hasMany(Penjualans::class, 'PelangganID');
    }
}

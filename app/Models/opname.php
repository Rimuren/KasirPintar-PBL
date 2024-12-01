<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opname extends Model
{
    use HasFactory;

    protected $table = 'opname';

    protected $fillable = [
        'idbarang', 'idstaff', 'tglOpname', 'stokFisik', 'stokSistem', 'selisih'
    ];

    public function barang()
    {
        return $this->belongsTo(barang::class, 'idbarang');
    }

    public function staff()
    {
        return $this->belongsTo(staff::class, 'idstaff');
    }
}

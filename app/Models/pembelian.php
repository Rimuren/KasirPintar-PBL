<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $fillable = [
        'idtransaksi', 'idbarang', 'idsupplier', 'quantity', 'tglPembelian'
    ];

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class, 'idtransaksi');
    }

    public function barang()
    {
        return $this->belongsTo(barang::class, 'idbarang');
    }

    public function supplier()
    {
        return $this->belongsTo(supplier::class, 'idsupplier');
    }
}

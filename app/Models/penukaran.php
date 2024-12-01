<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penukaran extends Model
{
    use HasFactory;

    protected $table = 'penukaran';

    protected $fillable = [
        'idtransaksi', 'idpelanggan', 'idshop', 'pointUsed', 'tglRedeem'
    ];

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class, 'idtransaksi');
    }

    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class, 'idpelanggan');
    }

    public function shop()
    {
        return $this->belongsTo(shop::class, 'idshop');
    }
}

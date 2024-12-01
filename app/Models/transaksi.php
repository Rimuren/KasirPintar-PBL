<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'idPelanggan', 'idStaff', 'namaTransaksi', 'tglTransaksi', 'totalTransaksi', 'tipeTransaksi'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class, 'idPelanggan');
    }

    public function staff()
    {
        return $this->belongsTo(staff::class, 'idStaff');
    }

    public function pembelian()
    {
        return $this->hasMany(pembelian::class);
    }

    public function penukaran()
    {
        return $this->hasMany(penukaran::class);
    }

    public function penjualan()
    {
        return $this->hasMany(penjualan::class);
    }
}

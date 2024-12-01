<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'idmerk', 'idkategori', 'namaBarang', 'stok', 'hargaBeli', 'hargaJual'
    ];

    public function merk()
    {
        return $this->belongsTo(merk::class, 'idmerk');
    }

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'idkategori');
    }

    public function pembelian()
    {
        return $this->hasMany(pembelian::class);
    }

    public function penjualan()
    {
        return $this->hasMany(penjualan::class);
    }

    public function opname()
    {
        return $this->hasMany(opname::class);
    }
}

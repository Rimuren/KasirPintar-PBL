<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $fillable = [
        'namaPelanggan', 'noTlp', 'email', 'jumlahPoin'
    ];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }

    public function penukaran()
    {
        return $this->hasMany(penukaran::class);
    }
}

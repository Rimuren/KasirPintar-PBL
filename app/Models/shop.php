<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    use HasFactory;

    protected $table = 'shop';

    protected $fillable = [
        'idbarang', 'poinRequired'
    ];

    public function barang()
    {
        return $this->belongsTo(barang::class, 'idbarang');
    }

    public function penukaran()
    {
        return $this->hasMany(penukaran::class);
    }
}

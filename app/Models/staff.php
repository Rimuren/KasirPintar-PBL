<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $fillable = [
        'namaStaff', 'posisi', 'email', 'noTlp'
    ];

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }

    public function shift()
    {
        return $this->hasMany(shift::class);
    }

    public function cashDrawer()
    {
        return $this->hasMany(cashdrawer::class);
    }

    public function opname()
    {
        return $this->hasMany(opname::class);
    }
}

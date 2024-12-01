<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cashdrawer extends Model
{
    use HasFactory;

    protected $table = 'cash_drawer';

    protected $fillable = [
        'idstaff', 'tglBuka', 'tglTutup', 'saldoAwal', 'saldoAkhir'
    ];

    public function staff()
    {
        return $this->belongsTo(staff::class, 'idstaff');
    }
}

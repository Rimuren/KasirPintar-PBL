<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poin extends Model
{
    use HasFactory;

    protected $table = 'poin';

    protected $fillable = [
        'min_range', 'max_range', 'poin'
    ];
}

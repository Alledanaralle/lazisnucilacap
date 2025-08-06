<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pilihan_qurban extends Model
{
   use HasFactory;

    protected $table = 'pilihan_qurban';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'harga',
    ];
}


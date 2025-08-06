<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = 'like';
    protected $primaryKey = 'id_like';
    protected $fillable = [
        'id_user',
        'id_doa',
        'ip_address',

    ];
}

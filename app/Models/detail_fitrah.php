<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_fitrah extends Model
{
    use HasFactory;
    protected $table = 'detail_fitrah';
    protected $primaryKey = 'id_fitrah';
    protected $fillable = [
        'nama_muzakki',
        'id_ziwaf',
    ];
}

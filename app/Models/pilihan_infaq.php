<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pilihan_infaq extends Model
{
    use HasFactory;

    protected $table = 'pilihan_infaq';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pil_infaq',
    ];
}

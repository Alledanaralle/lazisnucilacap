<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pilihan_wakaf extends Model
{
    use HasFactory;

    protected $table = 'pilihan_wakaf';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pil_wakaf',
    ];
}

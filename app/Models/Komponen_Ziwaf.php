<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komponen_Ziwaf extends Model
{
    use HasFactory;
    protected $table = 'komponen_ziwaf';
    protected $primaryKey = 'id';

    protected $fillable = [
        'harga_emas',
        'nisab',
        'nisab_kg',
        'fidyah',
        'nominal_fitrah',
    ];
}

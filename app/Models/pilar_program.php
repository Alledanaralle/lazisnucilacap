<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pilar_program extends Model
{
    use HasFactory;

    protected $table = 'pilar_program';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'slug',
        'img',
        'deskripsi',
        'id_kategori',
        'sdgs',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
}

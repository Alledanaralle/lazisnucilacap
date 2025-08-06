<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Kategori;

class Berita extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = [
        'title_berita',
        'description',
        'tanggal',
        'id_kategori',
        'picture',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
}

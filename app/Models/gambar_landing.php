<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class gambar_landing extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'gambar_landing';
    protected $primaryKey = 'id_gambar';
    protected $fillable = [
        'position',
        'gambar',
        'link'
    ];

    public static function reorder()
    {
        $gambarList = self::orderBy('position', 'asc')->get();
        $newPosition = 1;
        foreach ($gambarList as $a) {
            $a->position = $newPosition;
            $a->save();
            $newPosition++;
        }
    }
}

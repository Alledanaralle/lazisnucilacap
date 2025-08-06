<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class misi extends Model
{
    use HasFactory;

    protected $table = 'misi';
    protected $primaryKey = 'id_misi';
    protected $fillable = [
        'misi',
        'order',
    ];
    public static function reorder()
    {
        $misiList = self::orderBy('order', 'asc')->get();
        $newOrder = 1;
        foreach ($misiList as $misi) {
            $misi->order = $newOrder;
            $misi->save();
            $newOrder++;
        }
    }
}

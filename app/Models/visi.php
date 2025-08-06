<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visi extends Model
{
    use HasFactory;

    protected $table = 'visi';
    protected $primaryKey = 'id_visi';
    protected $fillable = [
        'visi',
        'order',
    ];
    public static function reorder()
    {
        $visiList = self::orderBy('order', 'asc')->get();
        $newOrder = 1;
        foreach ($visiList as $visi) {
            $visi->order = $newOrder;
            $visi->save();
            $newOrder++;
        }
    }
}

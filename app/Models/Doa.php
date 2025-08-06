<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doa extends Model
{
    use HasFactory;
    protected $table = 'doa';
    protected $primaryKey = 'id_doa';
    protected $fillable = [
        'username',
        'id_user',
        'doa',
        'jumlah_likes',
        'id_campaign',
        'id_transaction',


    ];
    public static function updateLike()
    {
        $doas = self::all(); // Fetch all campaigns

        foreach ($doas as $doa) {
            $jumlah_like = Like::where('id_doa', $doa->id_doa)
                ->count();

            $doa->jumlah_likes = $jumlah_like;
            $doa->save();
        }
    }

    public function transaction()
{
    return $this->belongsTo(Transaction::class, 'id_transaction');
}

}

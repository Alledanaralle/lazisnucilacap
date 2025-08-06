<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;


    protected $table = 'donasi';
    protected $primaryKey = 'id_donasi';
    protected $fillable = [
        'id_user',
        'username',
        'no_telp',
        'email',
        'jumlah_donasi',
        'id_campaign',
        'id_transaction',
        'hide_name',

    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id_transaction');
    }
}

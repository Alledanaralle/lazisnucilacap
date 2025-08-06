<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    protected $primaryKey = 'id_transaction';
    protected $fillable = [
        'nominal',
        'snap_token',
        'payment_type',
        'status',
        'order_id',
        'user_id',
        'username',
        'no_telp',
        'email',
        'bank_or_store',
        'va_number',
        'settlement_time',
        'alamat',
    ];
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class kebijakan extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'kebijakan';
    protected $primaryKey = 'id_kebijakan';
    protected $fillable = [
        'kebijakan'
    ];
}

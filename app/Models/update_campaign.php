<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class update_campaign extends Model
{
    use HasFactory;
    protected $table = 'update_campaign';
     protected $primaryKey = 'id_update_campaign';
    protected $fillable = [
        'description',
        'picture',
        'id_campaign',
    ];
}

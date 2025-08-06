<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanGocap extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_gocap';
    protected $primaryKey = 'id_pengajuan_gocap';
   protected $fillable = [
       'username',
       'id_user',
       'no_telp',
       'jabatan',
       'kendala',
       'image',
   ];
}

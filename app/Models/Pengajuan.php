<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;


    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';
   protected $fillable = [
       'username',
       'id_user',
       'no_telp',
       'jenis_pemohon',
       'keterangan',
       'nominal',
       'jumlah_penerima',
   ];
}

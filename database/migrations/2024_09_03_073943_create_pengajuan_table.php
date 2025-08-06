<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->integer('id_pengajuan')->autoIncrement()->primary();
            $table->integer('id_user')->nullable();
            $table->string('username');
            $table->string('no_telp');
            $table->string('jenis_pemohon');
            $table->text('keterangan');
            $table->integer('nominal');
            $table->integer('jumlah_penerima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};

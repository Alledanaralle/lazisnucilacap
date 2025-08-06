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
        Schema::create('ziwaf', function (Blueprint $table) {
            $table->integer('id_ziwaf')->autoIncrement()->primary();
            $table->integer('id_transaction');
            $table->string('atas_nama');
            $table->string('username');
            $table->string('no_telp');
            $table->string('email')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('nominal');
            $table->string('jenis_ziwaf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ziwaf');
    }
};

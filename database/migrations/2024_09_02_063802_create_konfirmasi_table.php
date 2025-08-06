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
        Schema::create('konfirmasi', function (Blueprint $table) {
            $table->integer('id_konfirmasi')->autoIncrement()->primary();
            $table->integer('id_user')->nullable();
            $table->string('nama');
            $table->string('no_telp');
            $table->string('email')->nullable();
            $table->integer('id_campaign');
            $table->string('bukti');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konfirmasi');
    }
};

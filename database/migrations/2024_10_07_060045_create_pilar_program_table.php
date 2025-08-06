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
        Schema::create('pilar_program', function (Blueprint $table) {
            $table->id();
            $table->string('id_kategori');
            $table->string('nama');
            $table->string('slug');
            $table->string('img');
            $table->text('deskripsi');
            $table->string('sdgs')->default('00000000000000000');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilar_program');
    }
};

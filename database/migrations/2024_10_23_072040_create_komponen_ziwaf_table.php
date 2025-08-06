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
        Schema::create('komponen_ziwaf', function (Blueprint $table) {
            $table->id();
            $table->integer('harga_emas');
            $table->integer('nisab');
            $table->integer('nisab_kg');
            $table->integer('fidyah');
            $table->integer('nominal_fitrah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komponen_ziwaf');
    }
};

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
        Schema::create('donasi', function (Blueprint $table) {
            $table->integer('id_donasi')->autoIncrement()->primary();
            $table->enum('hide_name', ['yes', 'no'])->default('no');
            $table->integer('id_user')->nullable();
            $table->integer('jumlah_donasi');
            $table->integer('id_campaign');
            $table->string('username');
            $table->string('no_telp');
            $table->string('email')->nullable();
            $table->integer('id_transaction')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasi');
    }
};

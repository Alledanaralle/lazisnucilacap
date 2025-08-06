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
        Schema::create('doa', function (Blueprint $table) {
            $table->integer('id_doa')->autoIncrement()->primary();
            $table->string('username')->nullable();
            $table->integer('id_user')->nullable();
            $table->text('doa');
            $table->integer('jumlah_likes');
            $table->integer('id_campaign');
            $table->integer('id_transaction')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doa');
    }
};

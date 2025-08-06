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
        Schema::create('detail_fitrah', function (Blueprint $table) {
            $table->integer('id_fitrah')->autoIncrement()->primary();
            $table->integer('id_ziwaf'); // Add id_ziwaf column
            $table->string('nama_muzakki');
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('id_ziwaf')
                ->references('id_ziwaf')
                ->on('ziwaf')
                ->onDelete('cascade'); // Optional: define what happens on delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_fitrah', function (Blueprint $table) {
            $table->dropForeign(['id_ziwaf']); // Drop foreign key constraint first
        });
        Schema::dropIfExists('detail_fitrah');
    }
};
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
        Schema::create('update_campaign', function (Blueprint $table) {
            $table->integer('id_update_campaign')->autoIncrement()->primary();
            $table->text('description');
            $table->string('picture');
            $table->integer('id_campaign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_campaign');
    }
};

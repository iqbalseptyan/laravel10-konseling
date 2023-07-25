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
        Schema::create('tbl_konseling_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_konseling');
            $table->foreignId('id_siswa');
            $table->timestamps();

            $table->foreign('id_konseling')->references('id')->on('tbl_konseling')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_siswa')->references('id')->on('tbl_siswa')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_konseling_siswa');
    }
};

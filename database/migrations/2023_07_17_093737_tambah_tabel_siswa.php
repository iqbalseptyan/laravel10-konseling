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
        Schema::create('tbl_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->foreignId('id_kelas');
            $table->string('nisn');
            $table->string('nama');
            $table->string('alamat');
            $table->timestamp('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('tbl_user')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_kelas')->references('id')->on('tbl_kelas')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_siswa');
    }
};

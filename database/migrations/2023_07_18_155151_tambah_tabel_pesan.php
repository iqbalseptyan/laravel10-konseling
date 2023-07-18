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
        Schema::create('tbl_pesan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_asal');
            $table->foreignId('id_tujuan');
            $table->string('subjek');
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('id_asal')->references('id')->on('tbl_user')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_tujuan')->references('id')->on('tbl_user')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pesan');
    }
};

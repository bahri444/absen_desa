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
        Schema::create('absen', function (Blueprint $table) {
            $table->uuid('absen_uuid')->primary();
            $table->foreignUuid('pegawai_uuid');
            $table->date('tgl_absen');
            $table->string('jarak_koordinat');
            $table->time('jam_masuk');
            $table->time('jam_pulang');
            $table->timestamps();
            $table->foreign('pegawai_uuid')->references('pegawai_uuid')->on('pegawai')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('absen');
    }
};

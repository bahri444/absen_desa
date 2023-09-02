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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->uuid('pegawai_uuid')->primary();
            $table->char('nip', 20)->default('none');
            $table->string('nama_lengkap', 30);
            $table->string('alamat', 50);
            $table->string('nomor_telepon', 12);
            $table->enum('jenis_kelamin', ["Laki-Laki", "Perempuan"]);
            $table->string('dusun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('pegawai');
    }
};

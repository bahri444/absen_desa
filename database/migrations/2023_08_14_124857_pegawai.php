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
            $table->foreignUuid('user_uuid')->nullable();
            $table->char('nip', 20)->default('none');
            $table->enum('jenis_kelamin', ["Laki-Laki", "Perempuan"]);
            $table->string('alamat', 50);
            $table->string('dusun', 30);
            $table->enum('jabatan', ['kades', 'sekdes', 'bendahara', 'kaur', 'kasi', 'kadus']);
            $table->string('nomor_telepon', 12);
            $table->timestamps();
            $table->foreign('user_uuid')->references('user_uuid')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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

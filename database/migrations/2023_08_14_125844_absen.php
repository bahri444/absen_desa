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
            $table->foreignUuid('user_uuid');
            $table->date('tgl_absen');
            $table->string('jarak_koordinat');
            $table->time('jam_masuk');
            $table->time('jam_pulang')->nullable();
            $table->timestamps();
            $table->foreign('user_uuid')->references('user_uuid')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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

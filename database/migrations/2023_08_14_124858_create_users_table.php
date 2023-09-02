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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid("user_uuid")->primary();
            $table->foreignUuid("pegawai_uuid");
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('pegawai_uuid')->references('pegawai_uuid')->on('pegawai')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

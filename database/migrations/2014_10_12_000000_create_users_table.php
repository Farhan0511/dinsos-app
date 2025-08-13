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
            $table->id();
            $table->string('nik', 20)->unique()->nullable();
            $table->string('nama');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('alamat')->nullable();
            $table->enum('jenisKelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('nomorTelepon')->nullable();
            $table->string('fotoKtp')->nullable();
            $table->string('fotoRumah')->nullable();
            $table->string('fotoDiri')->nullable();
            $table->enum('jenisBantuan', ['Kursi Roda', 'Kaki Palsu', 'Tangan Palsu'])->nullable();
            $table->enum('role', ['admin', 'kepala dinas', 'petugas', 'user'])->default('user');
            $table->string('otp')->nullable();
            $table->timestamp('otp_expires_at')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->rememberToken();
            $table->timestamps();
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

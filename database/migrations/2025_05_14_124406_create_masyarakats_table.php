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
        Schema::create('masyarakats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('alamat');
            $table->enum('jenisKelamin', ['laki-laki', 'perempuan']);
            $table->enum('jenisBantuan', ['Kursi Roda', 'Kaki Palsu', 'Tangan Palsu']);
            $table->bigInteger('nomorTelepon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masyarakats');
    }
};

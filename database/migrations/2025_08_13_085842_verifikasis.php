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
        Schema::create('verifikasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable(false);
            $table->foreign('id_user')->on('users')->references('id')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('foto_rumah')->nullable();
            $table->string('foto_diri')->nullable();
            $table->enum('status', ['diterima', 'belum diterima'])->default('belum diterima');
            $table->date('tanggal_pengambilan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifikasis');
    }
};

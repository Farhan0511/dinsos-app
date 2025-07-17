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
        Schema::create('pengajuan_bansos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable(false);;
            $table->foreign('id_user')->on('users')->references('id')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('jenis_bantuan');
            $table->string('status')->default('belum diterima');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_bansos');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('beritas', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('penulis');
        $table->date('tanggal');
        $table->string('kategori');
        $table->string('gambar')->nullable();
        $table->text('isi');
        $table->unsignedBigInteger('id_user')->nullable(false);
        $table->foreign('id_user')->on('users')->references('id')->onUpdate('CASCADE')->onDelete('CASCADE');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};

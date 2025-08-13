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
        Schema::create('penerimas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable(false);
            $table->foreign('id_user')->on('users')->references('id')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->enum('status', ['diterima', 'belum diterima'])->default('belum diterima');
            $table->date('tanggal_pengambilan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penerimas');
    }
};

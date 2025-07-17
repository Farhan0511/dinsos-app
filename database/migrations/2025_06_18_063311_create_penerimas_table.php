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
            $table->string('nama');
            $table->string('nik', 20)->unique();
            $table->text('alamat');
            $table->date('tanggal_terima');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penerimas');
    }
};

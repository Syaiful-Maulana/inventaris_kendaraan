<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nama_id')->nullable();
            $table->foreign('nama_id')->references('id')->on('pegawais')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Jenis');
            $table->date('Tahun');
            $table->string('NoKendaraan');
            $table->string('NoBPKB');
            $table->string('unitKerja');
            $table->string('Kondisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraans');
    }
};

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
        Schema::create('request_barang_jadis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_barang_jadi_id');
            $table->foreignId('warna_barang_jadi_id');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->integer('quantitas');
            $table->date('tanggal_permintaan');
            $table->date('tanggal_pengiriman');
            $table->integer('status');
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
        Schema::dropIfExists('request_barang_jadis');
    }
};

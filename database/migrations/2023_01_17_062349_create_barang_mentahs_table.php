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
        Schema::create('barang_mentahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang_mentah');
            $table->string('jenis_barang_mentah');
            $table->string('warna_barang_mentah');
            $table->integer('stock_mentah');
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
        Schema::dropIfExists('barang_mentahs');
    }
};

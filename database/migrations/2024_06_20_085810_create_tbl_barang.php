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
        Schema::create('tbl_barang', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->string('id_jenisbarang')->nullable();
            $table->string('id_merk')->nullable();
            $table->string('id_satuan')->nullable();
            $table->string('nama_barang');
            $table->string('kode_barang');
            // $table->string('kategori');
            // $table->string('merk');
            $table->string('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_barang');
    }
};

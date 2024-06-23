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
            $table->string('kode_barang');
            $table->unsignedBigInteger('id_jenisbarang')->nullable();
            $table->unsignedBigInteger('id_merk')->nullable();
            $table->unsignedBigInteger('id_satuan')->nullable();
            $table->string('nama_barang');
            // $table->string('kategori');
            // $table->string('merk');
            $table->string('jumlah');
            $table->timestamps();
            $table->foreign('id_satuan')->references('id')->on('tbl_satuan')->onDelete('set null');
            $table->foreign('id_jenisbarang')->references('id')->on('tbl_jenisbarang')->onDelete('set null');
            $table->foreign('id_merk')->references('id')->on('tbl_merk')->onDelete('set null');
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

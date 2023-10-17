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
        Schema::create('produkmasuks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk_masuk');
            $table->string('kode_produk_masuk');
            $table->date('tanggal_produk_masuk');
            $table->string('gambar_produk_masuk');
            $table->string('satuan');
            $table->integer('kuantitas_produk_masuk');
            $table->decimal('harga_produk_masuk', 15, 2);
            $table->decimal('harga_grosir_produk_masuk', 15, 2);
            $table->unsignedBigInteger('kategori_produk_id');
            $table->unsignedBigInteger('supplier_id');
            $table->text('deskripsi_produk_masuk')->nullable();
            $table->foreign('kategori_produk_id')->references('id')->on('kategoriproduks')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produkmasuks');
    }
};

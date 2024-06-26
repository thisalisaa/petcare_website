<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriHotelsTable extends Migration
{
    public function up()
    {
        Schema::create('kategori_hotels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pethotel_id')->constrained()->onDelete('cascade');
            $table->string('nama_kategori');
            $table->decimal('harga_kategori', 10, 2);
            $table->integer('diskon_kategori');
            $table->decimal('total_harga', 10, 2)->nullable(); // Kolom total harga setelah diskon
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_hotels');
    }
}
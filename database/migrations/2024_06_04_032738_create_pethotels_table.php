<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePethotelsTable extends Migration
{
    public function up()
    {
        Schema::create('pethotels', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pethotels');
    }
}

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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pet');
            $table->string('nama_owner');
            $table->decimal('temperatur', 5, 2);
            $table->string('grooming_service');
            $table->date('tanggal_grooming');
            $table->string('kulit');
            $table->string('bulu');
            $table->string('telinga');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};

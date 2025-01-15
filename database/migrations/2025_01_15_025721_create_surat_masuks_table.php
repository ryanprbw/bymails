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
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nomor_urut')->default(0)->unique();
            $table->string('nomor_berkas', 20);
            $table->string('alamat_pengirim');
            $table->date('tanggal');
            $table->string('perihal');
            $table->timestamps();
            $table->string('file_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};

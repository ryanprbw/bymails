<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiSppdTable extends Migration
{
    public function up()
    {
        Schema::create('pegawai_sppd', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sppd_id')->constrained()->onDelete('cascade');
            $table->foreignId('pegawai_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pegawai_sppd');
    }
}


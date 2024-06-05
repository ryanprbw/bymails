<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sppds', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_urut');
            $table->string('nomor_berkas');
            $table->unsignedBigInteger('tujuan_id');
            $table->date('tanggal');
            $table->string('keperluan');
            // $table->unsignedBigInteger('pegawai_id');
            $table->string('file_path');
            $table->timestamps();

            // Foreign key constraints
            // $table->foreign('tujuan_id')->references('id')->on('tujuans')->onDelete('cascade');
            // $table->foreign('pegawai_id')->references('id')->on('pegawais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sppds');
    }
}

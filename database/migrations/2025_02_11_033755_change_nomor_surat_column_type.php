<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('surat_keputusan', function (Blueprint $table) {
            $table->integer('nomor_surat')->change(); // Mengubah tipe data menjadi INTEGER
        });
    }

    public function down()
    {
        Schema::table('surat_keputusan', function (Blueprint $table) {
            $table->string('nomor_surat')->change(); // Mengembalikan ke VARCHAR jika rollback
        });
    }

};

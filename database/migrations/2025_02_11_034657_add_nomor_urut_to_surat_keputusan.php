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
            $table->integer('nomor_urut')->default(0)->after('nomor_surat');
        });
    }

    public function down()
    {
        Schema::table('surat_keputusan', function (Blueprint $table) {
            $table->dropColumn('nomor_urut');
        });
    }

};

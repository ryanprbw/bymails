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
        Schema::table('sppd_pegawai', function (Blueprint $table) {
            $table->foreign(['pegawai_id'])->references(['id'])->on('pegawais')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['sppd_id'])->references(['id'])->on('sppds')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sppd_pegawai', function (Blueprint $table) {
            $table->dropForeign('sppd_pegawai_pegawai_id_foreign');
            $table->dropForeign('sppd_pegawai_sppd_id_foreign');
        });
    }
};

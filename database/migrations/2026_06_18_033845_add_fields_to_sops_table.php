<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('sops', function (Blueprint $table) {
            $table->integer('nomor_urut')->unique()->after('id');
            $table->string('nomor_sop')->unique()->after('nomor_urut');
            $table->string('nama_sop')->after('nomor_sop');
            $table->string('bidang')->nullable()->after('nama_sop');
            $table->date('tanggal_penetapan')->after('bidang');
            $table->enum('status', ['Aktif', 'Tidak Aktif'])
                ->default('Aktif')
                ->after('tanggal_penetapan');
            $table->text('keterangan')->nullable()->after('status');
            $table->string('file_path')->nullable()->after('keterangan');
        });
    }

    public function down(): void
    {
        Schema::table('sops', function (Blueprint $table) {
            $table->dropColumn([
                'nomor_urut',
                'nomor_sop',
                'nama_sop',
                'bidang',
                'tanggal_penetapan',
                'status',
                'keterangan',
                'file_path',
            ]);
        });
    }
};

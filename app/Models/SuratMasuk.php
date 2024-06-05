<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected static function boot()
    {
        parent::boot();

        // Set nomor urut sebelum membuat surat keluar baru
        static::creating(function ($model) {
            $lastSuratMasuk = SuratMasuk::orderBy('nomor_urut', 'desc')->first();
            $model->nomor_urut = $lastSuratMasuk ? $lastSuratMasuk->nomor_urut + 1 : 1;
        });
    }
    protected $fillable = [
        'nomor_urut',
        'nomor_berkas',
        'alamat_pengirim',
        'tanggal',
        // 'nomor',
        'perihal',
        'file_path'
    ];
}

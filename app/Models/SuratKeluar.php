<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        // Set nomor urut sebelum membuat surat keluar baru
        static::creating(function ($model) {
            $lastSuratKeluar = SuratKeluar::orderBy('nomor_urut', 'desc')->first();
            $model->nomor_urut = $lastSuratKeluar ? $lastSuratKeluar->nomor_urut + 1 : 1;
        });
    }
    protected $fillable = [
        'nomor_urut',
        'nomor_berkas',
        'alamat_penerima',
        'tanggal',
        'perihal',
        'file_path',
    ];
}

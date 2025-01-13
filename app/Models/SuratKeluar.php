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
            $lastNomorUrut = SuratKeluar::max('nomor_urut');
            $newNomorUrut = $lastNomorUrut ? $lastNomorUrut + 1 : 1;

            // Pastikan nomor urut yang baru tidak duplikat
            while (SuratKeluar::where('nomor_urut', $newNomorUrut)->exists()) {
                $newNomorUrut++;
            }

            $model->nomor_urut = $newNomorUrut;
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

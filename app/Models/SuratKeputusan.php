<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeputusan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'surat_keputusan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomor_surat',
        'tanggal_surat',
        'perihal',
        'tanggal_keputusan',
        'file_surat_keputusan',
        'nomor_urut',  // Pastikan nomor_urut juga bisa diisi melalui mass-assignment
    ];

    /**
     * Set nomor urut otomatis sebelum record Surat Keputusan disimpan.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Mendapatkan nomor urut terakhir yang ada di database
            $lastNomorUrut = SuratKeputusan::max('nomor_urut');

            // Menentukan nomor urut baru, dimulai dari 1 jika tidak ada data sebelumnya
            $newNomorUrut = $lastNomorUrut ? $lastNomorUrut + 1 : 1;

            // Memastikan nomor urut yang baru tidak duplikat (jika ada kasus yang tidak terduga)
            while (SuratKeputusan::where('nomor_urut', $newNomorUrut)->exists()) {
                $newNomorUrut++;
            }

            // Menetapkan nomor urut ke model
            $model->nomor_urut = $newNomorUrut;
        });
    }
}

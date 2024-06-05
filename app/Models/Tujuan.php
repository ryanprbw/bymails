<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    // protected $table = 'tujuan'; // Menentukan nama tabel yang terkait dengan model

    protected $fillable = [
        'nama_tujuan', 'province_id'
    ]; // Menentukan kolom yang dapat diisi secara massal

    // Jika ada relasi dengan tabel lain, seperti SPPD, maka relasinya dapat ditambahkan di sini.
    public function sppds()
    {
        return $this->hasMany(Sppd::class, 'tujuan_id', 'id');
    } // Relasi dengan model SPPD
}

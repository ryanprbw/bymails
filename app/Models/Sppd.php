<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    protected $fillable = ['nomor_urut', 'nomor_berkas', 'tujuan_id','pegawai_id', 'tanggal', 'keperluan', 'file_path'];

    public function pegawais()
    {
        return $this->belongsToMany(Pegawai::class, 'sppd_pegawai',);
    }
    public function tujuans()
    {
        return $this->hasOne(Tujuan::class, 'id','tujuan_id');
    }
    public function pegawai()
    {
        return $this->hasMany(PegawaiSppd::class, 'sppd_id','id');
    }
}

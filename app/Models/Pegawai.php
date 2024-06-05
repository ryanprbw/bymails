<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = ['nama_pegawai'];

    public function petugas()
    {
        return $this->belongsTo(PegawaiSppd::class, 'pegawai_id','id');
    }
}

<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiSppd extends Model
{

   protected $table ='sppd_pegawai';
   protected $with =['petugas'];
    public function sppds()
    {
        return $this->belongsTo(Sppd::class, 'sppd_id','id');
    }
    public function petugas(){

        return $this->hasOne(Pegawai::class ,'id','pegawai_id');
    }
}

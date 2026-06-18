<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    protected $fillable = [
        'nomor_urut',
        'nomor_sop',
        'nama_sop',
        'bidang',
        'tanggal_penetapan',
        'status',
        'keterangan',
        'file_path',
    ];
}

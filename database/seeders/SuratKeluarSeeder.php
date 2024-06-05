<?php

namespace Database\Seeders;

use App\Models\SuratKeluar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Gunakan loop untuk membuat 100 data dummy
        for ($i = 1; $i <= 100; $i++) {
            SuratKeluar::create([
                'nomor_urut' => 'SK/' . $i, // Nomor urut unik
                'nomor_berkas' => 'B/' . $i, // Nomor berkas unik
                'alamat_penerima' => 'Alamat Penerima ' . $i, // Alamat penerima
                'tanggal' => now()->subDays($i), // Tanggal surat keluar
                'perihal' => 'Perihal Surat ' . $i, // Perihal surat
                // 'file_path' => 'path/to/file', // Path file jika ada
            ]);
        }
    }
}

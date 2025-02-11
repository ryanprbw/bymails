<?php

namespace App\Http\Controllers;

use App\Models\SuratKeputusan;
use Illuminate\Http\Request;

class SuratKeputusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // Filter untuk pencarian dan paginasi
        $perPage = $request->get('per_page', 50); // Default 50 per halaman
        $search = $request->get('search');

        // Query dengan pencarian
        $query = SuratKeputusan::query();
        if ($search) {
            $query->where('nomor_surat', 'like', "%{$search}%")
                ->orWhere('perihal', 'like', "%{$search}%")
                ->orWhere('tanggal_surat', 'like', "%{$search}%")
                ->orWhere('tanggal_keputusan', 'like', "%{$search}%");
        }

        // Mengurutkan berdasarkan nomor_urut (dengan CAST untuk memastikan pengurutan numerik)
        $query->orderBy('nomor_urut', 'desc'); // Urutkan berdasarkan nomor_urut secara menurun (terbesar terlebih dahulu)

        // Ambil data dengan paginasi
        $suratKeputusan = $query->paginate($perPage);

        // Kirim data ke view
        return view('back-end.surat_keputusan.index', compact('suratKeputusan'));
    }






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastNomorUrut = SuratKeputusan::max('nomor_urut') ?? 0;
        return view('back-end.surat_keputusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required',
            'tanggal_keputusan' => 'required|date',
            'file_surat_keputusan' => 'nullable|file|mimes:pdf|max:2048', // Validasi file
        ]);

        $data = $request->all();

        // Proses upload file jika ada
        if ($request->hasFile('file_surat_keputusan')) {
            $file = $request->file('file_surat_keputusan');
            $filePath = $file->store('surat_keputusan', 'public');
            $data['file_surat_keputusan'] = $filePath;
        }

        SuratKeputusan::create($data);

        return redirect()->route('surat_keputusan.index')->with('success', 'Surat Keputusan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeputusan $suratKeputusan)
    {
        return view('back-end.surat_keputusan.show', compact('suratKeputusan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeputusan $suratKeputusan)
    {
        return view('back-end.surat_keputusan.edit', compact('suratKeputusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeputusan $suratKeputusan)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required',
            'tanggal_keputusan' => 'required|date',
            'file_surat_keputusan' => 'nullable|file|mimes:pdf|max:2048', // Validasi file
        ]);

        $data = $request->all();

        // Proses upload file jika ada
        if ($request->hasFile('file_surat_keputusan')) {
            // Hapus file lama jika ada
            if ($suratKeputusan->file_surat_keputusan && \Storage::exists('public/' . $suratKeputusan->file_surat_keputusan)) {
                \Storage::delete('public/' . $suratKeputusan->file_surat_keputusan);
            }

            $file = $request->file('file_surat_keputusan');
            $filePath = $file->store('surat_keputusan', 'public');
            $data['file_surat_keputusan'] = $filePath;
        }

        $suratKeputusan->update($data);

        return redirect()->route('surat_keputusan.index')->with('success', 'Surat Keputusan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeputusan $suratKeputusan)
    {
        // Hapus file terkait jika ada
        if ($suratKeputusan->file_surat_keputusan && \Storage::exists('public/' . $suratKeputusan->file_surat_keputusan)) {
            \Storage::delete('public/' . $suratKeputusan->file_surat_keputusan);
        }

        $suratKeputusan->delete();

        return redirect()->route('surat_keputusan.index')->with('success', 'Surat Keputusan berhasil dihapus.');
    }
}

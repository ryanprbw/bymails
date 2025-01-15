<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = SuratKeluar::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nomor_urut', 'like', "%{$search}%")
                    ->orWhere('nomor_berkas', 'like', "%{$search}%")
                    ->orWhere('alamat_penerima', 'like', "%{$search}%")
                    ->orWhere('tanggal', 'like', "%{$search}%")
                    ->orWhere('perihal', 'like', "%{$search}%");
            });
        }

        // Gunakan query yang sudah difilter untuk pagination
        $role = Auth::user()->role;

        $perPage = request()->input('per_page', 50);
        $suratKeluars = $query->orderBy('nomor_urut', 'desc')->paginate($perPage);
        $jumlahSuratKeluars = $suratKeluars->total(); // Menghitung jumlah data

        return view('back-end.surat_keluar.index', compact('suratKeluars', 'jumlahSuratKeluars', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastNomorUrut = SuratKeluar::max('nomor_urut') ?? 0;
        return view('back-end.surat_keluar.create', compact('lastNomorUrut'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_berkas' => 'required|max:100',
            'alamat_penerima' => 'required',
            'tanggal' => 'required|date',
            'perihal' => 'required',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:2048' // Validation for file uploads
        ]);

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $path = $file->store('surat_keluar_files', 'public'); // Store file in the public disk
            $validatedData['file_path'] = $path;
        }

        SuratKeluar::create($validatedData);

        return redirect()->route('surat_keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratKeluar  $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(SuratKeluar $suratKeluar)
    {
        return view('back-end.surat_keluar.show', compact('suratKeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuratKeluar  $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratKeluar $suratKeluar)
    {
        // Memeriksa apakah pengguna memiliki peran 'admin' sebelum menampilkan halaman edit
        if (Auth::user()->role === 'admin') {
            return view('back-end.surat_keluar.edit', compact('suratKeluar'));
        } else {
            // Redirect ke halaman lain atau kembalikan respons yang sesuai untuk pengguna non-admin
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuratKeluar  $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $validatedData = $request->validate([
            'nomor_berkas' => 'required|max:100',
            'alamat_penerima' => 'required',
            'tanggal' => 'required|date',
            'perihal' => 'required',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:2048' // Validation for file uploads
        ]);

        if ($request->hasFile('file_path')) {
            // Delete the old file if it exists
            if ($suratKeluar->file_path) {
                Storage::disk('public')->delete($suratKeluar->file_path);
            }

            $file = $request->file('file_path');
            $path = $file->store('surat_keluar_files', 'public'); // Store new file in the public disk
            $validatedData['file_path'] = $path;
        }

        $suratKeluar->update($validatedData);

        return redirect()->route('surat_keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuratKeluar  $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratKeluar $suratKeluar)
    {
        // Memeriksa apakah pengguna memiliki peran 'admin' sebelum menghapus surat keluar
        if (Auth::user()->role === 'admin') {
            // Hapus file jika ada
            if ($suratKeluar->file_path) {
                Storage::disk('public')->delete($suratKeluar->file_path);
            }

            $suratKeluar->delete();

            return redirect()->route('surat_keluar.index')
                ->with('success', 'Surat keluar berhasil dihapus.');
        } else {
            // Redirect ke halaman lain atau kembalikan respons yang sesuai untuk pengguna non-admin
        }
    }
}

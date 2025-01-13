<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = SuratMasuk::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nomor_urut', 'like', "%{$search}%")
                    ->orWhere('nomor_berkas', 'like', "%{$search}%")
                    ->orWhere('alamat_pengirim', 'like', "%{$search}%")
                    ->orWhere('tanggal', 'like', "%{$search}%")
                    // ->orWhere('nomor', 'like', "%{$search}%")
                    ->orWhere('perihal', 'like', "%{$search}%");
            });
        }
        $role = Auth::user()->role;
        $perPage = request()->input('per_page', 50);
        $suratMasuks = $query->orderBy('nomor_urut', 'desc')->paginate($perPage);
        $jumlahSuratMasuks = $suratMasuks->total();

        return view('back-end.surat_masuk.index', compact('suratMasuks', 'jumlahSuratMasuks', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastNomorUrut = SuratMasuk::max('nomor_urut') ?? 0;
        return view('back-end.surat_masuk.create', compact('lastNomorUrut'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'nomor_urut' => 'required',
            'nomor_berkas' => 'required|string|max:255',
            'alamat_pengirim' => 'required|string|max:255',
            'tanggal' => 'required|date',
            // 'nomor' => 'required|string|max:255',
            'perihal' => 'required|string|max:1000',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $path = $file->store('surat_masuk_files', 'public');
            $validatedData['file_path'] = $path;
        }

        SuratMasuk::create($validatedData);

        return redirect()->route('surat_masuk.index')
            ->with('success', 'Surat masuk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratMasuk)
    {
        return view('back-end.surat_masuk.show', compact('suratMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratMasuk $suratMasuk)
    {
        return view('back-end.surat_masuk.edit', compact('suratMasuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        $validatedData = $request->validate([
            // 'nomor_urut' => 'required',
            'nomor_berkas' => 'required|string|max:255',
            'alamat_pengirim' => 'required|string|max:255',
            'tanggal' => 'required|date',
            // 'nomor' => 'required|string|max:255',
            'perihal' => 'required|string|max:1000',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('file_path')) {
            if ($suratMasuk->file_path) {
                Storage::disk('public')->delete($suratMasuk->file_path);
            }

            $file = $request->file('file_path');
            $path = $file->store('surat_masuk_files', 'public');
            $validatedData['file_path'] = $path;
        }

        $suratMasuk->update($validatedData);

        return redirect()->route('surat_masuk.index')
            ->with('success', 'Surat masuk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratMasuk)
    {
        if ($suratMasuk->file_path) {
            Storage::disk('public')->delete($suratMasuk->file_path);
        }

        $suratMasuk->delete();

        return redirect()->route('surat_masuk.index')
            ->with('success', 'Surat masuk berhasil dihapus.');
    }
}

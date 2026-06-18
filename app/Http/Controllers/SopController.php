<?php

namespace App\Http\Controllers;

use App\Models\Sop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sops = Sop::latest()->paginate(10);

        return view('back-end.sop.index', compact('sops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastNomorUrut = Sop::max('nomor_urut') ?? 0;

        return view('back-end.sop.create', compact('lastNomorUrut'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_sop' => 'required|unique:sops',
            'nama_sop' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'tanggal_penetapan' => 'required|date',
            'status' => 'required',
            'keterangan' => 'nullable',
            'file_path' => 'nullable|mimes:pdf|max:5120',
        ]);

        $validated['nomor_urut'] = (Sop::max('nomor_urut') ?? 0) + 1;

        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request
                ->file('file_path')
                ->store('sops', 'public');
        }

        Sop::create($validated);

        return redirect()
            ->route('back-end.sop.create')
            ->with('success', 'Data SOP berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sop $sop)
    {
        return view('sops.show', compact('sop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sop $sop)
    {
        return view('sops.edit', compact('sop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sop $sop)
    {
        $validated = $request->validate([
            'nomor_sop' => 'required|unique:sops,nomor_sop,' . $sop->id,
            'nama_sop' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'tanggal_penetapan' => 'required|date',
            'status' => 'required',
            'keterangan' => 'nullable',
            'file_path' => 'nullable|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('file_path')) {

            if ($sop->file_path && Storage::disk('public')->exists($sop->file_path)) {
                Storage::disk('public')->delete($sop->file_path);
            }

            $validated['file_path'] = $request
                ->file('file_path')
                ->store('sops', 'public');
        }

        $sop->update($validated);

        return redirect()
            ->route('sops.index')
            ->with('success', 'Data SOP berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sop $sop)
    {
        if ($sop->file_path && Storage::disk('public')->exists($sop->file_path)) {
            Storage::disk('public')->delete($sop->file_path);
        }

        $sop->delete();

        return redirect()
            ->route('sops.index')
            ->with('success', 'Data SOP berhasil dihapus.');
    }
}
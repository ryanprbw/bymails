<?php
namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\Sppd;
use App\Models\Tujuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SppdController extends Controller
{
    public function index(Request $request)
{
    $query = Sppd::query();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('nomor_urut', 'like', "%{$search}%")
              ->orWhere('nomor_berkas', 'like', "%{$search}%")
              ->orWhereHas('tujuans', function ($query) use ($search) {
                  $query->where('nama_tujuan', 'like', "%{$search}%");
              })
              ->orWhere('tanggal', 'like', "%{$search}%")
              ->orWhere('keperluan', 'like', "%{$search}%");
    }
    $role = Auth::user()->role;
    $sppds = $query->with('pegawais', 'tujuans')->orderBy('nomor_urut', 'desc')->paginate(10);

    return view('back-end.sppd.index', compact('sppds','role'));
}


    public function create()
    {
        $lastNomorUrut = Sppd::max('nomor_urut');
        $tujuans = Tujuan::all(); // Mengambil semua data dari tabel tujuans
        $pegawais = Pegawai::all(); // Mengambil semua data dari tabel pegawais
        return view('back-end.sppd.create', compact('tujuans', 'pegawais','lastNomorUrut'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nomor_urut' => 'required',
        'nomor_berkas' => 'required',
        'tujuan_id' => 'required|exists:tujuans,id',
        'tanggal' => 'required|date',
        'keperluan' => 'required',
        'pegawai_id' => 'required|array',
        'pegawai_id.*' => 'exists:pegawais,id',
        'file_path' => 'required|file|mimes:pdf,doc,docx|max:2048',
    ]);
    $data = $request->except('pegawai_id');


    if ($request->hasFile('file_path')) {
        $file = $request->file('file_path');
        $path = $file->store('sppd_files', 'public'); // Store file in the public disk
        $data['file_path'] = $path;
        
    }
    
    $sppd = Sppd::create($data);


    // Menyimpan relasi pegawai
    $sppd->pegawais()->sync($request->pegawai_id);

    return redirect()->route('sppd.index')->with('success', 'SPPD berhasil dibuat.');
}

    public function show($id)
    {
        $sppd = Sppd::with('pegawai', 'tujuans')->findOrFail($id); // Include relationships
        // dd($sppd);
        return view('back-end.sppd.show', compact('sppd'));
        
    }

    public function edit($id)
    {
        $sppd = Sppd::findOrFail($id);
        $tujuans = Tujuan::all();
        $pegawais = Pegawai::all();
        $pegawai = Pegawai::findOrFail($id);
        $selectedPegawais = $sppd->pegawais()->pluck('pegawais.id')->toArray(); // Mengambil id pegawai yang telah terkait dengan entitas yang diedit
        
        return view('back-end.sppd.edit', compact('sppd', 'tujuans', 'pegawais', 'selectedPegawais'));
    }
    
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_urut' => 'required',
            'nomor_berkas' => 'required',
            'tujuan_id' => 'required|exists:tujuans,id',
            'tanggal' => 'required|date',
            'keperluan' => 'required',
            'pegawai_id' => 'required|array',
            'pegawai_id.*' => 'exists:pegawais,id',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);
    
        $sppd = Sppd::findOrFail($id);
        $data = $request->except('pegawai_id');
    
        if ($request->hasFile('file_path')) {
            // Delete the old file if it exists
            if ($sppd->file_path && Storage::disk('public')->exists($sppd->file_path)) {
                Storage::disk('public')->delete($sppd->file_path);
            }
    
            $file = $request->file('file_path');
            $path = $file->store('sppd_files', 'public');
            $data['file_path'] = $path;
        }
    
        $sppd->update($data);
    
        // Update pegawai relations
        $sppd->pegawais()->sync($request->pegawai_id);
    
        return redirect()->route('sppd.index')->with('success', 'SPPD berhasil diperbarui.');
    }
    
    public function destroy($id)
    {
        $sppd = Sppd::findOrFail($id);
        // Menghapus file terkait sebelum menghapus entri dari database
        Storage::delete('public/' . $sppd->file_path);
        $sppd->pegawais()->detach(); // Detach relationships
        $sppd->delete();

        return redirect()->route('sppd.index')->with('success', 'SPPD berhasil dihapus');
    }
}

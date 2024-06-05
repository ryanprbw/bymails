<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail SPPD') }}
        </h2>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="mb-4">
                    <a href="{{ route('sppd.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <strong>Nomor Urut:</strong>
                        <p>{{ $sppd->nomor_urut }}</p>
                    </div>
                    <div>
                        <strong>Nomor Berkas:</strong>
                        <p>{{ $sppd->nomor_berkas }}</p>
                    </div>
                    <div>
                        <strong>Tujuan:</strong>
                        <p>{{ $sppd->tujuans->nama_tujuan }}</p>
                    </div>
                    <div>
                        <strong>Tanggal:</strong>
                        <p>{{ $sppd->tanggal }}</p>
                    </div>
                    <div>
                        <strong>Keperluan:</strong>
                        <p>{{ $sppd->keperluan }}</p>
                    </div>
                    <div>
                        <strong>Pegawai:</strong>
                        @foreach ($sppd->pegawai as $pegawai)
                            <p>{{ $pegawai->petugas->nama_pegawai }}</p>
                        @endforeach
                    </div>
                    <div>
                        <strong>File:</strong>
                        @if ($sppd->file_path)
                            <a href="{{ Storage::url($sppd->file_path) }}" target="_blank" class="btn btn-info">Download File</a>
                        @else
                            <p>No file uploaded.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

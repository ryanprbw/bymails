<!-- resources/views/back-end/surat_keluar/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lihat Surat Keluar') }}
        </h2>
    </x-slot>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="mb-4">
                <label for="nomor_berkas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor
                    Berkas</label>
                <input type="text" name="nomor_berkas" id="nomor_berkas"
                    class="mt-1 block w-full bg-gray-100 dark:bg-gray-800 border-gray-300 dark:border-gray-600 rounded-md shadow-sm"
                    value="{{ $suratKeluar->nomor_berkas }}" readonly>
            </div>
            <div class="mb-4">
                <label for="alamat_penerima" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat
                    Penerima</label>
                <input type="text" name="alamat_penerima" id="alamat_penerima"
                    class="mt-1 block w-full bg-gray-100 dark:bg-gray-800 border-gray-300 dark:border-gray-600 rounded-md shadow-sm"
                    value="{{ $suratKeluar->alamat_penerima }}" readonly>
            </div>
            <div class="mb-4">
                <label for="tanggal" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal</label>
                <input type="text" name="tanggal" id="tanggal"
                    class="mt-1 block w-full bg-gray-100 dark:bg-gray-800 border-gray-300 dark:border-gray-600 rounded-md shadow-sm"
                    value="{{ $suratKeluar->tanggal }}" readonly>
            </div>
            <div class="mb-4">
                <label for="perihal" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Perihal</label>
                <input type="text" name="perihal" id="perihal"
                    class="mt-1 block w-full bg-gray-100 dark:bg-gray-800 border-gray-300 dark:border-gray-600 rounded-md shadow-sm"
                    value="{{ $suratKeluar->perihal }}" readonly>
            </div>
           
            <embed src="{{ asset('storage/' . $suratKeluar->file_path) }}" type="application/pdf" width="100%" height="600px">

            <div class="mt-4">
                <a href="{{ route('surat_keluar.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Kembali</a>
            </div>
        </div>
    </div>
</x-app-layout>

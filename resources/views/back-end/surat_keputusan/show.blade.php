<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-32">
            {{ __('Detail Surat Keputusan') }}
        </h2>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="bg-white dark:bg-gray-800 p-6 shadow-md rounded-lg ">
            <h1 class="text-2xl font-bold mb-4">Detail Surat Keputusan</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <!-- Nomor Surat -->
                <div>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Nomor Surat</h3>
                    <p class="text-lg text-gray-800 dark:text-gray-200">{{ $suratKeputusan->nomor_surat }}</p>
                </div>

                <!-- Tanggal Surat -->
                <div>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Surat</h3>
                    <p class="text-lg text-gray-800 dark:text-gray-200">{{ $suratKeputusan->tanggal_surat }}</p>
                </div>

                <!-- Perihal -->
                <div>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Perihal</h3>
                    <p class="text-lg text-gray-800 dark:text-gray-200">{{ $suratKeputusan->perihal }}</p>
                </div>

                <!-- Tanggal Keputusan -->
                <div>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Keputusan</h3>
                    <p class="text-lg text-gray-800 dark:text-gray-200">{{ $suratKeputusan->tanggal_keputusan }}</p>
                </div>

                <!-- File Surat Keputusan -->
                <div class="col-span-1 sm:col-span-2">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">File Surat Keputusan</h3>
                    @if ($suratKeputusan->file_surat_keputusan)
                        <a href="{{ asset('storage/' . $suratKeputusan->file_surat_keputusan) }}" target="_blank"
                            class="text-blue-600 dark:text-blue-400 hover:underline">
                            Lihat File
                        </a>
                    @else
                        <p class="text-lg text-gray-500 dark:text-gray-400">Tidak ada file yang diunggah.</p>
                    @endif
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end mt-6">
                <a href="{{ route('surat_keputusan.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
                    Kembali
                </a>
                <a href="{{ route('surat_keputusan.edit', $suratKeputusan->id) }}" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Edit
                </a>
                <form action="{{ route('surat_keputusan.destroy', $suratKeputusan->id) }}" method="POST" class="inline ml-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700" onclick="return confirm('Yakin ingin menghapus?')">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

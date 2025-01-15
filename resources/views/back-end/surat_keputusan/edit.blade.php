<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-32">
            {{ __('Edit Surat Keputusan') }}
        </h2>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="bg-white dark:bg-gray-800 p-6 shadow-md rounded-lg">
            <h1 class="text-2xl font-bold mb-4">Form Edit Surat Keputusan</h1>
            
            <!-- Form -->
            <form action="{{ route('surat_keputusan.update', $suratKeputusan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Nomor Surat -->
                <div class="mb-4">
                    <label for="nomor_surat" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nomor Surat</label>
                    <input type="text" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat', $suratKeputusan->nomor_surat) }}"
                        class="mt-1 block w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300"
                        required>
                    @error('nomor_surat')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tanggal Surat -->
                <div class="mb-4">
                    <label for="tanggal_surat" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tanggal Surat</label>
                    <input type="date" id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat', $suratKeputusan->tanggal_surat) }}"
                        class="mt-1 block w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300"
                        required>
                    @error('tanggal_surat')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Perihal -->
                <div class="mb-4">
                    <label for="perihal" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Perihal</label>
                    <input type="text" id="perihal" name="perihal" value="{{ old('perihal', $suratKeputusan->perihal) }}"
                        class="mt-1 block w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300"
                        required>
                    @error('perihal')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tanggal Keputusan -->
                <div class="mb-4">
                    <label for="tanggal_keputusan" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tanggal Keputusan</label>
                    <input type="date" id="tanggal_keputusan" name="tanggal_keputusan" value="{{ old('tanggal_keputusan', $suratKeputusan->tanggal_keputusan) }}"
                        class="mt-1 block w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300"
                        required>
                    @error('tanggal_keputusan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Upload File -->
                <div class="mb-4">
                    <label for="file_surat_keputusan" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Upload File Baru (Opsional)</label>
                    <input type="file" id="file_surat_keputusan" name="file_surat_keputusan"
                        class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <small class="text-gray-500 dark:text-gray-400">Hanya file PDF, maksimal 2MB.</small>
                    @error('file_surat_keputusan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- File Sebelumnya -->
                @if ($suratKeputusan->file_surat_keputusan)
                    <div class="mb-4">
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">File Sebelumnya</h3>
                        <a href="{{ asset('storage/' . $suratKeputusan->file_surat_keputusan) }}" target="_blank"
                            class="text-blue-600 dark:text-blue-400 hover:underline">
                            Lihat File
                        </a>
                    </div>
                @endif

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <a href="{{ route('surat_keputusan.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
                        Kembali
                    </a>
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

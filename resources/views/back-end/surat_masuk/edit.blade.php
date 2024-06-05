<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Surat Masuk</h2>
                    @if (session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('surat_masuk.update', $suratMasuk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="w-full">
                                <label for="nomor_berkas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Berkas</label>
                                <input type="text" name="nomor_berkas" id="nomor_berkas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $suratMasuk->nomor_berkas }}" required>
                                @error('nomor_berkas')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="alamat_pengirim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Pengirim</label>
                                <input type="text" name="alamat_pengirim" id="alamat_pengirim" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $suratMasuk->alamat_pengirim }}" required>
                                @error('alamat_pengirim')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $suratMasuk->tanggal }}" required>
                                @error('tanggal')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="w-full">
                                <label for="nomor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor</label>
                                <input type="text" name="nomor" id="nomor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $suratMasuk->nomor }}" required>
                                @error('nomor')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div class="sm:col-span-2">
                                <label for="perihal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perihal</label>
                                <textarea name="perihal" id="perihal" rows="5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>{{ $suratMasuk->perihal }}</textarea>
                                @error('perihal')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="file_path" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload File (PDF, DOCX)</label>
                                <input type="file" name="file_path" id="file_path" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" accept=".pdf,.doc,.docx">
                                @error('file_path')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                                @if ($suratMasuk->file_path)
                                    <a href="{{ Storage::url($suratMasuk->file_path) }}" target="_blank" class="text-blue-600 dark:text-blue-400">Lihat File Saat Ini</a>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">Update</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>

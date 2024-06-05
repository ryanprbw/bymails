<x-app-layout>
    <h1 class="sm:ml-64 mt-4 text-lg font-semibold text-gray-800 dark:text-gray-200">
        Nomor Urut Terakhir: <span id="last_nomor_urut">{{ $lastNomorUrut }}</span>
    </h1>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Surat Keluar</h2>
                    <form action="{{ route('surat_keluar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                           
                            <div class="w-full">
                                <label for="nomor_berkas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Berkas</label>
                                <input type="text" name="nomor_berkas" id="nomor_berkas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nomor Berkas" required>
                                @error('nomor_berkas')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                            </div>
                            <div class="w-full">
                                <div class="form-group">
                                    <label for="file_path">Upload PDF</label>
                                    <input type="file" class="form-control" id="file_path" name="file_path">
                                </div>
                                @error('nomor_berkas')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                            </div>
                            <div class="w-full">
                                <label for="alamat_penerima" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Penerima</label>
                                <input type="text" name="alamat_penerima" id="alamat_penerima" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Alamat Penerima" required>
                                @error('alamat_penerima')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                            </div>
                            <div class="w-full">
                                <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                @error('tanggal')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="perihal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perihal</label>
                                <textarea name="perihal" id="perihal" rows="5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Perihal" required></textarea>
                                @error('perihal')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                            </div>
                        </div>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">Simpan</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>

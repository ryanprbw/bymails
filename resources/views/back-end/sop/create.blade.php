```blade
<x-app-layout>
    <div class="p-4 sm:ml-64">

        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <section class="bg-white dark:bg-gray-900">

                <h1 class=" mt-4 text-lg font-semibold text-gray-800 dark:text-gray-200">
                    Nomor Urut SOP Terakhir: <span id="last_nomor_urut">{{ $lastNomorUrut }}</span>


                </h1>
                <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">

                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                        Tambah SOP
                    </h2>

                    <form action="{{ route('sops.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                            <div class="w-full">
                                <label for="nomor_sop"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nomor SOP
                                </label>

                                <input type="text" name="nomor_sop" id="nomor_sop" value="{{ old('nomor_sop') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    required>

                                @error('nomor_sop')
                                    <p class="text-red-500 text-sm mt-2">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="w-full">

                                <label for="tanggal_penetapan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tanggal Penetapan
                                </label>

                                <input type="date" name="tanggal_penetapan" id="tanggal_penetapan"
                                    value="{{ old('tanggal_penetapan') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    required>

                                @error('tanggal_penetapan')
                                    <p class="text-red-500 text-sm mt-2">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                            <div class="sm:col-span-2">

                                <label for="nama_sop"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nama SOP
                                </label>

                                <input type="text" name="nama_sop" id="nama_sop" value="{{ old('nama_sop') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    required>

                                @error('nama_sop')
                                    <p class="text-red-500 text-sm mt-2">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                            <div class="w-full">

                                <label for="bidang"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Bidang
                                </label>

                                <select name="bidang" id="bidang"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">

                                    <option value="">Pilih Bidang</option>
                                    <option value="Sekretariat">Sekretariat</option>
                                    <option value="DAFDUK">DAFDUK</option>
                                    <option value="PIAK">PIAK</option>
                                    <option value="CAPIL">CAPIL</option>
                                    <option value="PDIP">PDIP</option>

                                </select>

                            </div>

                            <div class="w-full">

                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Status
                                </label>

                                <select name="status" id="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">

                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>

                                </select>

                            </div>

                            <div class="w-full sm:col-span-2">

                                <label for="file_path"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Upload SOP (PDF)
                                </label>

                                <input type="file" id="file_path" name="file_path" accept=".pdf"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">

                            </div>

                            <div class="sm:col-span-2">

                                <label for="keterangan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Keterangan
                                </label>

                                <textarea name="keterangan" id="keterangan" rows="5"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"></textarea>

                            </div>

                        </div>

                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 text-sm font-medium text-white bg-blue-700 rounded-lg">
                            Simpan
                        </button>

                    </form>

                </div>

            </section>

        </div>

    </div>

</x-app-layout>
```

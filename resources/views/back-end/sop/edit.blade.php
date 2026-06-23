```blade
<x-app-layout>

    <div class="p-4 sm:ml-64">

        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <section class="bg-white dark:bg-gray-900">

                <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">

                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                        Edit SOP
                    </h2>

                    @if ($errors->any())
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('sops.update', $sop->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                            <div class="w-full">
                                <label for="nomor_sop"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nomor SOP
                                </label>

                                <input type="text" name="nomor_sop" id="nomor_sop"
                                    value="{{ old('nomor_sop', $sop->nomor_sop) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    required>
                            </div>

                            <div class="w-full">
                                <label for="tanggal_penetapan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Tanggal Penetapan
                                </label>

                                <input type="date" name="tanggal_penetapan" id="tanggal_penetapan"
                                    value="{{ old('tanggal_penetapan', $sop->tanggal_penetapan) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    required>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="nama_sop"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nama SOP
                                </label>

                                <input type="text" name="nama_sop" id="nama_sop"
                                    value="{{ old('nama_sop', $sop->nama_sop) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    required>
                            </div>

                            <div class="w-full">
                                <label for="bidang"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Bidang
                                </label>

                                <select name="bidang" id="bidang"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">

                                    <option value="Sekretariat" {{ $sop->bidang == 'Sekretariat' ? 'selected' : '' }}>
                                        Sekretariat
                                    </option>

                                    <option value="DAFDUK" {{ $sop->bidang == 'DAFDUK' ? 'selected' : '' }}>
                                        DAFDUK
                                    </option>

                                    <option value="PIAK" {{ $sop->bidang == 'PIAK' ? 'selected' : '' }}>
                                        PIAK
                                    </option>

                                    <option value="CAPIL" {{ $sop->bidang == 'CAPIL' ? 'selected' : '' }}>
                                        CAPIL
                                    </option>
                                    <option value="PDIP" {{ $sop->bidang == 'PDIP' ? 'selected' : '' }}>
                                        PDIP
                                    </option>

                                </select>
                            </div>

                            <div class="w-full">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Status
                                </label>

                                <select name="status" id="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">

                                    <option value="Aktif" {{ $sop->status == 'Aktif' ? 'selected' : '' }}>
                                        Aktif
                                    </option>

                                    <option value="Tidak Aktif" {{ $sop->status == 'Tidak Aktif' ? 'selected' : '' }}>
                                        Tidak Aktif
                                    </option>

                                </select>
                            </div>

                            <div class="sm:col-span-2">

                                <label for="file_path"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    File SOP (PDF)
                                </label>

                                <input type="file" id="file_path" name="file_path" accept=".pdf"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">

                                @if ($sop->file_path)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . $sop->file_path) }}" target="_blank"
                                            class="text-blue-600 hover:underline">
                                            Lihat File SOP Saat Ini
                                        </a>
                                    </div>
                                @endif

                            </div>

                            <div class="sm:col-span-2">

                                <label for="keterangan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Keterangan
                                </label>

                                <textarea name="keterangan" id="keterangan" rows="5"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">{{ old('keterangan', $sop->keterangan) }}</textarea>

                            </div>

                        </div>

                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-yellow-700">
                            Update SOP
                        </button>

                        <a href="{{ route('sops.index') }}"
                            class="inline-flex items-center px-5 py-2.5 mt-4 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700">
                            Kembali
                        </a>

                    </form>

                </div>

            </section>

        </div>

    </div>

</x-app-layout>
```

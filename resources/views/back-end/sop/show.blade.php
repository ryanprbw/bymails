```blade
<x-app-layout>

    <div class="p-4 sm:ml-64">

        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">

                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                        Detail SOP
                    </h2>

                    <a href="{{ route('sops.index') }}"
                        class="px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700">
                        Kembali
                    </a>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-medium text-gray-500">
                            Nomor Urut
                        </label>
                        <p class="mt-1 text-gray-900 dark:text-white">
                            {{ $sop->nomor_urut }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">
                            Nomor SOP
                        </label>
                        <p class="mt-1 text-gray-900 dark:text-white">
                            {{ $sop->nomor_sop }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">
                            Bidang
                        </label>
                        <p class="mt-1 text-gray-900 dark:text-white">
                            {{ $sop->bidang }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">
                            Tanggal Penetapan
                        </label>
                        <p class="mt-1 text-gray-900 dark:text-white">
                            {{ \Carbon\Carbon::parse($sop->tanggal_penetapan)->format('d-m-Y') }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">
                            Status
                        </label>

                        <div class="mt-1">

                            @if ($sop->status == 'Aktif')
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded">
                                    Aktif
                                </span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-3 py-1 rounded">
                                    Tidak Aktif
                                </span>
                            @endif

                        </div>
                    </div>

                </div>

                <div class="mt-6">

                    <label class="block text-sm font-medium text-gray-500">
                        Nama SOP
                    </label>

                    <p class="mt-2 text-gray-900 dark:text-white">
                        {{ $sop->nama_sop }}
                    </p>

                </div>

                <div class="mt-6">

                    <label class="block text-sm font-medium text-gray-500">
                        Keterangan
                    </label>

                    <div class="mt-2 p-4 bg-gray-50 rounded-lg dark:bg-gray-700">
                        {{ $sop->keterangan ?? '-' }}
                    </div>

                </div>

                <div class="mt-6">

                    <label class="block text-sm font-medium text-gray-500">
                        File SOP
                    </label>

                    <div class="mt-2">

                        @if ($sop->file_path)
                            <a href="{{ asset('storage/' . $sop->file_path) }}" target="_blank"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">

                                Lihat / Download SOP

                            </a>
                        @else
                            <span class="text-red-500">
                                File SOP belum tersedia
                            </span>
                        @endif

                    </div>

                </div>

                <div class="mt-8 flex gap-2">

                    <a href="{{ route('sops.edit', $sop->id) }}"
                        class="px-4 py-2 text-sm font-medium text-white bg-yellow-600 rounded-lg hover:bg-yellow-700">
                        Edit SOP
                    </a>

                    <a href="{{ route('sops.index') }}"
                        class="px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700">
                        Kembali
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
```

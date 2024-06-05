<x-app-layout>
    <x-slot name="header">
        <h2 class="sm:ml-64 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit SPPD') }}
        </h2>
    </x-slot>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <form action="{{ route('sppd.update', $sppd->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nomor Urut -->
                        <div>
                            <label for="nomor_urut"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Urut</label>
                            <input type="text" name="nomor_urut" id="nomor_urut"
                                value="{{ old('nomor_urut', $sppd->nomor_urut) }}"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required>
                        </div>

                        <!-- Nomor Berkas -->
                        <div class="mt-4">
                            <label for="nomor_berkas"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Berkas</label>
                            <input type="text" name="nomor_berkas" id="nomor_berkas"
                                value="{{ old('nomor_berkas', $sppd->nomor_berkas) }}"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required>
                        </div>

                        <!-- Tujuan -->
                        <div class="mt-4">
                            <label for="tujuan_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tujuan</label>
                            <select name="tujuan_id" id="tujuan_id"
                                class="js-example-basic-single mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required>
                                @foreach ($tujuans as $tujuan)
                                <option value="{{ $tujuan->id }}" {{ $sppd->tujuan_id == $tujuan->id ? 'selected' : '' }}>
                                    {{ $tujuan->nama_tujuan }}</option>
                                @endforeach
                            </select>
                        </div>
                        

                        <!-- Tanggal -->
                        <div class="mt-4">
                            <label for="tanggal"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal"
                                value="{{ old('tanggal', $sppd->tanggal) }}"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required>
                        </div>

                        <!-- Keperluan -->
                        <div class="mt-4">
                            <label for="keperluan"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Keperluan</label>
                            <textarea name="keperluan" id="keperluan"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required>{{ old('keperluan', $sppd->keperluan) }}</textarea>
                        </div>

                        <!-- Pegawai -->
                        <div class="mt-4">
                            <label for="pegawai_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilih Pegawai</label>
                            <select name="pegawai_id[]" id="pegawai_id" class="form-control js-example-basic-multiple w-full"
                                multiple required>
                                <option value="" class="" disabled>Pilih Pegawai</option>
                                @foreach ($pegawais as $p)
                                    <option value="{{ $p->id }}"
                                        {{ in_array($p->id, $selectedPegawais) ? 'selected' : '' }}>
                                        {{ $p->nama_pegawai }}</option>
                                @endforeach
                            </select>
                            @error('pegawai_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- File Path -->
                        <div class="mt-4">
                            <label for="file_path"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">File</label>
                            <input type="file" name="file_path" id="file_path"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @if ($sppd->file_path)
                                <a href="{{ Storage::url($sppd->file_path) }}" target="_blank"
                                    class="text-blue-600 dark:text-blue-400">Lihat File Saat Ini</a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-4">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
                            <a href="{{ route('sppd.index') }}"
                                class="px-4 py-2 bg-gray-600 text-white rounded-lg">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2({
                    placeholder: "Pilih Pegawai",
                    allowClear: true
                });
            });

            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
    @endpush
</x-app-layout>

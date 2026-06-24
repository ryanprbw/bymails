<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="p-4 sm:ml-64">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Standar Operasional Prosedur (SOP)') }}

            @if (session('success'))
                <div
                    class="p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800">
                    {{ session('success') }}
                </div>
            @endif
        </h2>

        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <div class="flex justify-between items-center mb-4">

                <a href="{{ route('sops.create') }}"
                    class="animate-bounce text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Tambah SOP
                </a>

                <form method="GET" action="{{ route('sops.index') }}" class="flex items-center">
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="px-4 py-2 border rounded-lg" placeholder="Cari SOP...">

                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-lg">
                        Cari
                    </button>
                </form>

            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Nomor SOP</th>
                            <th class="px-6 py-3">Nama SOP</th>
                            <th class="px-6 py-3">Bidang</th>
                            <th class="px-6 py-3">Tanggal Penetapan</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">File</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($sops as $sop)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                <td class="px-6 py-4">
                                    {{ $sop->nomor_urut }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $sop->nomor_sop }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $sop->nama_sop }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $sop->bidang }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($sop->tanggal_penetapan)->format('d-m-Y') }}
                                </td>

                                <td class="px-6 py-4">

                                    @if ($sop->status == 'Aktif')
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                            Tidak Aktif
                                        </span>
                                    @endif

                                </td>

                                <td class="px-6 py-4">

                                    @if ($sop->file_path)
                                        <a href="{{ asset('storage/' . $sop->file_path) }}" target="_blank"
                                            class="text-blue-600 hover:underline">
                                            Lihat PDF
                                        </a>
                                    @else
                                        -
                                    @endif

                                </td>

                                <td class="px-6 py-4">

                                    <a href="{{ route('sops.show', $sop->id) }}"
                                        class="text-blue-600 hover:text-blue-900">
                                        Show
                                    </a>

                                    <a href="{{ route('sops.edit', $sop->id) }}"
                                        class="ml-2 text-yellow-600 hover:text-yellow-900">
                                        Edit
                                    </a>

                                    <form action="{{ route('sops.destroy', $sop->id) }}" method="POST" class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus SOP ini?')"
                                            class="ml-2 text-red-600 hover:text-red-900">
                                            Hapus
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center">
                                    Data SOP masih kosong
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

                <div class="mt-4">
                    {{ $sops->links() }}
                </div>

            </div>

        </div>
    </div>

</x-app-layout>
```

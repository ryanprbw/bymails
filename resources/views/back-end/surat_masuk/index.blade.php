<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="p-4 sm:ml-64">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Surat Masuk') }}
            @if (session('success'))
                <div id="alert-additional-content-3"
                    class="p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                    role="alert">
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium">{{ session('success') }}</h3>
                    </div>

                    <div class="flex">

                        <button type="button"
                            class="text-green-800 bg-transparent border border-green-800 hover:bg-green-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-green-600 dark:border-green-600 dark:text-green-400 dark:hover:text-white dark:focus:ring-green-800"
                            data-dismiss-target="#alert-additional-content-3" aria-label="Close">
                            Oke
                        </button>
                    </div>
                </div>
            @endif
        </h2>
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('surat_masuk.create') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 animate-pulse hover:animate-bounce">
                    Tambah Surat Masuk
                </a>

                <form method="GET" action="{{ route('surat_masuk.index') }}" class="flex items-center">
                    <input type="text" name="search"
                        class="px-4 py-2 border rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300"
                        placeholder="Cari...">
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-lg">Cari</button>
                </form>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nomor Urut
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nomor Berkas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat Pengirim
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal
                            </th>
                            
                            <th scope="col" class="px-6 py-3">
                                Perihal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($suratMasuks as $surat_masuk)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">{{ $surat_masuk->nomor_urut }}</td>
                                <td class="px-6 py-4">{{ $surat_masuk->nomor_berkas }}</td>
                                <td class="px-6 py-4">{{ $surat_masuk->alamat_pengirim }}</td>
                                <td class="px-6 py-4">{{ $surat_masuk->tanggal }}</td>
                                {{-- <td class="px-6 py-4">{{ $surat_masuk->nomor }}</td> --}}
                                
                                <td class="px-6 py-4">{{ $surat_masuk->perihal }}</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('surat_masuk.show', $surat_masuk->id) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-600">Show</a>
                                    @if ($role === 'admin')
                                        <!-- Hanya tampilkan tautan edit dan hapus jika pengguna adalah admin -->
                                        <a href="{{ route('surat_masuk.edit', $surat_masuk->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <form action="{{ route('surat_masuk.destroy', $surat_masuk->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                                
                                
                            </tr>
                        @empty
                        <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Data Masih Kosong</span> Silahkan tambahkan surat.
                        </div>
                    </div>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $suratMasuks->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="p-4 sm:ml-64">

        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __('Selamat Datang yang Mulia . . .') }}
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            Pedoman
                        </h3>

                        <div class="flex gap-3 mb-4">
                            <select id="pdfSelector"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                                <option value="">-- Pilih Pedoman --</option>

                                <option value="{{ asset('pdf/permendagri83-2022.pdf') }}">
                                    Pedoman Penomoran Surat Permendagri Nomor 83 Tahun 2022
                                </option>

                                <option value="{{ asset('pdf/perbub-tata-naskah-2024.pdf') }}">
                                    Perbub Kab. Tapin Tata Naskah Dinas Nomor 17 Tahun 2024
                                </option>

                            </select>

                            <button type="button" onclick="loadPdf()"
                                class="animate-bounce px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                Lihat Pedoman
                            </button>
                        </div>

                        <div id="pdfContainer" style="display:none;">
                            <iframe id="pdfViewer" width="100%" height="900px" class="rounded-lg border">
                            </iframe>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function loadPdf() {
            let pdf = document.getElementById('pdfSelector').value;

            if (pdf) {
                document.getElementById('pdfViewer').src = pdf;
                document.getElementById('pdfContainer').style.display = 'block';
            } else {
                alert('Silakan pilih pedoman terlebih dahulu.');
            }
        }
    </script>
</x-app-layout>

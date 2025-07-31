<x-layouts.app :title="__('Dashboard')">
    <!-- hedaer -->
    <div id="dashboardContent" class="max-w-3xl mx-auto mt-16 p-6 ">
        <h1 class="text-3xl font-bold text-center ">
            Selamat Datang di Dashboard !
        </h1>

        <h2 class="text-lg text-center text-blue-500 mb-6 mt-2">
            Inventaris Barang Elektronik Laboratorium
        </h2>

        <h3 id="greetingText"
            class="text-xl text-center  font-semibold mb-4 opacity-0 translate-x-10 transition-all duration-1000">
            Selamat {{ waktu() }}, {{ auth()->user()->name }} Semoga harimu menyenangkan!
        </h3>

        <p class="text-center text-blue-300 mb-4">
            Di sini Anda dapat mengelola data barang elektronik dengan mudah dan efisien.
        </p>
    </div>

    <div id="CardContent" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mt-10">
        <div class="bg-white shadow-md rounded-lg p-4 border border-gray-100 text-center">
            <h4 class="text-lg text-gray-500 mb-5">Total Barang</h4>
            <p class="text-2xl font-bold text-blue-600 mb-5">
                {{ $totalBarang }}
            </p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4 border border-gray-100 text-center">
            <h4 class="text-lg text-gray-500 mb-5">Kategori</h4>
            <p class="text-2xl font-bold text-green-600 mb-5">
                {{ $totalKategori }}
            </p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4 border border-gray-100 text-center">
            <h4 class="text-lg text-gray-500 mb-5">Kondisi Baik</h4>
            <p class="text-2xl font-bold text-teal-600 mb-5">
                {{ $totalKondisiBaik }}
            </p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4 border border-gray-100 text-center">
            <h4 class="text-lg text-gray-500 mb-5">Rusak Ringan</h4>
            <p class="text-2xl font-bold text-red-300 mb-5">
                {{ $totalKondisiRusakRingan }}
            </p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4 border border-gray-100 text-center">
            <h4 class="text-lg text-gray-500 mb-5">Rusak Berat</h4>
            <p class="text-2xl font-bold text-red-600 mb-5">
                {{ $totalKondisiRusakBerat }}
            </p>
        </div>
    </div>

    <div id="ButtonContent" class="flex justify-center mt-20 gap-4">
        <button href="{{ route('inventaris.create') }}"
            class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition-transform transform hover:scale-105 active:scale-95">
            Tambah Barang
        </button>
        <button onclick="showLoaderAndLoadInventaris()"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition-transform transform hover:scale-105 active:scale-95">
            Lihat Data Inventaris
        </button>
    </div>

    <!-- ui loader -->
    <div id="loaderSection" class="hidden flex flex-col items-center justify-center h-screen">
        <div class="loader mb-4"></div>
        <p>Harap tunggu...</p>
    </div>

    <script>
        function showLoaderAndLoadInventaris() {
            // Sembunyikan dashboard
            document.getElementById('dashboardContent').classList.add('hidden');

            // Sembunyikan card content
            document.getElementById('CardContent').classList.add('hidden');

            // Sembunyikan button content
            document.getElementById('ButtonContent').classList.add('hidden');

            // Tampilkan loader
            document.getElementById('loaderSection').classList.remove('hidden');

            // Setelah delay 2 detik, tampilkan konten inventaris
            setTimeout(() => {
                document.getElementById('loaderSection').classList.add('hidden');
                window.location.href = "/inventaris";
            }, 3000);
        }

        window.addEventListener('DOMContentLoaded', () => {
            const el = document.getElementById('greetingText');
            el.classList.remove('opacity-0', 'translate-x-10');
        });
    </script>

    <style>
        /* Loader animation */
        .loader {
            width: 80px;
            aspect-ratio: 1;
            display: grid;
            -webkit-mask: conic-gradient(from 15deg, #0000, #000);
            animation: l26 1s infinite steps(12);
        }

        .loader,
        .loader:before,
        .loader:after {
            background:
                radial-gradient(closest-side at 50% 12.5%, #ffffffff 96%, #0000) 50% 0/20% 80% repeat-y,
                radial-gradient(closest-side at 12.5% 50%, #dad5d5ff 96%, #0000) 0 50%/80% 20% repeat-x;
        }

        .loader:before,
        .loader:after {
            content: "";
            grid-area: 1/1;
            transform: rotate(30deg);
        }

        .loader:after {
            transform: rotate(60deg);
        }

        @keyframes l26 {
            100% {
                transform: rotate(1turn)
            }
        }
    </style>

</x-layouts.app>
@php
function waktu() {
$hour = now()->format('H');
if ($hour >= 5 && $hour < 12) return 'Pagi' ;
        elseif ($hour>= 12 && $hour < 15) return 'Siang' ;
        elseif ($hour>= 15 && $hour < 18) return 'Sore' ;
        else return 'malam'
    ;}
@endphp
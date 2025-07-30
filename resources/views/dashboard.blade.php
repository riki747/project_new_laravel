<x-layouts.app :title="__('Dashboard')">
    <!-- hedaer -->
    <div id="dashboardContent">
        <h1 class="text-2xl font-bold text-center mt-10">
            Selamat datang di Dashboard Inventaris Barang Elektronik Laboratorium
        </h1>
        <h3 id="greetingText" class="text-xl text-center mt-4 opacity-0 translate-x-10 transition-all duration-1000">
            selamat {{ waktu() }} {{ auth()->user()->name }} semoga harimu menyenangkan!
        </h3>
        <p class="text-center mt-4">
            Di sini Anda dapat mengelola data barang elektronik dengan mudah dan efisien.
        </p>
        <div class="mt-8 flex justify-center">
            <!-- Tombol untuk mulai -->
            <button onclick="showLoaderAndLoadInventaris()">Lihat Data Inventaris</button>
        </div>
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

            // Tampilkan loader
            document.getElementById('loaderSection').classList.remove('hidden');

            // Setelah delay 2 detik, tampilkan konten inventaris
            setTimeout(() => {
                document.getElementById('loaderSection').classList.add('hidden');
                window.location.href = "/inventaris";
            }, 4000);
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
    if ($hour >= 5 && $hour < 12) return 'pagi' ;
        elseif ($hour>= 12 && $hour < 15) return 'siang' ;
        elseif ($hour>= 15 && $hour < 18) return 'sore' ;
        else return 'malam' 
    ;}
@endphp
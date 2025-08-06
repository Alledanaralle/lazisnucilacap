<nav class="sticky top-0 z-30 p-4 bg-white shadow-2xl md:hidden">
    <div class="container flex items-center justify-between px-4 mx-auto">
        <!-- Logo -->
        <a href="/" class="flex-shrink-0">
            <img src="{{ asset('images/cooler_logo_lazisnu.png') }}" alt="Logo" class="w-auto h-8">
        </a>

        <!-- User Menu Button -->
        <button id="user-menu-btn" class="relative flex items-center p-2 text-black rounded-full">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>

    </div>
</nav>

<!-- User Menu Pop-up -->
<div>
    <div id="user-menu"
        class="fixed inset-y-0 right-0 z-30 hidden w-48 px-4 py-2 bg-white rounded-lg shadow-lg top-12">
        <div class="flex flex-col">
            <x-navlink title="Lazisnu Cilacap" :links="[
                ['href' => '/profil&jajaran', 'text' => 'Profil & Jajaran Pengurus'],
                ['href' => '/sejarah', 'text' => 'Sejarah'],
                ['href' => '/legalitas', 'text' => 'Legalitas'],
                ['href' => '/kebijakan', 'text' => 'Standar Layanan (MANTAP)'],
                ['href' => '#', 'text' => 'Laporan & Publikasi'],
                ['href' => '/mitra', 'text' => 'Mitra'],
            ]" isDropdown="true" />
            <x-navlink title="Pilar & Program" :links="[
                    <?php
                        $pilars = pilar_program::all();
                    ?>
                        @foreach ($pilars as $items)
                            ['href' => '/pilar/' . $items->slug, 'text' => $items->name . $items->kategori->nama],
                        @endforeach
                    // ['href' => '/berdaya', 'text' => 'NU Care Berdaya (Ekonomi)'],
                    // ['href' => '/cerdas', 'text' => 'NU Care Cerdas (Pendidikan)'],
                    // ['href' => '/sehat', 'text' => 'NU Care Sehat (Kesehatan)'],
                    // ['href' => '/damai', 'text' => 'NU Care Damai (Dakwah & Kemanusiaan)'],
                    // ['href' => 'hijau', 'text' => 'NU Care Hijau (Lingkungan Hidup & Kebencanaan)'],
                ]" isDropdown="true" />

            <x-navlink title="Layanan" :links="[
                ['href' => '/konfirmasi', 'text' => 'Konfirmasi Donasi'],
                ['href' => '/pengajuan', 'text' => 'Pengajuan Umum'],
                ['href' => '/pengajuan-mobiznu', 'text' => 'Layanan Mobisnu'],
                ['href' => '/pengajuan-gocap', 'text' => 'Gocap'],
            ]" isDropdown="true" />

            <x-navlink title="Ziswaf" :links="[
                ['href' => '/narasi/fitrah', 'text' => 'Zakat Fitrah'],
                ['href' => '/narasi/maal', 'text' => 'Zakat Maal'],
                ['href' => '/narasi/infaq', 'text' => 'Infaq'],
                ['href' => '/narasi/wakaf', 'text' => 'Wakaf'],
                ['href' => '/narasi/fidyah', 'text' => 'Fidyah'],
                ['href' => '/narasi/qurban', 'text' => 'Qurban'],
            ]" isDropdown="true" />

            <x-navlink title="Campaign" url="/campaigns" />
            <x-navlink title="Berita" url="/berita" />

            @if (Auth::check())
                @if (Auth::user()->role == 'admin')
                    <a href="/admin"
                        class="px-6 py-2 text-white bg-green-600 border rounded-xl hover:border-green-600 hover:bg-white hover:text-green-600">
                        Admin
                    </a>
                @elseif (Auth::user()->role == 'donatur')
                    <a href="#"
                        class="px-6 py-2 text-white bg-green-600 border rounded-xl hover:border-green-600 hover:bg-white hover:text-green-600">
                        prfil
                    </a>
                @endif
            @else
                <a href="/login"
                    class="z-30 px-6 py-2 text-white bg-green-600 border rounded-xl hover:border-green-600 hover:bg-white hover:text-green-600">
                    Login
                </a>
            @endif
            <a href="/daftar"
                class="px-6 py-2 text-green-600 border border-green-600 rounded-xl hover:bg-green-600 hover:text-white">Daftar</a>

        </div>
    </div>

    <!-- Sidebar -->
    <div id="sidebar"
        class="fixed inset-0 right-0 z-30 w-2/4 transition-transform transform -translate-x-full bg-white md:sticky md:top-0 md:w-full md:translate-x-0 md:flex md:items-center md:justify-between md:bg-transparent md:shadow-none md:p-0">
        <!-- Main Content -->
        <div
            class="sticky top-0 right-0 flex flex-col items-center w-full px-8 py-4 space-y-4 bg-white md:flex-row md:justify-between md:space-y-0">
            <!-- Logo -->
            <a href="/" class="flex-shrink-0">
                <img src="{{ asset('images/cooler_logo_lazisnu.png') }}" alt="Logo"
                    class="hidden w-auto h-8 md:block">
            </a>

            <!-- Navigation Links and Buttons -->
            <div class="flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0 md:ml-auto">
                <x-navlink title="Lazisnu Cilacap" :links="[
                    ['href' => '/profil&jajaran', 'text' => 'Profil & Jajaran Pengurus'],
                    ['href' => '/sejarah', 'text' => 'Sejarah'],
                    ['href' => '/legalitas', 'text' => 'Legalitas'],
                    ['href' => '/kebijakan', 'text' => 'Standar Layanan (MANTAP)'],
                    ['href' => '#', 'text' => 'Laporan & Publikasi'],
                    ['href' => '/mitra', 'text' => 'Mitra'],
                ]" isDropdown="true" />

                <x-navlink title="Pilar & Program" :links="[
                    <?php
                        $pilars = pilar_program::all();
                    ?>
                        @foreach ($pilars as $items)
                            ['href' => '/pilar/' . $items->slug, 'text' => $items->name . $items->kategori->nama],
                        @endforeach
                    // ['href' => '/berdaya', 'text' => 'NU Care Berdaya (Ekonomi)'],
                    // ['href' => '/cerdas', 'text' => 'NU Care Cerdas (Pendidikan)'],
                    // ['href' => '/sehat', 'text' => 'NU Care Sehat (Kesehatan)'],
                    // ['href' => '/damai', 'text' => 'NU Care Damai (Dakwah & Kemanusiaan)'],
                    // ['href' => 'hijau', 'text' => 'NU Care Hijau (Lingkungan Hidup & Kebencanaan)'],
                ]" isDropdown="true" />

                <x-navlink title="Layanan" :links="[
                    ['href' => '/konfirmasi', 'text' => 'Konfirmasi Donasi'],
                    ['href' => '/pengajuan', 'text' => 'Pengajuan Umum'],
                    ['href' => '/pengajuan-mobiznu', 'text' => 'Layanan Mobisnu'],
                    ['href' => '/pengajuan-gocap', 'text' => 'Gocap'],
                ]" isDropdown="true" />

                <x-navlink title="Ziswaf" url="/zakat" />

                <x-navlink title="Campaign" url="/campaigns" />
                <x-navlink title="Berita" url="/berita" />

                @if (Auth::check())
                    @if (Auth::user()->role == 'admin')
                        <a href="/admin"
                            class="px-6 py-2 text-white bg-green-600 border rounded-xl hover:border-green-600 hover:bg-white hover:text-green-600">
                            Admin
                        </a>
                    @elseif (Auth::user()->role == 'donatur')
                        <a href="#"
                            class="px-6 py-2 text-white bg-green-600 border rounded-xl hover:border-green-600 hover:bg-white hover:text-green-600">
                            profl
                        </a>
                    @endif
                @else
                    <a href="/login"
                        class="z-30 px-6 py-2 text-white bg-green-600 border rounded-xl hover:border-green-600 hover:bg-white hover:text-green-600">
                        Login
                    </a>
                @endif
                <a href="/daftar"
                    class="px-6 py-2 text-green-600 border border-green-600 rounded-xl hover:bg-green-600 hover:text-white">Daftar</a>

                <!-- Close Button -->
                <div class="absolute top-4 right-4">
                    <button id="close-btn" class="text-gray-500 hover:text-black md:hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        // Toggle User Menu visibility
        document.getElementById('user-menu-btn').addEventListener('click', function() {
            const userMenu = document.getElementById('user-menu');
            userMenu.classList.toggle('hidden');
        });

        // Close User Menu when clicking outside
        document.addEventListener('click', function(event) {
            const userMenu = document.getElementById('user-menu');
            const userMenuBtn = document.getElementById('user-menu-btn');
            if(userMenu){
                if (userMenuBtn.contains(event.target) == null  && userMenu.contains(event.target) == null) {
                    userMenu.classList.add('hidden');
                }
            }
            if(userMenuBtn){
                if (userMenuBtn.contains(event.target) == null  && userMenu.contains(event.target) == null) {
                    userMenu.classList.add('hidden');
                }
            }
        });
    </script>

<div>
    <div id="user-menu" class="fixed inset-y-0 right-0 z-30 hidden w-48 px-8 py-2 bg-white rounded-lg shadow-lg top-12">
        <div class="flex flex-col">
            
             @if (Auth::check())
                @if (Auth::user()->role == 'admin')
                        <a href="/admin"
                            class="flex items-center justify-center mt-4 text-white bg-green-600 border rounded-xl hover:border-green-600 hover:bg-white hover:text-green-600">
                            <span class="flex items-center px-6 py-2 group">
                                <svg class="w-8 h-8 mr-2 text-white group-hover:text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                                <?php $a = auth::user()->username; echo $a; ?>
                            </span>
                        </a>
                @elseif (Auth::user()->role == 'donatur')
                        <a href="/profile"
                            class="flex items-center justify-center mt-4 text-white bg-green-600 border rounded-xl hover:border-green-600 hover:bg-white hover:text-green-600">
                            <span class="flex items-center px-6 py-2 group">
                                <svg class="w-8 h-8 mr-2 text-white group-hover:text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                                <?php $a = auth::user()->username; echo $a; ?>
                            </span>
                        </a>
                @endif
            @else
                <a href="/login"
                    class="z-30 px-6 py-2 text-center text-white bg-green-600 border rounded-xl hover:border-green-600 hover:bg-white hover:text-green-600">
                    Login
                </a>
                <a href="/daftar"
                    class="px-6 py-2 mt-2 text-center text-green-600 border border-green-600 rounded-xl hover:bg-green-600 hover:text-white">
                    Daftar
                </a>

            @endif

            <livewire:navbar.navlink wire:key={{ rand() }} title="Tentang Kami" :links="[
                ['href' => '/profil&jajaran', 'text' => 'Profil & Jajaran Pengurus'],
                ['href' => '/sejarah', 'text' => 'Sejarah'],
                ['href' => '/legalitas', 'text' => 'Legalitas'],
                ['href' => '/kebijakan', 'text' => 'Kebijakan mutu (MANTAP)'],
                ['href' => '/laporan', 'text' => 'Laporan & Publikasi'],
                ['href' => '/mitra', 'text' => 'Mitra'],
            ]"
                isDropdown="true" />

                <livewire:navbar.navlink wire:key="{{ rand() }}" title="Pilar & Program" :links="$pilarLinks"
                isDropdown="true" />


            <livewire:navbar.navlink wire:key={{ rand() }} title="Layanan" :links="[
                ['href' => '/konfirmasi', 'text' => 'Konfirmasi Donasi'],
                ['href' => '/pengajuan', 'text' => 'Pengajuan Umum'],
                ['href' => '/pengajuan-mobiznu', 'text' => 'Layanan Mobisnu'],
                ['href' => '/pengajuan-gocap', 'text' => 'Gocap'],
            ]" isDropdown="true" />

            <livewire:navbar.navlink wire:key={{ rand() }} title="Ziswaf" :links="[
                ['href' => '/narasi/fitrah', 'text' => 'Zakat Fitrah'],
                ['href' => '/narasi/maal', 'text' => 'Zakat Maal'],
                ['href' => '/narasi/infaq', 'text' => 'Infaq'],
                ['href' => '/narasi/wakaf', 'text' => 'Wakaf'],
                ['href' => '/narasi/fidyah', 'text' => 'Fidyah'],
                ['href' => '/narasi/qurban', 'text' => 'Qurban'],
            ]" isDropdown="true" />

            <livewire:navbar.navlink isDropdown="false" wire:key={{ rand() }} title="Campaign"
                url="/campaigns" />
            <livewire:navbar.navlink isDropdown="false" wire:key={{ rand() }} title="Berita" url="/berita" />
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
                <img src="images%2Fcooler_logo_lazisnu.png" alt="ogo"
                    class="hidden w-auto h-8 md:block">
            </a>

            <!-- Navigation Links and Buttons -->
            <div class="flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0 md:ml-auto">
                <livewire:navbar.navlink wire:key={{ rand() }} title="Tentang Kami" :links="[
                    ['href' => '/profil&jajaran', 'text' => 'Profil & Jajaran Pengurus'],
                    ['href' => '/sejarah', 'text' => 'Sejarah'],
                    ['href' => '/legalitas', 'text' => 'Legalitas'],
                    ['href' => '/kebijakan', 'text' => 'Kebijakan mutu (MANTAP)'],
                    ['href' => '/laporan', 'text' => 'Laporan & Publikasi'],
                    ['href' => '/mitra', 'text' => 'Mitra'],
                ]"
                    isDropdown="true" />

                <livewire:navbar.navlink wire:key="{{ rand() }}" title="Pilar & Program" :links="$pilarLinks"
                    isDropdown="true" />

                <livewire:navbar.navlink wire:key={{ rand() }} title="Layanan" :links="[
                    ['href' => '/konfirmasi', 'text' => 'Konfirmasi Donasi'],
                    ['href' => '/pengajuan', 'text' => 'Pengajuan Umum'],
                    ['href' => '/pengajuan-mobiznu', 'text' => 'Layanan Mobisnu'],
                    ['href' => '/pengajuan-gocap', 'text' => 'Gocap'],
                ]"
                    isDropdown="true" />

                <livewire:navbar.navlink wire:key={{ rand() }} title="Ziswaf" :links="[
                    ['href' => '/narasi/fitrah', 'text' => 'Zakat Fitrah'],
                    ['href' => '/narasi/maal', 'text' => 'Zakat Maal'],
                    ['href' => '/narasi/infaq', 'text' => 'Infaq'],
                    ['href' => '/narasi/wakaf', 'text' => 'wakaf'],
                    ['href' => '/narasi/fidyah', 'text' => 'Fidyah'],
                    ['href' => '/narasi/qurban', 'text' => 'Qurban'],
                ]"
                    isDropdown="true" />

                <livewire:navbar.navlink isDropdown="false" wire:key={{ rand() }} title="Campaign"
                    url="/campaigns" />
                <livewire:navbar.navlink isDropdown="false" wire:key={{ rand() }} title="Berita"
                    url="/berita" />

                @if (Auth::check())
                    @if (Auth::user()->role == 'admin')
                        <a href="/admin"
                            class="flex items-center justify-center text-white bg-green-600 border rounded-xl hover:border-green-600 hover:bg-white hover:text-green-600">
                            <span class="flex items-center px-6 py-2 group">
                                <svg class="w-8 h-8 mr-2 text-white group-hover:text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                                <?php $a = auth::user()->username; echo $a; ?>
                            </span>
                        </a>
                    @elseif (Auth::user()->role == 'donatur')
                        <a href="/profile"
                            class="flex items-center justify-center text-white bg-green-600 border rounded-xl hover:border-green-600 hover:bg-white hover:text-green-600">
                            <span class="flex items-center px-6 py-2 group">
                                <svg class="w-8 h-8 mr-2 text-white group-hover:text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                                <?php $a = auth::user()->username; echo $a; ?>
                            </span>
                        </a>
                    @endif
                @else
                    <a href="/login"
                        class="z-30 px-6 py-2 text-white bg-green-600 border rounded-xl hover:border-green-600 hover:bg-white hover:text-green-600">
                        Login
                    </a>
                    <a href="/daftar"
                        class="px-6 py-2 text-green-600 border border-green-600 rounded-xl hover:bg-green-600 hover:text-white">Daftar</a>
                @endif

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

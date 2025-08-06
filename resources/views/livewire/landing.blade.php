<div>
    {{-- <x-navbar></x-navbar> --}}
    <livewire:navbar.index />
    <livewire:navbar.usermenu />
    <div class="relative flex items-center justify-center mt-1">
        <div class="relative z-0 w-full bg-white">
            <div x-data="{
                offset: 0,
                logoWidth: 100, // Lebar setiap logo dalam %
                visibleLogos: 1, // Menampilkan 5 logo sekaligus
                logoCount: {{ $landings ? $landings->count() : 0 }},
                slideWidth: 100, // Menggeser sesuai dengan lebar satu logo
                slideInterval: 3000, // Waktu dalam milidetik untuk setiap slide
                interval: null,
                load: false,
                updateSlideWidth() {
                    if (window.innerWidth < 768) {
                        this.slideWidth = 100; // Untuk layar kecil
                    } else {
                        this.slideWidth = 100; // Untuk layar besar
                    }
                },
                startAutoSlide() {
                    this.interval = setInterval(() => {
                        if (this.offset < (this.logoCount - this.visibleLogos) * this.slideWidth) {
                            this.offset += this.slideWidth;
                        } else {
                            this.offset = 0; // Kembali ke awal
                        }
                    }, this.slideInterval);
                },
                stopAutoSlide() {
                    clearInterval(this.interval);
                },
                next() {
                    if (this.offset < (this.logoCount - this.visibleLogos) * this.slideWidth) {
                        this.offset += this.slideWidth;
                    }
                },
                prev() {
                    if (this.offset > 0) {
                        this.offset -= this.slideWidth;
                    }
                }
            }"
            x-init="updateSlideWidth();
                    load = true;
                    startAutoSlide();
                    window.addEventListener('resize', updateSlideWidth);"
            x-show="load"
            wire:init="loadMitra"
            class="relative w-full overflow-x-auto scrollbar-hide">
                <!-- Tombol navigasi -->
                <button @click="prev" 
                    class="absolute left-0 z-10 hidden p-2 text-white -translate-y-1/2 bg-gray-800 rounded-full shadow-lg md:block top-1/2 hover:bg-gray-600">
                    &#10094;
                </button>
                <button @click="next" 
                    class="absolute right-0 z-10 hidden p-2 text-white -translate-y-1/2 bg-gray-800 rounded-full shadow-lg md:block top-1/2 hover:bg-gray-600">
                    &#10095;
                </button>

                <!-- Kontainer Carousel -->
                <div class="flex w-full transition-transform duration-500"
                    :style="'transform: translateX(-' + offset + '%)'">
                    @foreach ($landings as $landing)
                        @if ($landing->link == '-')
                            <a class="h-auto min-w-full">
                                <img src="{{ asset('storage/' . $landing->gambar) }}" alt="Picture"
                                    class="h-auto min-w-full" style="aspect-ratio: 16/6;" />
                            </a>
                        @else
                            <a href="{{ $landing->link }}" class="h-auto min-w-full">
                                <img src="{{ asset('storage/' . $landing->gambar) }}" alt="Picture"
                                    class="h-auto min-w-full" style="aspect-ratio: 16/6;" />
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="relative flex justify-center w-full -mt-6 z-12">
        <div class="flex justify-center space-x-2 md:space-x-4 md:-mt-14">
            <!-- Item 1 -->
            <a
                href="https://wa.me/{{ $petugas->no }}?text={{ urlencode('Assalamualaikum, saya ingin berkonsultasi mengenai zakat') }}">
                <div
                    class="flex flex-col items-center w-20 p-4 bg-white rounded-lg shadow-2xl sm:w-36 sm:h-36 md:w-48 md:h-44 h-[110px] border">
                    <div class="p-4 bg-green-500 rounded-full">
                        <img src="{{ asset('images/konsultasi.png') }}" alt="Image 1"
                            class="w-6 h-4 md:p-1 sm:w-8 sm:h-8 md:w-16 md:h-16 lg:w-16 lg:h-16">
                    </div>
                    <p class="text-[10px] mt-2 md:text-lg font-medium text-center text-gray-800">Konsultasi Zakat</p>
                </div>
            </a>

            <!-- Item 2 -->
            <a href="/zakat">
                <div
                    class="flex flex-col items-center w-20 p-4 bg-white rounded-lg shadow-2xl sm:w-36 sm:h-36 md:w-48 md:h-44 h-[110px] border">
                    <div class="px-4 py-4 bg-green-500 rounded-full">
                        <img src="{{ asset('images/kalkulator.png') }}" alt="Image 2"
                            class="w-6 h-4 md:p-1 sm:w-8 sm:h-8 md:w-16 md:h-16 lg:w-16 lg:h-16">
                    </div>
                    <p class="text-[10px] mt-2 md:text-lg font-medium text-center text-gray-800">Kalkulator Zakat</p>
                </div>
            </a>

            <!-- Item 3 -->
            <a href="/rekening">
                <div
                    class="flex flex-col items-center w-20 p-4 bg-white rounded-lg shadow-2xl sm:w-36 sm:h-36 md:w-48 md:h-44 h-[110px] border">
                    <div class="px-4 py-4 bg-green-500 rounded-full">
                        <img src="{{ asset('images/rekening.png') }}" alt="Image 3"
                            class="w-6 h-4 md:p-1 sm:w-8 sm:h-8 md:w-16 md:h-16 lg:w-16 lg:h-16">
                    </div>
                    <p class="text-[10px] mt-2 md:text-lg font-medium text-center text-gray-800">Rekening Donasi</p>
                </div>
            </a>

            <!-- Item 4 -->
            <a href="/qr_donasi">
                <div class="flex flex-col items-center w-20 p-4 bg-white rounded-lg shadow-2xl sm:w-36 sm:h-36 md:w-48 md:h-44 h-[110px] border">
                    <div class="px-4 py-4 bg-green-500 rounded-full">
                        <img src="{{ asset('images/qr.png') }}" alt="Image 4"
                            class="w-6 h-4 md:p-1 sm:w-8 sm:h-8 md:w-16 md:h-16 lg:w-16 lg:h-16">
                    </div>
                    <p class="text-[10px] mt-2 md:text-lg font-medium text-center text-gray-800">QRIS Donasi</p>
                </div>
            </a>
        </div>
    </div>


    {{-- visi misi  --}}
    <div class="mx-auto max-w-[1420px] flex flex-col justify-between px-4 mt-8 md:px-8 lg:px-16 xl:px-24"
        x-data="{ load: false, showModal: false }" x-init="load = true;
        showModal = true" x-show="load" wire:init.defer="loadVisiMisi">
        <!-- Main content -->
        <div id="details-container" class="relative max-h-[325px] overflow-hidden transition-all duration-300">
            <p
                class="mt-4 ml-4 text-[14px] md:text-[16px] font-semibold text-green-500 flex justify-center items-center">
                Sekilas NU-Care LAZISNU Cilacap
            </p>
            <div id="details-content" class="w-full px-4 py-4 md:px-5">
                <h2 class="w-full font-semibold text-left text-green-500">Visi</h2>
                @if (!empty($visis))
                    @foreach ($visis as $visi)
                        <p class="text-sm md:text-base" wire:key="misi-{{ $visi->id_visi }}">
                            {!! nl2br(e($visi->visi)) !!}
                        </p>
                    @endforeach
                @else
                    <div class="w-full ">
                        <div class="flex-col justify-between w-auto mx-4 mt-4 space-y-2 md:mt-0">
                            <div class="w-full h-2 text-gray-400 bg-gray-400 rounded-sm md:w-full md:h-6 "></div>
                            <div class="w-full h-2 text-gray-400 bg-gray-400 rounded-sm md:w-full md:h-6 "></div>
                        </div>
                    </div>
                @endif

                <h2 class="w-full mt-4 font-semibold text-left text-green-500">Misi</h2>
                @if (!empty($misis))
                    @php $index = 1; @endphp
                    @foreach ($misis as $Misi)
                        <div class="flex mt-4" wire:key="misi-{{ $Misi->id_misi }}">
                            <h1 class="pr-2 text-sm">{{ $index }}.</h1>
                            <p class="text-sm">
                                {!! nl2br(e($Misi->misi)) !!}
                            </p>
                        </div>
                        @php $index++; @endphp
                    @endforeach
                @else
                    <div class="w-full ">
                        <div class="flex-col justify-between w-auto mx-4 mt-4 space-y-2 md:mt-0">
                            <div class="w-full h-2 text-gray-400 bg-gray-400 rounded-sm md:w-full md:h-6 "></div>
                            <div class="w-full h-2 text-gray-400 bg-gray-400 rounded-sm md:w-full md:h-6 "></div>
                            <div class="w-full h-2 text-gray-400 bg-gray-400 rounded-sm md:w-full md:h-6 "></div>
                            <div class="w-full h-2 text-gray-400 bg-gray-400 rounded-sm md:w-full md:h-6 "></div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Modal Button -->
            <a id="details-expand-link"
                class="absolute bottom-0 left-0 w-full px-3 pt-4 text-left bg-gradient-to-t from-white via-white to-transparent">
                <div x-show="showModal" x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
                    <!-- Button to open the modal -->
                    <span @click="isOpen=true" class="text-green-500 cursor-pointer hover:underline">Baca
                        Selengkapnya...</span>
                    @if (!empty($visis) || !empty($misis))
                        <!-- Modal Background -->
                        <div x-show="isOpen"
                            class="fixed inset-0 z-50 flex items-center justify-center bg-gray-600 bg-opacity-75">
                            <!-- Modal Content -->
                            <div class="w-[414px] md:w-[500px] md:mx-4 bg-white rounded-lg shadow-lg">
                                <div class="flex items-center justify-between p-4 bg-gray-200 rounded-t-lg">
                                    <h3 class="text-xl font-semibold text-green-500">Sekilas NU-Care LAZISNU Cilacap
                                    </h3>
                                    <div @click="isOpen=false" class="px-3 rounded-sm shadow hover:bg-red-500">
                                        <button class="text-gray-900">&times;</button>
                                    </div>
                                </div>

                                <div class="p-4 max-h-[500px] overflow-y-auto">
                                    <div class="flex flex-col items-start mt-4">
                                        <h2 class="w-full font-semibold text-left text-green-500">Visi</h2>
                                        @if (!empty($visis))
                                            @foreach ($visis as $visi)
                                                <p class="text-sm md:text-base" wire:key="misi-{{ $visi->id_visi }}">
                                                    {!! nl2br(e($visi->visi)) !!}
                                                </p>
                                            @endforeach
                                        @endif

                                        <h2 class="w-full mt-4 font-semibold text-left text-green-500">Misi</h2>
                                        @if (!empty($misis))
                                            @php $index = 1; @endphp
                                            @foreach ($misis as $Misi)
                                                <div class="flex mt-4" wire:key="misi-{{ $Misi->id_misi }}">
                                                    <h1 class="pr-2 text-sm">{{ $index }}.</h1>
                                                    <p class="text-sm">
                                                        {!! nl2br(e($Misi->misi)) !!}
                                                    </p>
                                                </div>
                                                @php $index++; @endphp
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </a>
        </div>
    </div>





    <!-- Campaign Section -->
    <div class="mx-auto max-w-[1420px] flex flex-col items-center py-10 mt-8 bg-white">
        <!-- Title -->
        <div class="flex items-center justify-between w-full mb-8">
            <div class="relative flex flex-col justify-between px-4 mr-6">
                <h2 class="font-semibold text-green-600 text-md md:text-lg">Campaign LAZISNU Cilacap</h2>
                <h2 class="text-xs text-black md:text-sm">Berikut merupakan campaign terbaru LAZISNU Cilacap</h2>
            </div>
            <div>
                <a href="{{ route('campaign') }}"
                    class="mr-4 overflow-hidden text-sm text-left text-green-500 md:hidden hover:text-green-600 hover:cursor-pointer whitespace-nowrap text-ellipsis">Selengkapnya
                    ></a>

                <a href="{{ route('campaign') }}"
                    class="relative hidden px-4 py-2 text-white bg-green-500 rounded-md md:block hover:bg-green-600">
                    Campaign Lainya
                </a>
            </div>
        </div>
        <div class="flex flex-col justify-center w-full px-4 pb-4 md:px-10 md:flex-row md:space-x-4 md:w-auto "
            x-data="{ load: false }" x-init="load = true" x-show="load" wire:init="loadCampaigns">
            @if ($campaigns && $campaigns->isEmpty())
            @elseif($campaigns)
                @foreach ($campaigns as $campaign)
                    <!-- Display this card on md: and larger -->
                    <div class="hidden md:block">
                        <x-campaign-card :campaign="$campaign" wire:key="md-{{ $campaign->id_campaign }}" />
                    </div>

                    <!-- Display this card below md: -->
                    <div class="block py-4 border-b md:hidden border-b-gray-300" >
                        <livewire:campaigns.card :campaign="$campaign" wire:key="sm-{{ $campaign->id_campaign }}" />
                    </div>
                @endforeach
            @else
                <div class="w-full ">
                    <div
                        class="flex flex-col justify-between w-full pb-4 space-y-4 md:flex-row md:flex md:space-y-0 md:shadow-lg md:space-x-4 md:w-auto ">
                        @for ($i = 0; $i < 3; $i++)
                            <div
                                class="flex flex-row md:flex-col md:space-y-4 animate-pulse bg-gray-200 h-28 w-full md:h-[500px] md:w-[410px] ">
                                <div class="w-2/5 h-full bg-gray-400 md:w-full md:h-80"></div>
                                <div class="flex flex-col w-3/5 space-y-2 md:space-y-4 md:w-full">
                                    <div
                                        class="w-auto h-4 mx-4 mt-4 text-gray-400 bg-gray-400 rounded-sm md:mt-1 md:w-auto md:h-6">
                                    </div>
                                    <div
                                        class="w-2/5 h-2 mx-4 mt-4 text-gray-400 bg-gray-400 rounded-sm md:w-1/2 md:h-2">
                                    </div>
                                    <div
                                        class="w-auto h-1 mx-4 mt-4 text-gray-400 bg-gray-400 rounded-lg md:w-auto md:h-2">
                                    </div>
                                    <div class="flex justify-between w-auto mx-4 mt-1 md:mt-0">
                                        <div class="w-1/4 h-2 text-gray-400 bg-gray-400 rounded-sm md:w-1/4 md:h-2 ">
                                        </div>
                                        <div class="w-1/4 h-2 text-gray-400 bg-gray-400 rounded-sm md:w-1/4 md:h-2 ">
                                        </div>
                                    </div>
                                    <div class="flex justify-between w-auto mx-4 mt-4">
                                        <div class="w-4/12 h-3 text-gray-400 bg-gray-400 rounded-sm md:w-4/12 md:h-4 ">
                                        </div>
                                        <div class="w-4/12 h-3 text-gray-400 bg-gray-400 rounded-sm md:w-4/12 md:h-4 ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endif

        </div>
    </div>

    <!-- Berita Section -->
    <div
        class="mx-auto max-w-[1420px] flex flex-col items-center w-full py-8 md:mt-[70px] bg-center bg-cover shadow-md bg-gray-50 bg-opacity-90">
        <!-- Title -->
        <div class="flex items-center justify-between w-full mb-8">
            <div class="relative flex flex-col justify-between px-4 mr-6">
                <h2 class="text-lg font-semibold text-green-600">Berita LAZISNU Cilacap</h2>
                <h2 class="text-sm text-black">Berikut merupakan berita terbaru LAZISNU Cilacap</h2>
            </div>
            <div>
                <a
                    class="mr-4 overflow-hidden text-sm text-left text-green-500 md:hidden hover:text-green-600 hover:cursor-pointer whitespace-nowrap text-ellipsis">Selengkapnya >
                </a>
                <button
                    class="relative hidden px-4 py-2 text-white bg-green-500 rounded-md md:block hover:bg-green-600">
                    <a href="{{ route('berita') }}">
                        Berita Lainya
                    </a>
                </button>
            </div>
        </div>

        <div class="flex flex-col justify-center w-full px-4 pb-4 md:px-10 md:flex-row md:space-x-6 md:w-auto md:flex-nowrap"
            x-data="{ load: false }" x-init="load = true" x-show="load" wire:init="loadBerita">
            @if ($beritas && $beritas->isEmpty())
                <!-- Handle empty state -->
            @elseif($beritas)
                @foreach ($beritas as $berita)
                    <div class="flex w-full py-4 border-b md:w-1/2 md:border-b-transparent border-b-gray-300">
                        <x-berita-card :berita="$berita" wire:key="{{ $berita->id_berita }}" />
                    </div>
                @endforeach
            @else
                <div class="w-full ">
                    <div
                        class="flex flex-col justify-between w-full pb-4 space-y-4 md:flex-row md:flex md:space-y-0 md:shadow-lg md:space-x-4 md:w-auto ">
                        @for ($i = 0; $i < 3; $i++)
                            <div
                                class="flex flex-row md:flex-col md:space-y-1 animate-pulse bg-gray-200 h-[180px] w-full md:h-[400px] md:w-[410px] ">
                                <div class="bg-gray-400 w-2/5 h-full md:w-full md:h-[300px]"></div>
                                <div class="flex flex-col w-3/5 space-y-2 md:space-y-4 md:w-full">
                                    <div
                                        class="w-auto h-5 mx-4 mt-4 text-gray-400 bg-gray-400 rounded-sm md:mt-2 md:w-auto md:h-4">
                                    </div>
                                    <div
                                        class="w-2/5 h-2 mx-4 mt-4 text-gray-400 bg-gray-400 rounded-sm md:mt-0 md:w-1/2 md:h-3">
                                    </div>
                                    <div
                                        class="w-auto h-1 mx-4 mt-4 text-gray-400 bg-gray-400 rounded-lg md:mt-0 md:w-1/2 md:h-3">
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endif

        </div>
    </div>

    <!-- Tentang Section -->
    {{-- <div class="flex flex-col items-center py-10 mt-4 bg-white shadow-lg">
        <!-- Container for items left -->
        <div class="flex items-start justify-between w-full h-auto max-w-4xl mx-20 space-x-20">
            <!-- Item 1 -->
            <div class="flex flex-col items-center flex-1 hidden md:block">
                <img src="{{ asset('images/tentang.png') }}" alt="Image 1" class="object-cover mb-4 w-128 h-128">
            </div>

            <!-- Item 2 -->
            <div class="flex flex-col items-start items-center flex-1 mb-4 -ml-8 text-justify md:ml-0">
                <div>
                    <p class="font-extrabold text-green-600 text-md md:text-xl">Sekilas NU Care-LAZISNU Cilacap</p>
                    <p class="mr-8 text-sm text-gray-700 md:text-md md:mr-0">
                        Terima kasih banyak kami ucapkan kepada para muzakki, munfiq, donatur atas semua zakat,
                        infaq,
                        sedekah atas donasinya yang telah diamanatkan melalui NU Care LAZISNU Cilacap.
                    </p>
                </div>
                <div class="flex flex-col justify-center w-full -ml-8 md:ml-0">
                    <p class="mt-4 mb-4 text-lg font-semibold text-center text-black">Terima kasih kepada Sejumlah</p>
                    <div class="flex flex-row justify-center">
                        <div class="relative flex flex-col items-center w-40 h-24 p-4 md:w-60 md:p-8">
                            <img src="{{ asset('images/tikum.png') }}" alt="Image 1"
                                class="relative w-8 h-8 mb-2 md:w-16 md:h-16">
                            <p class="relative text-xs font-semibold text-center text-green-600 md:text-md">41.124
                                muzakki<br>NU Care LAZISNU Cilacap</p>
                        </div>
                        <div class="relative flex flex-col items-center w-40 h-24 p-4 md:w-60 md:p-8">
                            <img src="{{ asset('images/tikum.png') }}" alt="Image 1"
                                class="relative w-8 h-8 mb-2 md:w-16 md:h-16">
                            <p class="relative text-xs font-semibold text-center text-green-600 md:text-md">
                                {{ number_format($this->banyak_donasi, 0, ',', '.') }}
                                Munfiq<br>NU Care LAZISNU Cilacap</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Mitra Section -->
    <div
        class="mx-auto max-w-[1420px] flex flex-col items-center w-full py-8 md:mt-[70px] bg-center bg-cover bg-opacity-90">
        <!-- Title -->
        <div class="flex items-center justify-between w-full mb-8">
            <div class="relative flex flex-col justify-between px-4 mr-6">
                <h2 class="text-lg font-semibold text-green-600">Mitra LAZISNU Cilacap</h2>
                <h2 class="text-sm text-black">Berikut adalah mitra LAZISNU Cilacap</h2>
            </div>
            <div>
                <a
                    class="mr-4 overflow-hidden text-sm text-left text-green-500 md:hidden hover:text-green-600 hover:cursor-pointer whitespace-nowrap text-ellipsis">Selengkapnya >
                </a>
                <button
                    class="relative hidden px-4 py-2 text-white bg-green-500 rounded-md md:block hover:bg-green-600">
                    <a href="{{ route('Mitra') }}">
                        Mitra Selengkapnya
                    </a>
                </button>
            </div>
        </div>
        <div x-data="{
            offset: 0,
            logoWidth: 10, // Each logo takes 10% width
            visibleLogos: 5, // Number of logos visible at once
            logoCount: {{ $this->mitraCount }},
            slideWidth: 20.10, // Default value, will be adjusted
            slideInterval: 2000, // Time in milliseconds for each slide
            interval: null,
            load: false,
            isScrolling: false, // Track manual scroll
            updateSlideWidth() {
                // Adjust slideWidth based on screen size
                if (window.innerWidth < 640) {
                    this.slideWidth = 34; // Value for smaller screens
                } else {
                    this.slideWidth = 20.10; // Value for larger screens
                }
            },
            startAutoSlide() {
                this.interval = setInterval(() => {
                    if (!this.isScrolling) {
                        // Move offset for auto slide
                        if (this.offset < (this.logoCount - this.visibleLogos) * this.slideWidth) {
                            this.offset += this.slideWidth;
                        } else {
                            this.offset = 0; // Restart from the beginning
                        }
                    }
                }, this.slideInterval);
            },
            stopAutoSlide() {
                clearInterval(this.interval);
            },
            handleScroll(event) {
                this.isScrolling = true; // Set manual scrolling state
                // Calculate new offset based on scroll position
                const scrollAmount = event.deltaY / 10; // Adjust scroll speed sensitivity
                this.offset = Math.min(
                    Math.max(
                        this.offset - scrollAmount, 
                        0
                    ),
                    (this.logoCount - this.visibleLogos) * this.slideWidth
                );
                this.stopAutoSlide(); // Stop auto sliding while scrolling
                clearTimeout(window.scrollTimeout);
                window.scrollTimeout = setTimeout(() => {
                    this.isScrolling = false; 
                    this.startAutoSlide(); // Resume auto slide after scrolling
                }, 1000);
            }
        }" 
        x-init="updateSlideWidth();
                load = true;
                startAutoSlide();
                window.addEventListener('resize', updateSlideWidth);" 
        x-show="load" 
        wire:init="loadMitra"
        class="relative w-full overflow-x-auto scrollbar-hide"
        @wheel="handleScroll($event)"> <!-- Use wheel event for smooth scrolling -->

    <!-- Carousel Container -->
    <div class="flex items-center space-x-12 transition-transform duration-500 md:space-x-40"
         :style="'transform: translateX(-' + offset + '%)'">
        <!-- Loop through logos -->
        @if ($mitras && $mitras->isEmpty())
        @elseif($mitras)
            @foreach ($mitras as $mitra)
                <div class="h-[60px] md:h-[150px] max-w-[150px] md:max-w-[190px] py-2 md:py-4 flex-shrink-0">
                    <img src="{{ asset('storage/' . $mitra->logo) }}" alt="Picture"
                         class="object-contain w-full h-full" />
                </div>
            @endforeach
        @else
            @for ($i = 0; $i < $this->mitraCount; $i++)
                <div class="animate-pulse bg-gray-400 h-[50px] md:h-[150px] max-w-[100px] md:max-w-[150px] py-2 md:py-4 flex-shrink-0">
                    <div class="w-full h-full"></div>
                </div>
            @endfor
        @endif
    </div>
</div>

<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
</style>



        <div class="w-full pt-8 px-4 md:px-20 h-[180px] md:h-[350px] flex mb-24 mt-4">
            <iframe class="w-1/2 h-[180px] md:h-[350px] bg-black"
                src="https://www.youtube.com/embed/IUWm95fwZHk?si=sDflST4mHtaP_N1-" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <div class="flex items-center justify-center w-1/2 h-full mx-4 text-green-500">
                <p class="text-[12px] md:text-[30px] font-bold">
                    Lihat Video Terbaru dari NU Care LAZISNU Cilacap
                </p>
            </div>
        </div>
        <div class="px-4 mx-auto md:hidden">
        <div class="flex flex-wrap ">
            <!-- Column 1 -->
            <div class="mb-8 md:mb-0">
                <img src="{{ asset('images/cooler_logo_lazisnu.png') }}" alt="" class="w-auto h-6">
                <p class="pt-4 mb-4 text-sm text-gray-700">
                    Lazisnucilacap.com adalah situs resmi Lembaga Amil Zakat, Infaq
                    dan Shadaqah Nahdlatul Ulama (LAZISNU) Kabupaten Cilacap.
                    <br>Saran dan kritik: 
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=nucarelazisnukabupatencilacap@gmail.com&su=Saran%20dan%20Kritik&body=Assalamualaikum%20tim%20Lazisnu%20Cilacap" 
                        target="_blank" 
                        class="text-blue-500 hover:underline">
                        nucarelazisnukabupatencilacap@gmail.com
                    </a>
                </p>


                <ul class="flex space-x-8">
                    <li><a href="/" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('images/whatsapp.png') }}" alt="" class="hover:scale-125">
                        </a>
                    </li>
                    <li><a href="https://www.youtube.com/@LazisnuCilacap" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('images/youtube.png') }}" alt="" class="hover:scale-125">
                        </a>
                    </li>
                    <li><a href="/" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('images/facebook.png') }}" alt="" class="hover:scale-125">
                        </a>
                    </li>
                    <li><a href="/" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('images/instagram.png') }}" alt="" class="hover:scale-125">
                        </a>
                    </li>
                </ul>
            </div>
            {{-- <!-- Column 2 -->
            <div class="w-2/12 mb-4 md:mb-0">
                <h2 class="mb-4 text-xl font-semibold text-gray-800 ">Informasi</h2>
                <ul class="space-y-4 text-sm">
                <x-navlink class="font-semibold text-gray-800" title="Ziswaf" url="/zakat" />
                <x-navlink class="font-semibold text-gray-800" title="Campaign" url="/campaigns" />
                <x-navlink class="font-semibold text-gray-800" title="Berita" url="/berita" />
                </ul>
            </div> --}}
            <!-- Column 3 -->
            <div class="w-1/2 pr-2 mb-4 md:mb-0p">
                <h2 class="mb-4 text-lg font-semibold text-gray-800">Alamat</h2>
                <p class="mb-4 text-sm text-gray-700">Jl. Masjid No. 09 Sidanegara
                    <br>
                    Cilacap Tengah-Cilacap
                    <br>
                    Kode pos : 53223
                    <br>
                    Telp : (0282) 539 5195
                    <br>
                    Hp/WA : 081228221010
                </p>
            </div>
            <!-- Column 4 -->
            <div class="w-1/2 mb-4 md:mb-0">
                <h2 class="mb-4 text-lg font-semibold text-gray-800">NU Care-LAZISNU Cilacap</h2>
                <div class="h-auto bg-white rounded-lg w-75">
                    <a href="https://maps.app.goo.gl/3ZVUjzq2MxBruu318" target="_blank">
                        <img src="{{ asset('images/map2.png') }}" alt="map">
                    </a>
                </div>
            </div>
            <div class="w-full h-px mt-8 bg-gray-300 ">
            </div>
            <div class="w-full mt-4 mb-20 md:mb-0">
                <h2 class="text-sm text-center text-gray-600">Copyright © 2024 - NU Care LAZISNU     Cilacap</h2>
            </div>

        </div>
    </div>
        <!-- Sticky Bottom -->
        <div class="fixed bottom-0 left-0 right-0 z-40 flex justify-center bg-white shadow-md md:hidden">
            <div class="flex items-center justify-between w-full max-w-lg px-4 py-2 space-x-8 bg-white"
                style="height: 65px; box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1), 0 -2px 4px -2px rgba(0, 0, 0, 0.1);">

                <!-- Landing -->
                <div class="flex items-center justify-center w-16 h-11">
                    <a wire:navigate.hover href="{{ route('landing') }}">
                        <img class="w-full h-auto" src="{{ asset('images/Frame 1-active.png') }}" alt="">
                    </a>
                </div>

                <!-- Campaign -->
                <div class="flex items-center justify-center w-16 h-11">
                    <a wire:navigate.hover href="{{ route('campaign') }}">
                        <img class="w-full h-auto"
                            src="{{ Request::is('campaigns') ? asset('images/Frame 2-active.png') : asset('images/Frame 2.png') }}"
                            alt="">
                    </a>
                </div>

                <!-- Berita -->
                <div class="flex items-center justify-center w-16 h-11">
                    <a wire:navigate.hover href="{{ route('berita') }}">
                        <img class="w-full h-auto"
                            src="{{ Request::is('berita') ? asset('images/Frame 3-active.png') : asset('images/Frame 3.png') }}"
                            alt="">
                    </a>
                </div>

                <!-- Zakat -->
                <div class="flex items-center justify-center w-16 h-11">
                    <a wire:navigate.hover href="{{ route('zakat') }}">
                        <img class="w-full h-auto"
                            src="{{ request()->is('zakat') || request()->is('infak') || request()->is('wakaf') ? asset('images/Frame 5-active.png') : asset('images/Frame 5.png') }}"
                            alt="">
                    </a>
                </div>

                <!-- Profile -->
                <div class="flex items-center justify-center w-16 h-11">
                    <a wire:navigate.hover href="{{ route('profile.index') }}">
                        <img class="w-full h-auto"
                            src="{{ Request::is('profil') ? asset('images/Frame 4-active.png') : asset('images/Frame 4.png') }}"
                            alt="">
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
<script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
        <script>
          var wa_btnSetting = {"btnColor":"#16BE45","ctaText":"","cornerRadius":40,"marginBottom":100,"marginLeft":20,"marginRight":20,"btnPosition":"right","whatsAppNumber":"6281228221010","welcomeMessage":"Halo, Admin. Saya ingin mendapatkan informasi lebih lanjut mengenai tata cara Berdonasi / Berinfak / Zakat / Sedekah di NU-CARE LAZISNU CILACAP.  ","zIndex":999999,"btnColorScheme":"light"};
          window.onload = () => {
            _waEmbed(wa_btnSetting);
          };
        </script>
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
        if (userMenu) {
            if (userMenuBtn.contains(event.target) == null && userMenu.contains(event.target) == null) {
                userMenu.classList.add('hidden');
            }
        }
        if (userMenuBtn) {
            if (userMenuBtn.contains(event.target) == null && userMenu.contains(event.target) == null) {
                userMenu.classList.add('hidden');
            }
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function setupExpandableContainer(containerId, expandLinkId) {
            const container = document.getElementById(containerId);
            const expandLink = document.getElementById(expandLinkId);



            // Function to expand the container
            function expandContainer() {
                container.classList.remove('max-h-[174px]');
                container.classList.add('max-h-none'); // Remove height restriction
                expandLink.style.display = 'none'; // Hide the link
            }

        }

        // Setup expandable containers
        setupExpandableContainer('details-container', 'details-expand-link');
        setupExpandableContainer('update-container', 'update-expand-link');
    });
</script>

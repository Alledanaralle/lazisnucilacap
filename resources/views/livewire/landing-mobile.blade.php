<div style="width: 414px; height: 1613px">
    <x-navbar></x-navbar>

    <div class="relative flex items-center justify-center flex-grow mt-1">
        <!-- Arrow  left -->
        <img src="{{ asset('images/arrowX.png') }}" alt="Arrow Left" class="absolute left-0 z-10 object-cover w-8 h-8">

        <div class="relative z-0 bg-white">
            <img src="{{ asset('images/anak_yatim.png') }}" alt="Anak Yatim" class="object-cover w-full h-full">
        </div>

        <!-- Arrow  right -->
        <img src="{{ asset('images/arrowX.png') }}" alt="Arrow Right"
            class="absolute right-0 object-cover w-8 h-8 transform -scale-x-100">
    </div>

    {{-- stuff --}}
    <div class="relative z-12">
        <div class="relative flex flex-wrap items-center justify-center h-auto py-10 md:py-20 mx-4 md:mx-20 -mt-32 space-y-8 md:space-y-0 md:space-x-16 rounded-3xl">
            
            <!-- Wrapper for Left Ornament and Item 1 -->
            <div class="relative flex items-center w-full md:w-auto">
                <img src="{{ asset('images/fknleaf.png') }}" alt="Left Ornament" class="absolute z-0 object-cover w-1/4 h-auto mb-2 transform -translate-y-1/2 -scale-x-100 -scale-y-100 -left-8 md:-left-28 top-1/2">
                
                <div class="relative z-10 flex flex-col items-center p-4 md:p-8 bg-white rounded-lg shadow-2xl">
                    <img src="{{ asset('images/talk.png') }}" alt="Image 1" class="relative z-10 object-cover w-1/2 md:w-24 h-auto mb-2">
                    <p class="relative z-10 font-semibold text-gray-800">Zakat</p>
                </div>
            </div>
    
            <!-- Item 2 -->
            <div class="relative z-10 flex flex-col items-center p-4 md:p-8 bg-white rounded-lg shadow-2xl w-full md:w-auto">
                <img src="{{ asset('images/talk.png') }}" alt="Image 2" class="relative z-10 object-cover w-1/2 md:w-24 h-auto mb-2">
                <p class="relative z-10 font-semibold text-gray-800">Zakat</p>
            </div>
    
            <!-- Item 3 -->
            <div class="relative z-10 flex flex-col items-center p-4 md:p-8 bg-white rounded-lg shadow-2xl w-full md:w-auto">
                <img src="{{ asset('images/mastercard.png') }}" alt="Image 3" class="relative z-10 object-cover w-1/2 md:w-24 h-auto mb-2">
                <p class="relative z-10 font-semibold text-gray-800">Zakat</p>
            </div>
    
            <!-- Wrapper for Right Ornament and Item 4 -->
            <div class="relative flex items-center w-full md:w-auto">
                <img src="{{ asset('images/fknleaf.png') }}" alt="Right Ornament" class="absolute z-0 object-cover w-1/4 h-auto mb-2 transform -translate-y-1/2 -right-8 md:-right-28 top-1/2">
                
                <div class="relative z-10 flex flex-col items-center p-4 md:p-8 bg-white rounded-lg shadow-2xl">
                    <img src="{{ asset('images/qr.png') }}" alt="Image 4" class="relative z-10 object-cover w-1/2 md:w-24 h-auto mb-2">
                    <p class="relative z-10 font-semibold text-gray-800">Zakat</p>
                </div>
            </div>
        </div>
    </div>
    
    
    
    

    {{-- <div class="relative z-10">
        <div class="absolute top-0 left-0 right-0 grid grid-cols-1 gap-4 py-10 mx-20 -mt-32 bg-white shadow-lg md:grid-cols-2 lg:grid-cols-4 rounded-3xl"
            >
            <!-- Item -->
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/penerima_manfaat.png') }}" alt="Image 1"
                    class="object-cover w-24 h-24 mb-2">
                <p class="mb-1 font-semibold text-green-500">5000</p>
                <p class="text-gray-700">Penerima Manfaat</p>
            </div>
            <!-- Item -->
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/penghimpunan.png') }}" alt="Image 2" class="object-cover w-24 h-24 mb-2">
                <p class="mb-1 font-semibold text-green-500">Rp 2.000.000.000.000</p>
                <p class="text-gray-700">Penghimpunan</p>
            </div>
            <!-- Item -->
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/penyaluran.png') }}" alt="Image 3" class="object-cover w-24 h-24 mb-2">
                <p class="mb-1 font-semibold text-green-500">Rp 2.000.000.000.000</p>
                <p class="text-gray-700">Penyaluran</p>
            </div>
            <!-- Item -->
            <div class="flex flex-col items-center">
                <img src="{{ asset('images/donatur.png') }}" alt="Image 4" class="object-cover w-24 h-24 mb-2">
                <p class="mb-1 font-semibold text-green-500">5000</p>
                <p class="text-gray-700">Donatur</p>
            </div>
        </div>
    </div> --}}



    {{-- tentang --}}
    <div class="flex flex-col items-center py-10 bg-white mt-28">
        <!-- Title -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-black">Tentang</h2>
            <div class="relative px-8 pt-4 mt-2">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-white via-green-700 to-white">
                </div>
            </div>
        </div>

        <!-- Container for items -->
        <div class="flex items-start justify-between w-full max-w-4xl mx-20 space-x-20">
            <!-- Item 1 -->
            <div class="flex flex-col items-center flex-1">
                <img src="{{ asset('images/tentang.png') }}" alt="Image 1" class="object-cover mb-4 w-128 h-128">
            </div>

            <!-- Item 2 -->
            <div class="flex flex-col items-start flex-1 text-justify">
                <p class="mb-4 text-xl font-extrabold text-black">Sekilas NU Care-LAZISNU Cilacap</p>
                <p class="mb-4 text-sm text-gray-700">
                    NU Care-LAZISNU adalah rebranding dan/atau sebagai pintu masuk agar masyarakat global mengenal
                    Lembaga Amil Zakat, Infak, dan Sedekah Nahdlatul Ulama (LAZISNU) sebagai lembaga filantropi NU. NU
                    Care-LAZISNU berdiri pada tahun 2004 sebagai sarana untuk membantu masyarakat, sesuai amanat
                    muktamar NU yang ke-31 di Asrama Haji Donohudan, Boyolali, Jawa Tengah. LAZISNU secara
                    yuridis-formal dikukuhkan oleh SK Menteri Agama RI No. 65/2005 untuk melakukan penghimpunan Zakat,
                    Infak, dan Sedekah (ZIS) kepada masyarakat luas.
                    <br><br>
                    NU Care-LAZISNU merupakan lembaga nirlaba milik perkumpulan Nahdlatul Ulama (NU) yang bertujuan
                    untuk berkhidmat dalam rangka membantu kesejahteraan dan kemandirian umat; mengangkat harkat sosial
                    dengan mendayagunakan dana Zakat, Infak, Sedekah (ZIS) dan dana sosial-keagamaan lainnya (DSKL).
                </p>
                <button class="px-4 py-2 text-white bg-green-500 rounded-lg ">Baca Selengkap</button>
            </div>
        </div>
    </div>

    {{-- zakat --}}
    <div class="flex flex-col items-center w-full py-10 mt-4 bg-white bg-center bg-cover shadow-md"
        style="background-image: url('{{ asset('images/zakat_bg.png') }}');">
        <!-- Title -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-green-500">Apakah Anda masih bingung dengan cara berzakat?</h2>
        </div>

        <!-- Container for items -->
        <div class="relative flex items-start justify-around w-full max-w-4xl mx-20 space-x-20"
            style="margin-top: -20px;">

            <!-- Overlay container for content -->
            <div class="flex items-start justify-center w-full mx-14">
                <!-- Item 1 -->
                <div class="items-center p-4 rounded-lg ">
                    <a href="" class="px-4 py-2 text-white bg-green-500 rounded-lg"> Konsultasi Zakat</a>
                </div>

                <!-- Item 2 -->
                <div class="items-center p-4 rounded-lg ">
                    <a href="" class="px-4 py-2 text-white bg-green-500 rounded-lg"> Kalkulator Zakat</a>
                </div>

                <!-- Item 3 -->
                <div class="items-center p-4 rounded-lg ">
                    <a href="" class="px-4 py-2 text-white bg-green-500 rounded-lg"> Konfirmasii Zakat</a>
                </div>
            </div>
        </div>
    </div>

    {{-- campaign --}}
    <div class="flex flex-col items-center py-10 bg-white">
        <!-- Title -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-black">Mari Mulai Berdonasi</h2>
            <div class="relative px-8 pt-4 mt-2">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-white via-green-700 to-white">
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6 mx-10 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Card 1 -->
            <x-campaign-card />
            <x-campaign-card />
            <x-campaign-card />
            <x-campaign-card />
            <x-campaign-card />
            <x-campaign-card />
        </div>
        <div class="mt-12">
            <button class="px-4 py-2 text-white bg-green-500 rounded-md ">Campaign Lainnya</button>
        </div>
    </div>

    {{-- berita --}}
    <div class="flex flex-col items-center w-full py-10 mt-4 bg-white bg-center bg-cover shadow-md"
        style="background-image: url('{{ asset('images/berita_bg.png') }}');">
        <!-- Title -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-black">Berita</h2>
            <div class="relative px-8 pt-4 mt-2">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-white via-green-700 to-white">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 mx-10 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Card 1 -->
            <x-berita-card />
            <x-berita-card />
            <x-berita-card />

        </div>
        <div class="mt-12">
            <button class="px-4 py-2 text-white bg-green-500 rounded-md ">Berita Lainnya</button>
        </div>
    </div>
    {{-- mitra --}}
    <div class="flex flex-col items-center w-full py-10 mt-4 bg-white bg-center bg-cover shadow-md">
        <!-- Title -->
        <div class="mb-4">
            <h2 class="text-xl font-semibold text-black">Mitra Kami</h2>
            <div class="relative px-8 pt-4 mt-2">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-white via-green-700 to-white">
                </div>
            </div>
        </div>
        <div class="flex flex-wrap justify-center block inline mt-4 space-x-8">
            <x-mitra-logo />
            <x-mitra-logo />
            <x-mitra-logo />
            <x-mitra-logo />
            <x-mitra-logo />
            <x-mitra-logo />
            <x-mitra-logo />
            <x-mitra-logo />
            <x-mitra-logo />
            <x-mitra-logo />

        </div>
        <div class="mt-12">
            <button class="px-4 py-2 text-white bg-green-500 rounded-md ">Berita Lainnya</button>
        </div>
    </div>

    {{-- sticky bottom --}}
    <div class="fixed bottom-0 left-0 right-0 z-40 flex justify-center md:hidden">
        <div class="inline-flex px-8 py-4 bg-white shadow-2xl rounded-3xl">
            <!-- Item -->
            <div class="flex items-center justify-center space-x-5 ">
                <div class="items-center w-16 h-16 bg-gray-100 rounded-full ">
                    <img src="{{ asset('images/logo_pnc.png') }}" alt="">
                </div>
                <div class="items-center w-16 h-16 bg-gray-100 rounded-full ">
                    <img src="{{ asset('images/logo_pnc.png') }}" alt="">
                </div>
                <div class="items-center w-16 h-16 bg-gray-100 rounded-full ">
                    <img src="{{ asset('images/logo_pnc.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

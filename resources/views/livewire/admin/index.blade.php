<div>
    <div class="grid grid-cols-[repeat(auto-fit,minmax(350px,1fr))] gap-6 p-8">
        <!-- Card 1: Jumlah Campaign -->
        <div class="bg-green-600 shadow-lg rounded-lg p-6 flex items-center justify-between transform transition duration-300 hover:scale-105">
            <div>
                <p class="text-sm font-medium text-white">Jumlah Campaign</p>
                <p class="text-3xl font-bold text-white mt-1">{{$jumlah_campaign}}</p>
            </div>
            <div class="text-white">
                <i class="ri-megaphone-line text-5xl"></i>
            </div>
        </div>

        <!-- Card 2: Jumlah Berita -->
        <div class="bg-green-600 shadow-lg rounded-lg p-6 flex items-center justify-between transform transition duration-300 hover:scale-105">
            <div>
                <p class="text-sm font-medium text-white">Jumlah Berita</p>
                <p class="text-3xl font-bold text-white mt-1">{{$jumlah_berita}}</p>
            </div>
            <div class="text-white">
                <i class="ri-newspaper-line text-5xl"></i>
            </div>
        </div>

        <!-- Card 3: Jumlah User -->
        <div class="bg-green-600 shadow-lg rounded-lg p-6 flex items-center justify-between transform transition duration-300 hover:scale-105">
            <div>
                <p class="text-sm font-medium text-white">Jumlah User</p>
                <p class="text-3xl font-bold text-white mt-1">{{$jumlah_user}}</p>
            </div>
            <div class="text-white">
                <i class="ri-user-3-line text-5xl"></i>
            </div>
        </div>

        <!-- Card 4: Banyak Donasi -->
        <div class="bg-green-600 shadow-lg rounded-lg p-6 flex items-center justify-between transform transition duration-300 hover:scale-105">
            <div>
                <p class="text-sm font-medium text-white">Banyak Donasi</p>
                <p class="text-3xl font-bold text-white mt-1">{{$banyak_donasi}}</p>
            </div>
            <div class="text-white">
                <i class="ri-hand-heart-line text-5xl"></i>
            </div>
        </div>

        <!-- Card 5: Jumlah Donasi Terkumpul -->
        <div class="bg-green-600 shadow-lg rounded-lg p-6 flex items-center justify-between transform transition duration-300 hover:scale-105">
            <div>
                <p class="text-sm font-medium text-white">Jumlah Donasi Terkumpul</p>
                <p class="text-3xl font-bold text-white mt-1">Rp. {{ number_format($jumlah_donasi, 0, ',', '.') }}</p>
            </div>
            <div class="text-white">
                <i class="ri-wallet-line text-5xl"></i>
            </div>
        </div>

        <!-- Card 6: Jumlah Mitra -->
        <div class="bg-green-600 shadow-lg rounded-lg p-6 flex items-center justify-between transform transition duration-300 hover:scale-105">
            <div>
                <p class="text-sm font-medium text-white">Jumlah Mitra</p>
                <p class="text-3xl font-bold text-white mt-1">{{ $banyak_mitra }}</p>
            </div>
            <div class="text-white">
                <i class="ri-group-line text-5xl"></i>
            </div>
        </div>
    </div>
</div>

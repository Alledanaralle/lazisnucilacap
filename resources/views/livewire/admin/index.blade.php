<div>
    <div class="grid grid-cols-1 gap-6 pt-1 mx-10 mt-10 sm:grid-cols-2 lg:grid-cols-3">
<div class="bg-gray-200 shadow-2xl rounded-2xl">
    <p class="px-2 py-4 ml-4 text-xl font-semibold">Jumlah Campaign</p>
    <p class="px-2 py-4 ml-4 text-xl font-semibold">{{$jumlah_campaign}}</p>
</div>
<div class="bg-gray-200 shadow-2xl rounded-2xl">
    <p class="px-2 py-4 ml-4 text-xl font-semibold">Jumlah Berita</p>
    <p class="px-2 py-4 ml-4 text-xl font-semibold">{{$jumlah_berita}}</p>
</div>
<div class="bg-gray-200 shadow-2xl rounded-2xl">
    <p class="px-2 py-4 ml-4 text-xl font-semibold">Jumlah User</p>
    <p class="px-2 py-4 ml-4 text-xl font-semibold">{{$jumlah_user}}</p>
</div>
<div class="bg-gray-200 shadow-2xl rounded-2xl">
    <p class="px-2 py-4 ml-4 text-xl font-semibold">Banyak Donasi</p>
    <p class="px-2 py-4 ml-4 text-xl font-semibold">{{$banyak_donasi}}</p>
</div>
<div class="bg-gray-200 shadow-2xl rounded-2xl">
    <p class="px-2 py-4 ml-4 text-xl font-semibold">Jumlah Donasi Terkumpul</p>
    <p class="px-2 py-4 ml-4 text-xl font-semibold">Rp. {{ number_format($jumlah_donasi, 0, ',', '.') }}</p>

</div>
<div class="bg-gray-200 shadow-2xl rounded-2xl">
    <p class="px-2 py-4 ml-4 text-xl font-semibold">Jumlah Mitra</p>
    <p class="px-2 py-4 ml-4 text-xl font-semibold">{{ $banyak_mitra }}</p>

</div>
    </div>
</div>

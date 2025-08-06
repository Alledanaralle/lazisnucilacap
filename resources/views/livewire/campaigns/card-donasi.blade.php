<div class="w-full py-2 flex items-center border border-transparent border-b-gray-300">
    <div class="w-16 h-20 rounded-lg bg-white mx-2 text-black flex justify-center items-center">
        <img src="{{ asset('images/profile.png') }}" alt="">
    </div>
    <div class="w-full bg-white mx-2 text-black flex flex-col justify-center pl-2">
        <div>
            <p class="font-bold text-lg text-[12px]">{{ $donasi->username }}</p>
        </div>
        <div class="flex items-center text-[11px] -mt-1">
            <p>Berdonasi Sebesar</p>
            <p class="ml-2 text-green-500 font-semibold">Rp. {{ number_format($donasi->jumlah_donasi, 0, ',', '.') }}</p>
        </div>
        <div>
            <p class="text-[10px]">{{ $waktu_donasi }} hari yg lalu</p>
        </div>

    </div>
</div>

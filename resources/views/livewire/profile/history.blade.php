<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Riwayat" />
    <div class="flex flex-col w-full min-h-screen bg-white shadow-md md:w-[414px]">
        <div class="flex flex-col items-center w-full">
            @if ($donasis->isEmpty())
                <p class="text-center ">Pengguna ini belum berdonasi</p>
                <a href="{{ route('campaign') }}" class="text-center text-green-500 ">Donasi Sekarang</a>
            @else
                <ul class="w-full">
                    <div class="w-full pt-2 bg-white ">
                        @foreach ($donasis as $donasi)
                            <li class="w-full px-4 bg-white" wire:click="{{ $donasi->id_donasi }}">
                                <div class="flex flex-grow w-full py-4 z-5">
                                    <div class="z-0 relative group flex justify-center items-center w-[120px] h-[90px] overflow-hidden">
                                        <img src="{{ asset('storage/images/campaign/' . $donasi->image) }}" alt="Picture"
                                             class="object-cover w-full h-full hover:cursor-pointer">
                                    </div>
                                    
                                    <div class="w-3/5 px-3 ">
                                        <p class="text-[12px] font-semibold text-gray-800">
                                            {{ \Illuminate\Support\Str::limit($donasi->title, 35, '...') }}
                                        </p>
                                        <p class="text-[11px] text-gray-800">
                                            Berdonasi Sebesar
                                        </p>
                                        <div class="flex items-center justify-between">
                                            <p class="text-[11px] font-semibol text-green-500">
                                                Rp. {{$donasi->jumlah_donasi}}
                                            </p>
                                            <p class="text-[11px] text-black">
                                                {{$donasi->waktu_donasi}} Hari yang lalu
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <div class="h-[1px] w-full bg-gray-200">
                            </div>
                        @endforeach
                    </div>
                </ul>
            @endif
            <div style="height: 67px "></div>

        </div>
    </div>
</div>

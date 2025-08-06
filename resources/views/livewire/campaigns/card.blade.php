<div class="z-5 flex flex-grow  bg-white  h-[130px]">
    <a href="{{ route('campaigns.show', $campaign->slug) }}" class="flex flex-grow w-[280px] h-[130px]">
        <div class="z-0 relative group flex justify-center items-center w-[280px] h-[130px] overflow-hidden">
            <img src="{{ asset('storage/images/campaign/' . $campaign->main_picture) }}" alt="Picture"
                class="object-cover w-full h-full hover:cursor-pointer">
            <div
                class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 bg-green-600 opacity-0 hover:cursor-pointer bg-opacity-80 group-hover:opacity-100">
                <p class="text-lg text-center text-white">View Campaign</p>
            </div>
        </div>
        <div class="w-4/5 px-3 py-2 ">
            <h2 class="text-[14px]  font-semibold text-gray-800">
                {{ \Illuminate\Support\Str::limit($campaign->title, 20, '...') }}
            </h2>
            <div class="flex items-center justify-between mt-2">
                <div class="flex items-center">
                    <img src="{{ asset('images/icon_location.png') }}" alt="pinpoint" class="w-3 h-3">
                    <p class="pl-1 text-[12px]  text-gray-600">{{ $campaign->lokasi }}</p>
                </div>
                <p class="pl-1 text-[10px] text-right text-green-600">{{ \Illuminate\Support\Str::limit($campaign->kategori->nama_kategori ?? '', 10, '...') }}</p>

            </div>
            <div class="mt-3">
                <div class="h-1 mb-2 bg-gray-200 rounded-full">
                    <div class="h-1 bg-green-500 rounded-full" style="width: {{ $progress }}%;"></div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="text-[12px] text-left">
                        <p class="text-gray-700 ">Terhimpun</p>
                        <p class="font-bold text-green-600 ">Rp.
                            {{ number_format($campaign->raised, 0, ',', '.') }}</p>
                    </div>
                    <div class="text-[12px] text-left">
                        <p class="text-gray-700 ">Sisa Hari</p>
                        <p class="font-bold text-right text-gray-700 ">{{ $dayLeft }}</p>
                    </div>
                </div>
            </div>
        </div>
    </a>

</div>

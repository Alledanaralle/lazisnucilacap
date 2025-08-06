<div class="flex flex-grow h-full bg-white z-5">
    <a wire:navigate.hover href="{{ route('campaigns.show', $campaign->slug) }}">
    <div class="relative z-0 flex items-center justify-center overflow-hidden group w-44 h-28">
            <img src="{{ asset('storage/images/campaign/' . $campaign->main_picture) }}" 
                 alt="Picture"
                 class="object-cover w-full h-full hover:cursor-pointer">
            <div class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 bg-green-600 opacity-0 hover:cursor-pointer bg-opacity-80 group-hover:opacity-100">
                <p class="text-lg text-center text-white">View Campaign</p>
            </div>
        </a>
    </div>
    
    <div class="w-4/5 px-3 py-2 ">
        <h2 class="text-sm font-semibold text-gray-800">
            {{ \Illuminate\Support\Str::limit($campaign->title, 25, '...') }}
        </h2>
        <div class="flex items-center mt-2">
            <img src="{{ asset('images/icon_location.png') }}" alt="pinpoint" class="w-3 h-3">
            <p class="pl-1 text-xs text-gray-600">{{ $campaign->lokasi }}</p>
        </div>
        <div class="mt-1">
            <div class="h-1 mb-2 bg-gray-200 rounded-full">
                <div class="h-1 bg-green-500 rounded-full" style="width: {{ $progress }}%;"></div>
            </div>

            <div class="flex items-center justify-between">
                <div class="text-xs text-left">
                    <p class="mt-2 text-gray-700 ">Rwwwaised</p>
                    <p class="mt-2 font-bold text-green-600 ">Rp. {{ $campaign->raised }}</p>
                </div>
                <div class="text-xs text-left">
                    <p class="mt-2 text-gray-700 ">Sisa Hari</p>
                    <p class="mt-2 font-bold text-gray-700 ">90</p>
                </div>
            </div>

        </div>
    </div>
</div>


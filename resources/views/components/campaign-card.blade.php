<div wire:loading:remove
    class="h-full bg-white border border-transparent z-5 md:flex-col md:shadow-2xl border-b-gray-300">
    <a href="{{ route('campaigns.show', $campaign->slug) }}" class="flex flex-row w-full md:flex-col md:flex">
        <div class="z-0 relative group flex items-center w-44 h-28 md:h-80 md:w-[400px] ">

            <img src="{{ asset('storage/images/campaign/' . $campaign->main_picture) }}" alt="Picture"
                class="object-cover w-full h-full md:h-80 hover:cursor-pointer ">
            <div
                class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 bg-green-600 opacity-0 hover:cursor-pointer bg-opacity-80 group-hover:opacity-100">
                <p class="text-lg text-center text-white">View Campaign</p>
            </div>
        </div>
        <div class="w-3/5 px-3 py-2 md:p-4 md:w-full">
            <h2 class="text-sm font-semibold text-gray-800 md:text-xl">
                {{ \Illuminate\Support\Str::limit($campaign->title, 25, '...') }}</h2>
            <div class="flex items-center mt-1">
                <img src="{{ asset('images/icon_location.png') }}" alt="pinpoint" class="w-3 h-3">
                <p class="pl-1 text-xs text-gray-600 md:text-sm">{{ $campaign->lokasi }}</p>
            </div>
            <div class="mt-1">
                <div class="h-1 mb-2 bg-gray-200 rounded-full md:h-2">
                    <div class="h-1 bg-green-500 rounded-full md:h-2" style="width: {{ $campaign->progress }}%;"></div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="text-xs text-left md:text-lg">
                        <p class="text-gray-700 md:mt-2">Terhimpun</p>
                        <p class="text-green-600 md:mt-2">Rp. {{ $campaign->raised }}</p>
                    </div>
                    <div class="text-xs text-left md:text-md md:text-right">
                        @php
                            use Carbon\Carbon;
                            $dayLeft = floor(Carbon::parse($campaign->end_date)->diffInDays(Carbon::now(), false));
                            if ($dayLeft < 0) {
                                $dayLeft = -$dayLeft;
                            } elseif ($dayLeft > 0) {
                                $dayLeft = 0;
                            }
                        @endphp
                        <p class="text-gray-700 md:mt-2">
                            {{ $dayLeft }}</p>
                        <p class="text-gray-700 md:mt-2">Hari lagi</p>
                    </div>
                </div>

            </div>
        </div>
    </a>
</div>

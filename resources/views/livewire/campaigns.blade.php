<div>
    <div class="w-full h-96 max-w-[414px] mx-auto bg-white">
        <x-nav-mobile2 title="Campaign" />

        <div class="flex items-center justify-center w-full">
            <div class="w-full ">
                <!-- Kategori and Filter Buttons -->
                <div class="flex items-center justify-between">
                    <!-- Kategori Button -->
                    <a class="flex items-center justify-center w-1/2 py-2 space-x-2 border border-transparent border-b-gray-200 border-r-gray-200 hover:cursor-pointer">
                        <img src="{{ asset('images/kategori.png') }}" alt="Kategori" class="w-auto h-4">
                        <h1 class="text-base">Kategori</h1>
                    </a>

                    <a href="/"
                        class="flex items-center justify-center w-1/2 py-2 space-x-2 border border-transparent border-b-gray-200 border-l-gray-200 ">
                        <img src="{{ asset('images/filter.png') }}" alt="Filter" class="w-auto h-4">
                        <h1 class="text-base">Filter</h1>
                    </a>
                </div>

                <!-- Campaign Cards Grid -->
                <div class="grid w-full grid-cols-1">
                    @foreach ($campaigns as $campaign)
                        <div class="px-4 py-2 border border-transparent border-b-gray-300">
                            <x-campaign-card-mobile :campaign="$campaign" wire:key="{{ $campaign->id_campaign }}" />
                        </div>
                    @endforeach
                </div>

                <!-- Load More Button -->
                <div class="flex justify-center mt-6">
                    <button class="flex items-center justify-center p-2 text-white bg-green-600 rounded-md"
                        wire:click="moreCampaigns">
                        Campaign lainnya
                    </button>
                </div>
            </div>
        </div>
        {{-- <div
        class="sticky top-0 z-20 flex items-center justify-start block w-full px-8 py-4 space-y-4 bg-green-500 md:hidden md:space-y-0">
        <!-- Logo -->
        <div class="flex items-center flex-shrink-0 space-x-2">
            <a href="/">
                <img src="{{ asset('images/titleBar.png') }}" alt="Logo" class="w-auto h-4">
            </a>
            <h1 class="text-base font-semibold">Campaign</h1>
        </div>
    </div> --}}


    </div>
</div>

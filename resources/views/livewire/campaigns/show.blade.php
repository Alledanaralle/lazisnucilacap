<div class="w-full max-w-[414px] mx-auto bg-white">
    <x-nav-mobile2 title="{{ \Illuminate\Support\Str::limit($this->title, 35, '...') }}" :backUrl="route('campaign')" />

    <div>
        <div class="w-full aspect-[4/3] overflow-hidden">
            <img src="{{ asset('storage/images/campaign/' . $campaign->main_picture) }}" alt="Main Picture"
                class="w-full h-full object-cover">
        </div>
        <p class="mt-4 px-4 py-2 font-bold text-[20px] w-full text-justify">{{ $campaign->title }}</p>
        <div class="px-3 w-full">
            <div class="flex justify-between w-fullitems-center mt-1">
                <div class="flex items-center">
                    <img src="{{ asset('images/icon_location.png') }}" alt="pinpoint" class="w-3 h-3">
                    <p class="pl-1 text-[12px] text-gray-600">{{ $campaign->lokasi }}</p>
                </div>
                <div>
                    <p class="pl-1 text-[12px] text-green-600">{{ $campaign->kategori->nama_kategori ?? '' }}</p>
                </div>
            </div>
            <div class="py-4">
                <div class="mb-2 h-1  bg-gray-200 rounded-full">
                    <div class="h-1  bg-green-500 rounded-full" style="width: {!! $progress !!}%;"></div>
                </div>

                <div class="flex items-center justify-between ">
                    <div class=" text-left ">
                        <p class=" text-gray-700 text-[10px]">Terhimpun</p>
                        <p class=" text-green-600 text-[12px] font-extrabold">Rp.
                            {{ number_format($campaign->raised, 0, ',', '.') }}</p>
                    </div>
                    <div class=" text-left ">
                        <p class=" text-gray-700 text-right text-[12px] font-extrabold">{{ $dayLeft }}</p>
                        <p class=" text-gray-700 text-[10px]">Hari lagi</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-1 w-full bg-gray-200">
            {{-- empty --}}
        </div>
        <div id="details-container" class="relative max-h-[174px] overflow-hidden transition-all duration-300">
            <p class="mt-4 ml-4 text-[16px] font-semibold text-green-500">Detail Donasi</p>
            <div id="details-content" class="px-5 w-full py-4 break-words">
                <p wire:key="campaign-{{ $campaign->id_campaign }}" class="text-[12px]">{!! $processedDesc !!}</p>
            </div>
                <a href="#" id="details-expand-link"
                   class="absolute bottom-0 left-0 px-3 pt-4 w-full text-left bg-gradient-to-t from-white via-white to-transparent">
                    <div class="py-2 font-bold text-green-500 text-[12px]">
                        Baca Selengkapnya...
                    </div>
                </a>
        </div>
        
        <div class="py-1 w-full bg-gray-200">
            {{-- empty --}}
        </div>
        {{-- @if ($processedUpdate) --}}
            <div id="update-container" class="relative max-h-[174px] overflow-hidden transition-all duration-300 {{$processedUpdate ? 'block' : 'hidden'}} ">
                <p class="mt-4 ml-4 text-[16px] font-semibold text-green-500">Update Donasi</p>
                <div id="update-content" class="px-5 w-full py-4 text-[12px] break-words">
                    <p wire:key="campaign-{{ $campaign->id_campaign }}">{!! $processedUpdate !!}</p>
                </div>
                <a href="#" id="update-expand-link"
                   class="absolute bottom-0 left-0 px-3 pt-4 w-full text-left bg-gradient-to-t from-white via-white to-transparent">
                    <div class="py-2 font-bold text-green-500 text-[12px]">
                        Baca Selengkapnya...
                    </div>
                </a>
            </div>
            <div class="py-1 w-full bg-gray-200">
                {{-- empty --}}
            </div>
        {{-- @endif --}}
        <div class="relative">
            <div class="flex justify-between items-center">
                <p class="mt-4 ml-4 text-md font-semibold text-green-500 text-[16px]">Donatur</p>
                <a href="{{ route('campaigns.donasiList', $campaign->title) }}"
                    class="mt-4 mr-4 text-right font-semibold text-green-500 text-[12px]">Lihat Semua></a>
            </div>
            <div class="px-3 w-full py-4" x-data="{ load: false }" x-init="load = true" x-show="load"
                wire:init="loadDonasis">
                @if ($donasis && $donasis->isEmpty())
                    <div class="px-4 py-2 border border-transparent border-b-gray-300 h-[100px] text-center ">
                        <p>
                            Jadilah yang pertama donasi
                        </p>
                        <a href="{{ route('donasi.index', $campaign->title) }}" class="text-green-500 text-sm">Donasi
                            Sekarang</a>
                    </div>
                @elseif($donasis)
                    @foreach ($donasis as $donasi)
                        <livewire:campaigns.card-donasi :id_donasi="$donasi->id_donasi" wire:key="{{ $donasi->id_donasi }}" />
                    @endforeach
                @endif
            </div>
            <div wire:loading class="w-full px-4  border border-transparent space-y-2">
                @for ($i = 0; $i < 3; $i++)
                    <div
                        class="w-full py-2 flex items-center border border-transparent border-b-gray-300 animate-pulse">
                        <div
                            class="w-16 h-16 rounded-lg bg-gray-200 dark:bg-gray-700 mx-2 flex justify-center items-center">
                            <div class="w-full h-full bg-gray-200 dark:bg-gray-700"></div>
                        </div>
                        <div class="w-full bg-white mx-2 text-black flex flex-col justify-center pl-2">
                            <div class="bg-gray-200 dark:bg-gray-700 h-5 w-20 -mt-2 mb-2"></div>
                            <div class="flex items-center text-[11px] -mt-1">
                                <div class="h-3 bg-gray-200 dark:bg-gray-700  w-24 mb-2">
                                </div>
                                <div class="h-3 bg-gray-200 dark:bg-gray-700  w-16 mb-2 ml-2"></div>
                            </div>
                            <div class="h-2 bg-gray-200 dark:bg-gray-700  w-16"></div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <div class="relative">
            <div class="flex justify-between items-center">
                <p class="mt-4 ml-4 text-md font-semibold text-green-500 text-[16px]">Doa Doa Orang Baik</p>
                <a href="{{ route('campaigns.doaList', $campaign->title) }}"
                    class="mt-4 mr-4 text-right font-semibold text-green-500 text-[12px]">Lihat Semua></a>
            </div>
            <div class="px-3 w-full py-4 space-y-4" x-data="{ load: false }" x-init="load = true" x-show="load"
                wire:init="loadDoas">
                @if ($doas && $doas->isEmpty())
                    <div class="px-4 py-2 border border-transparent border-b-gray-300 h-[100px] text-center ">
                        <p>
                            Jadilah yang pertama mendoakan
                        </p>
                        <a href="{{ route('donasi.index', $campaign->title) }}" class="text-green-500 text-sm">Donasi
                            Sekarang</a>
                    </div>
                @elseif($doas)
                    @foreach ($doas as $doa)
                        <livewire:campaigns.card-doa :id_doa="$doa->id_doa" wire:key="{{ $doa->id_doa }}" />
                    @endforeach
                @endif
            </div>

            @for ($i = 0; $i < 3; $i++)
                <div wire:loading
                    class="w-full flex-col items-center py-2 px-4 shadow-[0_4px_4px_rgba(0,0,0,0.1)] animate-pulse">
                    <!-- Placeholder for the username and date -->
                    <div class="flex flex-col text-left w-full">
                        <div class="bg-gray-200 dark:bg-gray-700 h-4 w-24 mb-1"></div>
                        <div class="bg-gray-200 dark:bg-gray-700 h-3 w-20"></div>
                    </div>

                    <!-- Placeholder for the doa text -->
                    <div class="w-full bg-gray-200 dark:bg-gray-700 mt-4 text-black flex flex-col p-2">
                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-full mb-1"></div>
                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-3/4"></div>

                        <!-- Placeholder for like count and description -->
                        <div class="flex justify-start space-x-1 mt-4">
                            <div class="bg-gray-200 dark:bg-gray-700 h-3 w-12"></div>
                            <div class="bg-gray-200 dark:bg-gray-700 h-3 w-24"></div>
                        </div>
                    </div>

                    <!-- Placeholder for the like button -->
                    <div
                        class="w-full bg-gray-200 dark:bg-gray-700 mt-2 text-black border-t flex justify-center py-2 space-x-1 items-center">
                        <div class="bg-gray-200 dark:bg-gray-700 h-5 w-5 rounded-full"></div>
                        <div class="bg-gray-200 dark:bg-gray-700 h-3 w-12"></div>
                    </div>


                </div>
            @endfor

        </div>

        <div style="height: 67px "></div>
        <div class="fixed bottom-0 left-0 right-0 z-50 flex justify-center">
            <div class="flex items-center justify-center px-4 py-4 space-x-4 bg-white"
                style="width: 414px; height: 67px; box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1), 0 -2px 4px -2px rgba(0, 0, 0, 0.1);">
                <livewire:campaigns.share />

                <a wire:navigate.hover href="{{ route('donasi.index', $campaign->title) }}"
                    class="text-[13px] bg-green-600 px-20 py-2 items-center text-white rounded-lg">
                    Donasi Sekarang
                </a>
            </div>
        </div>
    </div>
</div>


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

                // Event listener for the expand link
                expandLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    expandContainer();
                });
            }

            // Setup expandable containers
            setupExpandableContainer('details-container', 'details-expand-link');
            setupExpandableContainer('update-container', 'update-expand-link');
        });
        document.getElementById('openModal').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('modalOverlay').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('modalOverlay').classList.add('hidden');
        });

        document.getElementById('modalOverlay').addEventListener('click', function(event) {
            if (event.target === event.currentTarget) {
                document.getElementById('modalOverlay').classList.add('hidden');
            }
        });
    </script>

<div class="flex flex-col items-center justify-center">
    <x-nav-mobile2 title="Campaign" :backUrl="route('landing')" />
    <div class=" w-full max-w-[414px] mx-auto bg-white min-h-screen">
        <div class="w-full sticky ">
            <div class="relative w-full">
                <input id="search" type="text" placeholder="Search Campaigns..." wire:model.live="search"
                    class="px-4 py-2 border-b border-gray-300 w-full" />
                @if ($search)
                    <button type="button" class="absolute top-0 right-0 mt-2 mr-4"
                        onclick="document.getElementById('search').value = ''; 
                                 var element = document.getElementById('search'); 
                                 element.dispatchEvent(new Event('input'));">
                        &#10005;
                    </button>
                @endif
            </div>
            <!-- Kategori and Filter Buttons -->
            <div class="flex items-center justify-between">
                <!-- Kategori Button -->
                <livewire:campaigns.kategori :nama_kategori="$this->kategori" />
                <div x-data="{ open: false }" class="relative w-1/2">
                    <!-- Filter Button -->
                    <a @click.prevent="open = !open"
                        class="flex items-center justify-center  hover:cursor-pointer py-2 space-x-2 border border-transparent border-b-gray-200 border-l-gray-200">
                        <img src="{{ asset('images/filter.png') }}" alt="Filter" class="w-auto h-4">
                        <h1 class="text-base">{{ $filter }}</h1>
                    </a>

                    <!-- Dropdown Content -->
                    <div x-show="open" @click.away="open = false"
                        class="absolute z-50  w-full shadow-2xl bg-white border border-gray-200">
                        <ul class="text-sm text-gray-700 ">
                            <li>
                                <a wire:click="saring('Terbaru')" @click="open = false"
                                    class="block px-4 py-2 hover:bg-gray-100">Terbaru</a>
                            </li>
                            <li>
                                <a wire:click="saring('Segera Berakhir')" @click="open = false"
                                    class="block px-4 py-2 hover:bg-gray-100">Segera Berakhir</a>
                            </li>
                            <li>
                                <a wire:click="saring('Mendesak')" @click="open = false"
                                    class="block px-4 py-2 hover:bg-gray-100">Mendesak</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Campaign Cards Grid -->
            <div class="flex grid items-center justify-center w-full h-auto grid-cols-1" wire:loading.remove
                x-data="{ load: false }" x-init="load = true" x-show="load" wire:init="loadCampaign">
                @if ($this->kategori == 'all' && $campaigns && $campaigns->isEmpty())
                    <div class="px-4 py-20  text-center">
                        Campaign Tidak Ditemukan
                    </div>
                @elseif($this->kategori !== 'all' && $campaigns && $campaigns->isEmpty())
                    <div class="px-4 py-20  text-center">
                        Campaign Yang Dicari Tidak Ditemukan pada Kategori {{ $this->kategori }} 
                    </div>
                @else
                    @foreach ($campaigns as $campaign)
                        <div class="px-4 py-2 border border-transparent border-b-gray-300"
                            wire:key="{{ $campaign->id_campaign }}">
                            <livewire:campaigns.card :campaign="$campaign" wire:key="{{ $campaign->id_campaign }}" />
                        </div>
                    @endforeach
                @endif
            </div>
            {{-- placeholder --}}
            <div wire:loading class="px-4 py-2 border border-transparent space-y-2">
                @for ($i = 0; $i < 5; $i++)
                    <div class="z-5 flex flex-grow  h-[100px] animate-pulse">
                        <div class="z-0 relative w-[220px] h-full overflow-hidden">
                            <div class="h-[100px] bg-gray-200  dark:bg-gray-700 w-48 mb-4"></div>
                        </div>
                        <div class="py-2 px-3  w-4/5 ">
                            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-44 mb-4"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5 w-48"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5 w-48"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5 w-48"></div>
                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5 w-48"></div>
                        </div>
                    </div>
                @endfor
            </div>
            <div style="height: 67px "></div>
        </div>
    </div>


</div>

<script>
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


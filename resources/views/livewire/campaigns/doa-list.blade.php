<div class="w-full max-w-[414px] mx-auto bg-white min-h-screen">
    <x-nav-mobile2 title="List Doa Campaign" />
    <div x-data="{ load: false }" x-init="load = true" x-show="load" wire:init="loadDoas">

        @if ($doas && $doas->isEmpty())
            <div class="px-4 text-center py-60 ">
                <p>
                    Belum Ada Doa
                </p>
                <a href="{{ route('donasi.index', $campaign->title) }}" class="text-sm text-green-500">Donasi
                    Sekarang</a>
            </div>
        @elseif($doas)
            @foreach ($doas as $doa)
                <div>
                    <livewire:campaigns.card-doa :id_doa="$doa->id_doa" wire:key="{{ $doa->id_doa }}" />
                </div>
            @endforeach
        @endif
        @for ($i = 0; $i < 4; $i++)
        <div wire:loading
            class="w-full flex-col items-center py-2 px-4 shadow-[0_4px_4px_rgba(0,0,0,0.1)] animate-pulse">
            <!-- Placeholder for the username and date -->
            <div class="flex flex-col w-full text-left">
                <div class="w-24 h-4 mb-1 bg-gray-200 dark:bg-gray-700"></div>
                <div class="w-20 h-3 bg-gray-200 dark:bg-gray-700"></div>
            </div>

            <!-- Placeholder for the doa text -->
            <div class="flex flex-col w-full p-2 mt-4 text-black bg-gray-200 dark:bg-gray-700">
                <div class="w-full h-4 mb-1 bg-gray-200 rounded dark:bg-gray-700"></div>
                <div class="w-3/4 h-4 bg-gray-200 rounded dark:bg-gray-700"></div>

                <!-- Placeholder for like count and description -->
                <div class="flex justify-start mt-4 space-x-1">
                    <div class="w-12 h-3 bg-gray-200 dark:bg-gray-700"></div>
                    <div class="w-24 h-3 bg-gray-200 dark:bg-gray-700"></div>
                </div>
            </div>

            <!-- Placeholder for the like button -->
            <div
                class="flex items-center justify-center w-full py-2 mt-2 space-x-1 text-black bg-gray-200 border-t dark:bg-gray-700">
                <div class="w-5 h-5 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                <div class="w-12 h-3 bg-gray-200 dark:bg-gray-700"></div>
            </div>


        </div>
    @endfor
    </div>
</div>

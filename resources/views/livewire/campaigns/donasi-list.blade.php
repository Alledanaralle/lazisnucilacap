<div class="w-full max-w-[414px] mx-auto bg-white min-h-screen">
    <x-nav-mobile2 title="Daftar Donasi {{ $campaign->title }}" />
    <div x-data="{ load: false }" x-init="load = true" x-show="load" wire:init="loadDonasis">

        @if ($donasis && $donasis->isEmpty())
            <div class="px-4 text-center py-60 ">
                <p>
                    Belum Ada Donasi
                </p>
                <a href="#" class="text-sm text-green-500">Donasi Sekarang</a>
            </div>
        @elseif($donasis)
            @foreach ($donasis as $donasi)
                <livewire:campaigns.card-donasi :id_donasi="$donasi->id_donasi" wire:key="{{ $donasi->id_donasi }}" />
            @endforeach
        @endif
        <div wire:loading class="w-full px-4 space-y-2 border border-transparent">
            @for ($i = 0; $i < 8; $i++)
                <div class="flex items-center w-full py-2 border border-transparent border-b-gray-300 animate-pulse">
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-2 bg-gray-200 rounded-lg dark:bg-gray-700">
                        <div class="w-full h-full bg-gray-200 dark:bg-gray-700"></div>
                    </div>
                    <div class="flex flex-col justify-center w-full pl-2 mx-2 text-black bg-white">
                        <div class="w-20 h-5 mb-2 -mt-2 bg-gray-200 dark:bg-gray-700"></div>
                        <div class="flex items-center text-[11px] -mt-1">
                            <div class="w-24 h-3 mb-2 bg-gray-200 dark:bg-gray-700">
                            </div>
                            <div class="w-16 h-3 mb-2 ml-2 bg-gray-200 dark:bg-gray-700"></div>
                        </div>
                        <div class="w-16 h-2 bg-gray-200 dark:bg-gray-700"></div>
                    </div>
                </div>
            @endfor
        </div>

    </div>
</div>

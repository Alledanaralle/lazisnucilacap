<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="{{ $pilar->nama }}" />
    <div class="flex flex-col w-full h-full min-h-screen bg-white shadow-md md:w-[414px]">
        <div class="flex flex-col h-auto shadow-lg">
            <div class="flex px-4 pt-4 pb-6">
                <img src="{{ asset('storage/' . $pilar->img) }}" alt="Main Picture" class="max-w-52 max-h-52">
                <div class="flex flex-col">
                    <h1 class="mx-2 text-sm font-semibold text-green-500">
                        {{ $pilar->nama }} ({{ $pilar->kategori->nama_kategori }})
                    </h1>
                    <h1 class="mx-2 mt-2 text-xs">
                        {{ $firstWords }}
                        
                    </h1>
                    @if (!empty($remainingWords) && !$showRemaining)
                        <a href="#" wire:click.prevent="toggleRemaining()" class="mx-2 text-xs text-green-500 underline ">
                            Baca Selengkapnya
                        </a>
                    @endif
                </div>
            </div>
            @if ($showRemaining)
            <p class="mx-4 text-xs">
                {{ $remainingWords }}
            </p>
                <a href="#" wire:click.prevent="toggleRemaining()" class="mx-4 text-xs text-green-500 underline ">
                    {{-- Tutup --}}
                </a>
            @endif
            @if($pilar->sdgs != '00000000000000000') 
            <div class="mt-4">
                <h3 class="ml-8 font-semibold text-black">Target SDGs</h3>
                <div class="grid grid-cols-5 gap-1 mx-8 my-4">
                    @foreach ($selectedSdgs as $sdgId)
                        @php
                            $sdg = collect($sdgs)->firstWhere('id', $sdgId);
                        @endphp
                        @if ($sdg)
                            <div class="flex items-center">
                                <img src="{{ asset('images/sdg/' . $sdg['image']) }}" alt="{{ $sdg['label'] }}" class="w-16 h-16">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif
            <div>
            </div>
        </div>

        @if ($campaigns && $campaigns->isNotEmpty())
            <div class="flex flex-col px-4 py-4 shadow-lg">
                <div class="flex items-center">
                    <h2 class="text-sm font-semibold text-green-500">Campaign Lazisnu Cilacap</h2>
                    <a href="{{ route('campaign') }}" class="ml-20 text-sm font-semibold text-green-500">
                        selengkapnya >
                    </a>
                </div>
                @foreach ($campaigns as $campaign)
                    <div class="py-2 border border-transparent border-b-gray-300"
                        wire:key="{{ $campaign->id_campaign }}">
                        <livewire:campaigns.card :campaign="$campaign" wire:key="{{ $campaign->id_campaign }}" />
                    </div>
                @endforeach
            </div>
        @endif
        @if ($beritas && $beritas->isNotEmpty())
            <div class="flex items-center justify-center px-4 pt-6 shadow-lg">
                <div class="flex flex-col gap-3">
                    <div class="flex items-center">
                        <h2 class="text-sm font-semibold text-green-500">Berita Lazisnu Cilacap</h2>
                        <a href="{{ route('berita') }}" class="ml-24 text-sm font-semibold text-green-500">
                            selengkapnya >
                        </a>
                    </div>
                    <div class="flex flex-col">
                        @foreach ($beritas as $berita)
                            <a href="{{ route('user-berita.show', $berita->title_berita) }}">
                                <div class="flex items-center px-2 py-4 bg-white border-b border-gray-500">
                                    <img src="{{ asset('storage/' . $berita->picture) }}" alt="Main Picture"
                                        class="object-cover w-40">
                                    <div class="flex flex-col pl-2">
                                        <h2 class="text-sm font-semibold text-gray-800">
                                            {{ \Illuminate\Support\Str::limit($berita->title_berita, 30, '...') }}
                                        </h2>
                                        <div class="flex items-center justify-between pt-4">
                                            <div class="flex items-center">
                                                <img src="{{ asset('images/clock.png') }}" alt="pinpoint"
                                                    class="w-3 h-3">
                                                <h1 class="pl-1 text-xs text-gray-600 md:text-sm">
                                                    {{ $berita->tanggal }}</h1>
                                            </div>
                                            <h1 class="pl-4 text-xs text-right text-green-500 md:text-sm">
                                                {{ $berita->kategori->nama_kategori }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <div class="mb-16"></div>
    </div>
</div>

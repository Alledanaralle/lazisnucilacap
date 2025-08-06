<div class="flex flex-col items-center justify-center">
    <x-nav-mobile2 title="NU Care Hijau" />
    <div class="flex flex-col h-full min-h-screen bg-white shadow-md" style="width: 414px;">
        <div class="flex h-64 shadow-lg">
            <div class="flex px-4 pt-4 pb-6">
                <img src="{{ asset('images/hijau.png') }}" alt="" class="w-56 pr-2">
                <div class="flex flex-col">
                    <h1 class="text-sm font-semibold text-green-500">
                        NU Care Hijau (Lingkungan Hidup dan Kebencanaan) 
                    </h1>
                    <h1 class="mt-2 text-xs">
                        program yang diarahkan untuk memelihara lingkungan dan sumber daya alam serta pemanfaatannya secara bijaksana dan
                    </h1>
                    <h1 class="mt-1 text-xs">
                        mendorong keberlanjutan alam sebagai sumber penghidupan masyarakat.
                    </h1>
                    <img src="{{ asset('images/0.png') }}" alt="" class="w-6 mt-1">
                </div>
            </div>
        </div>
        <div class="flex flex-col px-4 py-4 shadow-lg">
            <div class="flex items-center">
                <h2 class="text-sm font-semibold text-green-500">Campaign Lazisnu Cilacap</h2>
                <a href="{{ route('campaign') }}" class="ml-20 text-sm font-semibold text-green-500">
                    selengkapnya>
                </a>
            </div>
            @foreach ($campaigns as $campaign)
                <div class="py-2 border border-transparent border-b-gray-300"
                    wire:key="{{ $campaign->id_campaign }}">
                    <livewire:campaigns.card :campaign="$campaign" wire:key="{{ $campaign->id_campaign }}" />
                </div>
            @endforeach
        </div>
        <div class="flex items-center justify-center px-4 pt-6 shadow-lg">
            <div class="flex flex-col gap-3">
                <div class="flex items-center">
                    <h2 class="text-sm font-semibold text-green-500">Berita Lazisnu Cilacap</h2>
                    <a href="{{ route('berita') }}" class="ml-24 text-sm font-semibold text-green-500">
                            selengkapnya>
                        </a>
                </div>
                @foreach ($latestBerita->take(3) as $berita)
                    <a href="{{ route('user-berita.show', ['title_berita' => $berita->title_berita]) }}">
                        <div class="flex items-center bg-white rounded-lg shadow-md">
                            <img src="{{ asset('storage/' . $berita->picture) }}" alt="Main Picture" class="object-cover w-24 h-24 pr-2 rounded-md">
                            <div class="flex flex-col">
                                <h2 class="text-sm font-semibold text-gray-800">
                                    {{ \Illuminate\Support\Str::limit($berita->title_berita, 30, '...') }}
                                </h2>
                                <div class="flex items-center justify-between pt-4">
                                    <div class="flex items-center">
                                        <img src="{{ asset('images/clock.png') }}" alt="pinpoint" class="w-3 h-3">
                                            <h1 class="pl-1 text-xs text-gray-600 md:text-sm">{{ $berita->tanggal }}</h1>
                                    </div>
                                    <h1 class="pl-4 text-xs text-green-500 md:text-sm">{{ $berita->kategori }}</h1>
                                </div>
                            </div>
                        </div>
                    </a>
                 @endforeach
                 <div class="mb-16"></div>
            </div>
        </div>
    </div>
</div>

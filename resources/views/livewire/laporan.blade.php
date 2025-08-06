<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Laporan & Publikasi" />
    <div class="flex flex-col w-full h-full min-h-screen bg-white shadow-md md:w-[414px]">
        <div class="flex flex-col px-4 py-4 shadow-lg">
            <div id="details-container" class="relative max-h-[1000px] overflow-hidden transition-all duration-300">
                <p class="text-[14px] font-semibold text-green-500 items-center flex pb-2">Laporan & Publikasi NU-Care LAZISNU Cilacap</p>
                <div class="flex flex-col gap-3 p-4 mb-6 rounded shadow-lg">
                    @foreach ($laporan->take(5) as $item)
                        <a href="{{ asset('storage/' . $item->file) }}" target="_blank">
                            <button class="flex items-center justify-between w-full px-4 py-2 border border-gray-300 rounded">
                                <div class="flex items-center">
                                    <img src="{{ asset('images/paper.png') }}" alt="logo" class="w-6 mr-2">
                                    <span class="text-sm font-semibold">{{ $item->nama }}</span>
                                </div>
                                <img src="{{ asset('images/Downlaod.png') }}" alt="logo" class="w-5">
                            </button>
                        </a>
                    @endforeach
                </div>
                <div class="flex flex-col gap-3 mb-16">
                    @if ($latestBerita->isNotEmpty())
                       <div class="flex flex-col">
                            @foreach ($latestBerita as $berita)
                                <a href="{{ route('user-berita.show', $berita->title_berita) }}">
                                    <div class="flex items-center px-4 py-2 bg-white border-b border-gray-500">
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
                    @else
                        <p class="text-sm text-gray-500">Tidak ada berita tersedia saat ini.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

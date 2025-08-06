<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="{{ \Illuminate\Support\Str::limit($berita->title_berita, 35, '...') }}" backUrl="{{ route('berita') }}"/>
    <div class="w-full min-h-screen bg-white shadow-md md:w-[414px]">
        <div class="mx-5 mb-10">
            <img src="{{ asset('storage/' . $berita->picture) }}" alt="Main Picture"
                class="object-cover w-full h-full mt-4 rounded-md">
            <div class="flex flex-col justify-between px-5">
                <p class="pt-3 font-bold">{{ str_replace('-', ' ', $berita->title_berita) }}</p>
                <div class="flex items-center mt-3">
                    <img src="{{ asset('images/Calendar.png') }}" alt="jam" class="w-4 h-4">
                    <p class="pl-1 text-sm">
                        {{ \Carbon\Carbon::parse($berita->tanggal)->locale('id')->translatedFormat('d F Y') }}
                    </p>
                </div>
                <p class="pt-10">
                    {!! nl2br(e($berita->description)) !!}
                </p>
            </div>
            <div class="flex items-center mt-16 space-x-4">
                <!-- Teks dengan font-semibold -->
                <h2 class="font-semibold">Bagikan Berita Ini</h2>

                <!-- Space kosong di tengah -->
                <div class="flex-grow"></div>

                <!-- Grid logo sosial media -->
                <div class="flex space-x-2">
                    <a href="https://api.whatsapp.com/send?text=Berita%20Lazisnu%20Cilacap.%0A{{$berita->title_berita}}{{ urlencode(url()->current()) }}"
                        target="_blank" class="flex flex-col items-center">
                        <img src="{{ asset('images/whatsapp3.png') }}" alt="" class="w-10">
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                        target="_blank" class="flex flex-col items-center">
                        <img src="{{ asset('images/facebook3.png') }}" alt="" class="w-10">
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" class="flex flex-col items-center">
                        <img src="{{ asset('images/instagram3.png') }}" alt="" class="w-10">
                    </a>
                </div>
            </div>
            <div class="pt-6">
                <p class="px-8 pb-3 text-xl font-bold">Berita lainnya</p>
                <div class="flex flex-col gap-3 mb-20">
                    @foreach ($otherBerita as $berita)
                        <a href="{{ route('user-berita.show', $berita->title_berita) }}">
                            <div class="flex items-center px-4 py-2 bg-white border-b border-gray-200">
                                <img src="{{ asset('storage/' . $berita->picture) }}" alt="Main Picture"
                                        class="object-cover w-40">
                                    <div class="flex flex-col pl-4">
                                        <h2 class="text-sm font-semibold text-gray-800">
                                            {{ \Illuminate\Support\Str::limit($berita->title_berita, 65, '...') }}
                                        </h2>
                                        <div class="flex items-center justify-between pt-4">
                                            <div class="flex items-center">
                                                <img src="{{ asset('images/Calendar.png') }}" alt="pinpoint"
                                                    class="w-3 h-3">
                                                <h1 class="pl-1 text-xs text-gray-600 md:text-sm">
                                                    {{ \Carbon\Carbon::parse($berita->tanggal)->locale('id')->translatedFormat('d F Y') }}
                                                </h1>
                                            </div>
                                        </div>
                                        <h1 class="pl-4 text-xs text-green-500 md:text-sm">
                                            {{ $berita->kategori->nama_kategori }}</h1>
                                    </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

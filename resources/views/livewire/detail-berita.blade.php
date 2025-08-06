
    <div class="flex flex-col items-center justify-center">
        <x-nav-mobile2 title="{{ \Illuminate\Support\Str::limit($berita->title_berita, 35, '...') }}" />
        <div class="min-h-screen bg-white shadow-md" style="width: 414px">
            <div class="mx-5 mb-10">
                <img src="{{ asset('storage/' . $berita->picture) }}" alt="Main Picture" class="object-cover w-full h-full mt-4 rounded-md">
                <div class="flex flex-col justify-between px-5">
                    <p class="pt-3 font-bold">{{ $berita->title_berita }}</p>
                    <div class="flex items-center mt-3">
                        <img src="{{ asset('images/clock.png')}}" alt="jam" class="w-4 h-4">
                        <p class="pl-1 text-sm">{{ $berita->tanggal }}</p>
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
                        <a href="https://api.whatsapp.com/send?text=Berita%20Lazisnu%20Cilacap%20{{ urlencode(url()->current()) }}"
                            target="_blank" class="flex flex-col items-center">
                            <img src="{{ asset('images/whatsapp3.png')}}" alt="" class="w-10">
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                            target="_blank" class="flex flex-col items-center">
                            <img src="{{ asset('images/facebook3.png')}}" alt="" class="w-10">
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="flex flex-col items-center">
                            <img src="{{ asset('images/instagram3.png')}}" alt="" class="w-10">
                        </a>
                    </div>
                </div>
                <div class="pt-6">
                    <p class="px-8 pb-3 text-xl font-bold">Berita lainnya</p>
                   <div class="flex flex-col gap-3">
                    @foreach ($otherBerita as $berita)
                        <a href="{{ route('detail-berita', ['id_berita' => $berita->id_berita]) }}">
                            <div class="flex items-center bg-white rounded-lg shadow-md">
                                <img src="{{ asset('storage/' . $berita->picture) }}" alt="Main Picture" class="object-cover w-24 h-24 rounded-md">
                                <div class="flex flex-col pl-2">
                                    <h2 class="text-sm font-semibold text-gray-800">
                                        {{ \Illuminate\Support\Str::limit($berita->title_berita, 30, '...') }}
                                    </h2>
                                    <div class="flex items-center pt-4">
                                    <img src="{{ asset('images/clock.png') }}" alt="pinpoint" class="w-3 h-3">
                                    <p class="pl-1 text-xs text-gray-600 md:text-sm">{{ $berita->tanggal}}</p>
                                    <h1 class="pl-4 text-xs text-green-500 md:text-sm">{{ $berita->kategori }}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        <div class="mb-16">
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

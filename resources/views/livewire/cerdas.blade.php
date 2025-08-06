<div class="flex flex-col items-center justify-center">
    <!-- Navigation Component -->
    <x-nav-mobile2 title="NU Care Cerdas" />
    
    <!-- Main Content Wrapper -->
    <div class="flex flex-col h-full min-h-screen bg-white shadow-md" style="width: 414px;">
        
        <!-- Main Image and Description Section -->
        <div class="flex flex-col shadow-lg">
            <div x-data="{ expanded: false }" class="flex flex-col shadow-lg">
                <h1 class="mt-2 text-sm font-semibold text-center text-green-500" :class="!expanded ? 'hidden' : 'block'">
                    NU Care Cerdas (Pendidikan)
                </h1>
                <div class="flex py-4">
                    <!-- Main Images -->
                    <div :class="expanded ? 'w-96 h-[300px]' : 'w-96'" class="flex items-center">
                        <img :src="expanded ? '{{ asset('images/expand-cerdas.png') }}' : '{{ asset('images/cerdas.png') }}'" alt="Main Image" class="w-full h-full">
                    </div>
                    <!-- Title and Description -->
                    <div :class="expanded ? ' w-2/3' : ' w-1/3'" class="flex flex-col justify-between pr-4">
                        <h1 class="text-sm font-semibold text-green-500" :class="expanded ? 'hidden' : 'block'">
                            NU Care Cerdas (Pendidikan)
                        </h1>
                        <p class="text-xs text-gray-700">
                            <span x-show="!expanded">
                                program untuk meningkatkan kualitas sumber daya manusia (SDM) melalui penyediaan beasiswa, pelatihan, dan memperkuat fasilitas pend...
                            </span>
                            <span x-show="expanded">
                                program untuk meningkatkan kualitas sumber daya manusia (SDM) melalui penyediaan beasiswa, pelatihan, dan memperkuat fasilitas pendidikan baik di tingkat sekolah dasar, menengah, & perguruan tinggi. program ini bertujuan untuk menjamin akses pendidikan berkualitas yang merata, serta membuka kesempatan belajar bagi semua orang, khususnya bagi siswa yatim-dhuafa dan berprestasi.
                            </span>
                        </p>
                        <!-- Baca Selengkapnya Button -->
                        <a href="#" @click.prevent="expanded = !expanded" class="block mt-2 text-green-600">
                            <span x-show="!expanded">Baca Selengkapnya...</span>
                            <span x-show="expanded">Sembunyikan</span>
                        </a>
                        <!-- Additional Icon/Image -->
                        <div :class="expanded ? 'mt-4' : 'mt-1'" class="flex items-center">
                            <img src="{{ asset('images/0.png') }}" alt="Icon" class="w-6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Campaigns Section -->
        <div class="flex flex-col px-4 py-4 shadow-lg">
            <div class="flex items-center justify-between">
                <h2 class="text-sm font-semibold text-green-500">Campaign Lazisnu Cilacap</h2>
                <a href="{{ route('campaign') }}" class="text-sm font-semibold text-green-500">
                    selengkapnya>
                </a>
            </div>
            <!-- Loop Through Campaigns -->
            @foreach ($campaigns as $campaign)
                <div class="py-2 border-b border-gray-300"
                    wire:key="{{ $campaign->id_campaign }}">
                    <livewire:campaigns.card :campaign="$campaign" wire:key="{{ $campaign->id_campaign }}" />
                </div>
            @endforeach
        </div>
        
        <!-- Latest News Section -->
        <div class="flex flex-col px-4 py-4 mt-2 shadow-lg">
            <div class="flex items-center justify-between">
                <h2 class="text-sm font-semibold text-green-500">Berita Lazisnu Cilacap</h2>
                <a href="{{ route('berita') }}" class="text-sm font-semibold text-green-500">
                    selengkapnya>
                </a>
            </div>
            <!-- Loop Through Latest News -->
            @foreach ($latestBerita->take(3) as $berita)
                            <a href="{{ route('user-berita.show', ['title_berita' => $berita->title_berita]) }}">
                                <div class="flex items-center py-2 bg-white rounded-lg shadow-md">
                                    <img src="{{ asset('storage/' . $berita->picture) }}" alt="Main Picture" class="object-cover w-24 h-24 pr-2 rounded-md">
                                    <div class="flex flex-col pl-2">
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

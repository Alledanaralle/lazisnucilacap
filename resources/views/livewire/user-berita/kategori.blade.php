<div class="w-full ">
    <a id="openModal"
        class="flex items-center justify-center py-2 space-x-2 border border-transparent border-b-gray-200 border-r-gray-200 hover:cursor-pointer">
        <img src="{{ asset('images/folder.png') }}" alt="Kategori" class="w-auto h-4">
        <h1 class="text-base">{{Str::limit($nama_kategori,10 ?? 'Kategori') }}</h1>
    </a>

    <!-- The Popup Modal -->
    <div id="modalOverlay" class="fixed inset-0 z-50 flex items-end justify-center hidden bg-black bg-opacity-50">
        <!-- Modal Content -->
        <div id="categoryModal" class="w-full max-w-[414px] bg-white shadow-lg rounded-t-lg pb-[67px]">
            <div class="p-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-bold text-gray-900">Pilih Kategori Berita</h2>
                    <button type="button" id="closeModal" class="font-extrabold text-gray-400 hover:text-gray-500">
                        <!-- Close icon -->
                        X
                    </button>
                </div>
            </div>

            <!-- Modal content (categories) -->
            <div class="">
                <div class="p-4">
                    <div class="grid grid-cols-3 gap-4 mt-2">
                        <div class="flex flex-col items-center">
                            <a class="flex flex-col items-center cursor-pointer" wire:click="kategori('Kategori')">
                                @if ($nama_kategori === 'Kategori')
                                    <div class="w-8 h-8 mb-2 rounded-full">
                                        <img src="{{ asset('images/all.svg') }}" alt="" class="flex items-center w-8 h-8 mb-2" style="filter: brightness(0) saturate(100%) invert(49%) sepia(88%) saturate(739%) hue-rotate(86deg) brightness(91%) contrast(89%);">
                                    </div>
                                    <span class="text-sm font-semibold text-center text-green-500">Semua</span>
                                @else
                                    <div class="w-8 h-8 mb-2 rounded-full"> <img src="{{ asset('images/all.svg') }}" alt=""></div>
                                    <span class="text-sm font-semibold text-center">Semua</span>
                                @endif
                            </a>
                        </div>
                        @foreach($kategoris as $kategori)
                            <div class="flex flex-col items-center">
                                <a class="flex flex-col items-center cursor-pointer" wire:click="kategori('{{ $kategori->nama_kategori }}')">
                                    @if ($nama_kategori === $kategori->nama_kategori)
                                        <div class="w-8 h-8 mb-2 rounded-full">
                                            <img src="{{ asset('storage/images/kategori/' . $kategori->image) }}" alt="" class="flex items-center w-8 h-8 mb-2" style="filter: brightness(0) saturate(100%) invert(49%) sepia(88%) saturate(739%) hue-rotate(86deg) brightness(91%) contrast(89%);">
                                        </div>
                                        <span class="text-sm font-semibold text-center text-green-500">{{ $kategori->nama_kategori }}</span>
                                    @else
                                        <div class="w-8 h-8 mb-2 rounded-full">
                                            <img src="{{ asset('storage/images/kategori/' . $kategori->image) }}" alt="" class="flex items-center w-8 h-8 mb-2">
                                        </div>
                                        <span class="text-sm font-semibold text-center">{{ $kategori->nama_kategori }}</span>
                                    @endif
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

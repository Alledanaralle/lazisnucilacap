<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Pembayaran Qurban LAZISNU Cilacap" backUrl="{{ route('qurban') }}"/>
    <div class="flex flex-col w-full min-h-screen bg-white shadow-md md:w-[414px]">
        <div class="shadow ">
            <div class="mx-5 mt-2">
                <span class="mb-4 text-sm text-gray-500">
                    Anda akan melakukan pemabayaran untuk Qurban
                </span>
                <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">Jenis Hewan</div>
                    <div class="w-4 text-gray-500text-center">:</div>
                    <div>{{ $jenis }}</div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">Jumlah Mudhohi</div>
                    <div class="w-4 text-gray-500text-center">:</div>
                    <div>{{ $jumlah }}</div>
                </div>
                <div class="flex flex-col">
                        @if($mudhohiList)
                            @foreach ($mudhohiList as $index => $mudhohi)
                                <div class="flex items-center mb-2">
                                    <div class="w-40 text-gray-500">Mudhohi {{ $index + 1 }}</div>
                                    <div class="w-4 text-gray-500text-center">:</div>
                                    <div>{{ $mudhohi }}</div>
                                </div>
                            @endforeach
                        @else
                            <div>Daftar Mudhohi Kosong</div>
                        @endif
                </div>

                <label class="mt-4 font-semibold">Nominal Qurban</label>
                <div class="relative flex flex-col mb-3">
                    <div class="flex items-center justify-center">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 font-semibold text-green-500 border border-black rounded h-9bg-gray-300">Rp. </span>
                            <input 
                                type="text" 
                                value="{{ number_format($this->nominal, 0, ',', '.') }}" 
                                class="w-full py-1 pr-2 font-semibold text-green-500 bg-gray-300 border border-black rounded pl-14 h-9" 
                                placeholder="Rp. 0" 
                                readonly 
                            />
                    </div>
                </div>
            </div>
        </div>
        <div class="shadow">
            <div class="mx-5 mt-4">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-semibold text-green-500">Data Diri</span>
                    <span wire:click="back" class="flex items-center text-sm font-semibold text-green-500 cursor-pointer">
                        Edit
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 18l6-6-6-6" />
                        </svg>
                    </span>
                </div>
                <div class="mt-2">
                        <div class="flex flex-col">
                            <div class="flex items-center mb-2">
                                <span class="w-24 text-sm font-semibold text-gray-600">Nama</span>
                                <span class="w-4 text-sm font-semibold text-center">:</span>
                                <span class="text-sm font-semibold">{{ $nama }}</span>
                            </div>
                            
                            <div class="flex items-center mb-2">
                                <span class="w-24 text-sm font-semibold text-gray-600">Telepon</span>
                                <span class="w-4 text-sm font-semibold text-center">:</span>
                                <span class="text-sm font-semibold">{{ $no }}</span>
                            </div>
                            
                            <div class="flex items-center mb-2">
                                <span class="w-24 text-sm font-semibold text-gray-600">Alamat</span>
                                <span class="w-4 text-sm font-semibold text-center">:</span>
                                <span class="text-sm font-semibold">{{ $alamat }}</span>
                            </div>
                        </div>
                </div>
            </div> 
        </div>
        <div id="snap-container" class="w-full"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.onload = function() {
            window.snap.embed('{{ $this->token }}', {
                embedId: 'snap-container'
            });
        };
    </script>
</div>

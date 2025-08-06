<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Pembayaran Zakat LAZISNU Cilacap" backUrl="{{ route('zakat') }}"/>
    <div class="flex flex-col w-full min-h-screen bg-white shadow-md md:w-[414px]">
        <div class="shadow ">
            <div class="mx-5 mt-2">
                <span class="mb-4 text-sm text-gray-600">Anda Akan Melakukan Pembayaran Untuk Zakat</span>
                @if ($zakatFitrah > 0)
                <span> Fitrah</span>
                <div class="flex flex-col mb-4">
                    <span class="mb-2">
                        Detail Zakat
                    </span>
                    <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">Jumlah Muzakki</div>
                    <div class="w-4 text-gray-500text-center">:</div>
                    <div>{{ $jumlah }}</div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">Nama Muzakki</div>
                    <div class="w-4 text-gray-500text-center">:</div>
                    <div>
                        @foreach ($this->namaMuzakki as $index => $nama)
                            {{ $nama }}@if (!$loop->last),@endif
                        @endforeach
                    </div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">Total Zakat</div>
                    <div class="w-4 text-gray-500text-center">:</div>
                    <div>{{ $jumlah }}</div>
                    <span>paket</span>
                </div>
                </div>
                <label class="font-semibold">Nominal Zakat</label>
                <div class="relative flex flex-col mb-3">
                    <div class="flex items-center justify-center mt-2">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 text-green-500 bg-gray-300 border border-black rounded h-9">Rp. </span>
                            <input 
                                type="text" 
                                value="{{ number_format($this->zakatFitrah, 0, ',', '.') }}" 
                                class="w-full py-1 pr-2 text-green-500 bg-gray-300 border border-black rounded pl-14 h-9 md:w-96" 
                                placeholder="Rp. 0" 
                                readonly 
                            />
                    </div>
                </div>
                @else
                <div class="flex flex-col mb-4">
                    <span class="mb-2">
                        Detail Zakat
                    </span>
                    <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">Zakat Maal</div>
                    <div class="w-4 text-gray-500text-center">:</div>
                    <div>{{ $jenis2 }}</div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">Atas Nama</div>
                    <div class="w-4 text-gray-500text-center">:</div>
                    <div>{{ $atasNama }}</div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">Jenis</div>
                    <div class="w-4 text-gray-500text-center">:</div>
                    <div>{{ $jenis3 }}</div>
                </div>
                </div>
                <label class="font-semibold">Nominal Zakat</label>
                <div class="relative flex flex-col mb-3">
                    <div class="flex items-center justify-center mt-2">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 text-green-500 bg-gray-300 border border-black rounded h-9">Rp. </span>
                        <input 
                        type="text" 
                        value="{{ number_format($this->nominal, 0, ',', '.') }}" 
                        class="w-full py-1 pr-2 text-green-500 bg-gray-300 border border-black rounded pl-14 h-9 md:w-96" 
                        placeholder="Rp. 0" 
                        readonly 
                        />
                    </div>
                </div>
                @endif
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
                                <span class="w-24 text-sm font-semibold text-gray-600">Email</span>
                                <span class="w-4 text-sm font-semibold text-center">:</span>
                                <span class="text-sm font-semibold">{{ $email }}</span>
                            </div>

                            <div class="flex items-center mb-4">
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

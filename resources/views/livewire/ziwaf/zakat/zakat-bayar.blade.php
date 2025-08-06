<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Zakat LAZISNU Cilacap" backUrl="{{ route('zakat') }}"/>
    <div class="flex flex-col w-screen min-h-screen bg-white shadow-md md:w-[414px]">
        <div class="mx-5 mt-5">
            <span class="text-sm text-gray-600">Anda Akan Melakukan Pembayaran Untuk Zakat</span>
            <div class="my-4">
                @if ($zakatFitrah > 0)
                <div class="flex flex-col mb-4">
                    <span class="mb-2">
                        Detail Zakat Fitrah
                    </span>
                    <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">Jumlah Muzakki</div>
                    <div class="w-4 text-center text-gray-500">:</div>
                    <div>{{ $jumlah }}</div>
                </div>
                @foreach ($this->namaMuzakki as $index => $nama)
                    <div class="flex items-center mb-2">
                        <div class="w-40 text-gray-500">Nama Muzakki {{ $index + 1 }}</div>
                        <div class="w-4 text-center text-gray-500">:</div>
                        <div>

                            {{ $nama }}
                            
                        </div>
                    </div>
                @endforeach
                <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">Total Zakat</div>
                    <div class="w-4 text-center text-gray-500">:</div>
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
                    <div>
                        @if ($jenisPerusahaan)
                            @if ($jenisPerusahaan == 'jasa')
                                {{ $jenis2 }} (Jasa)                                
                            @else
                                {{ $jenis2 }} (Dagang/Industri)
                            @endif
                        @else
                            {{ $jenis2 }}
                        @endif
                    </div>
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
                
                <div class="mt-4">
                    <span class="text-xl font-semibold">Mohon Lengkapi Data Berikut</span>
                    <div>
                        @if (!$users)
                        <div class="my-2">
                            <span>sudah punya akun?</span>
                            <span wire:click="login" class="font-semibold text-green-500 cursor-pointer">Login</span>
                        </div>
                        @endif
                            <div class="flex flex-col">
                                <label class="font-semibold">Nama Anda</label>
                                <input 
                                    type="text" 
                                    id="nama" 
                                    wire:model.lazy="nama" 
                                    wire:input="datadiri"
                                    class="w-full px-2 py-1 mt-2 border border-gray-300 rounded md:w-[374px]" 
                                    placeholder="Isikan dengan nama anda" 
                                />
                                @error('nama')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                                
                                <label class="mt-3 font-semibold">No Telepon (WA Aktif)</label>
                                <input 
                                    type="text" 
                                    id="no" 
                                    wire:model.lazy="no" 
                                    wire:input="datadiri" 
                                    class="w-full px-2 py-1 mt-2 border border-gray-300 rounded md:w-[374px]" 
                                    placeholder="Isikan dengan nomor whatsapp anda" 
                                />
                                @error('no')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror

                                <label class="mt-3 font-semibold ">Email (Opsional)</label>
                                <input 
                                    type="text" 
                                    id="email" 
                                    wire:model.lazy="email" 
                                    wire:input="datadiri" 
                                    class="w-full px-2 py-1 mt-2 border border-gray-300 rounded md:w-[374px]" 
                                    placeholder="Isikan dengan email anda" 
                                />
                                @error('email')
                                    <span class="w-full mt-2 text-xs text-red-500">{{ $message }}</span>
                                @enderror

                                <label class="mt-3 font-semibold">Alamat (Opsional)</label>
                                <textarea 
                                    type="text" 
                                    id="alamat" 
                                    wire:model.lazy="alamat" 
                                    wire:input="datadiri" 
                                    class="w-full px-2 py-1 mt-2 mb-3 border border-gray-300 rounded md:w-[374px]" 
                                    placeholder="Isikan dengan alamat anda">
                                </textarea>
                            </div>
                    </div>
                </div> 
            </div>
                <p class="text-[10px]  mb-4">
                    Data pribadi Anda akan digunakan untuk memproses pesanan Anda, menunjang pengalaman Anda di seluruh
                    situs web ini, dan untuk tujuan lain yang dijelaskan dalam
                    <a href="/ziwaf/KebijakanPrivasi" class="text-blue-500 hover:underline">kebijakan privasi</a> kami.
                </p>
                <button wire:click="co" class="w-full px-4 py-2 my-4 font-semibold text-white bg-green-500 rounded md:w-[374px]">
                    Zakat Sekarang
                </button>
        </div>
    </div>
</div>

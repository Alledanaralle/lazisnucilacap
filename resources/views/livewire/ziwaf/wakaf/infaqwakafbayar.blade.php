<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Wakaf LAZISNU Cilacap" backUrl="{{ route('wakaf') }}"/>
    <div class="flex flex-col w-full min-h-screen bg-white shadow-md md:w-[414px]">
        <div class="mx-5 mt-5">
            <div class="flex flex-col">
                <span class="text-sm text-gray-600">Anda Akan Melakukan Pembayaran Untuk Wakaf</span>
            </div>
            <div class="my-4">
                <div class="flex flex-col">
                    <span class="mb-2">
                        Detail Wakaf
                    </span>
                    <div class="flex items-center mb-2">
                        <div class="w-40 text-gray-500">Nama program</div>
                        <div class="w-4 text-gray-500text-center">:</div>
                        <div>{{ $jenis }}</div>
                    </div>
                    <div class="flex items-center mb-2">
                        <div class="w-40 text-gray-500">Atas nama</div>
                        <div class="w-4 text-gray-500text-center">:</div>
                        <div>{{ $atasNama }}</div>
                    </div>
                    <div class="flex items-center mb-2">
                        <div class="w-40 text-gray-500">Jenis</div>
                        <div class="w-4 text-gray-500text-center">:</div>
                        <div>{{ $jenis3 }}</div>
                    </div>
                </div>
                <label class="font-semibold">Nominal</label>
                <div class="relative flex flex-col mb-3">
                    <div class="flex items-center justify-center">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 text-green-500 bg-gray-300 border border-black rounded h-9">Rp. </span>
                            <input 
                                type="text" 
                                value="{{ number_format($this->nominal, 0, ',', '.') }}" 
                                class="w-full py-1 pr-2 text-green-500 bg-gray-300 border border-black rounded pl-14 h-9" 
                                placeholder="Rp. 0" 
                                readonly 
                            />
                    </div>
                </div>
                
                <div class="mt-4">
                    <span class="text-xl font-semibold">Mohon Lengkapi Data Berikut</span>
                    <div>
                        @if (!$users)
                            <span>sudah punya akun?</span>
                            <span wire:click="login" class="font-semibold text-green-500 cursor-pointer">Login</span>
                        @endif
                            <div class="flex flex-col mt-2">
                                <label class="font-semibold">Nama Anda</label>
                                <input 
                                    type="text" 
                                    id="nama" 
                                    wire:model.lazy="nama" 
                                    wire:input="datadiri"
                                    class="w-full px-2 py-1 border border-gray-300 rounded" 
                                    placeholder="Isikan dengan jumlah asset dalam 1 tahun" 
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
                                    class="w-full px-2 py-1 border border-gray-300 rounded" 
                                    placeholder="Isikan dengan jumlah asset dalam 1 tahun" 
                                />
                                @error('no')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror

                                 <label class="mt-3 font-semibold">Email (Opsional)</label>
                                <input 
                                    type="text" 
                                    id="email" 
                                    wire:model.lazy="email" 
                                    wire:input="datadiri" 
                                    class="w-full px-2 py-1 border border-gray-300 rounded" 
                                    placeholder="Isikan dengan email anda" 
                                />
                                @error('email')
                                    <span class="w-full mt-2 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                    </div>
                </div> 
            </div>
            <p class="text-[10px]  mb-4">
                    Data pribadi Anda akan digunakan untuk memproses pesanan Anda, menunjang pengalaman Anda di seluruh
                    situs web ini, dan untuk tujuan lain yang dijelaskan dalam
                    <a href="/ziwaf/KebijakanPrivasi" class="text-blue-500 hover:underline">kebijakan privasi</a> kami.
                </p>
            <button wire:click="co" class="w-full px-4 py-2 font-semibold text-white bg-green-500 rounded">
                Zakat Sekarang
            </button>
        </div>
    </div>
</div>

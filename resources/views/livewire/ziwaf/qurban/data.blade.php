<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Qurban LAZISNU Cilacap" backUrl="{{ route('qurban') }}" />
    <div class="flex flex-col w-full min-h-screen pb-24 bg-white shadow-md md:w-[414px]">
        <div class="px-4 py-2">
            <div class="flex flex-col">
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
                        <span
                            class="absolute inset-y-0 left-0 flex items-center px-3 font-semibold text-green-500 rounded h-9">Rp.
                        </span>
                        <input type="text" value="{{ number_format($this->nominal, 0, ',', '.') }}"
                            class="w-full py-1 pl-10 pr-2 font-semibold text-green-500 border border-gray-300 rounded h-9"
                            placeholder="Rp. 0" readonly />
                    </div>
                </div>

                <div class="mt-4">
                    <span class="text-xl font-semibold">Mohon Lengkapi Data Berikut</span>
                    <div>
                        @if (!$users)
                            <span>sudah punya akun?</span>
                            <span wire:click="login" class="font-semibold text-green-500 cursor-pointer ">Login</span>
                        @endif
                        <div class="flex flex-col mt-4">
                            <label class="font-semibold">Nama Anda</label>
                            <input type="text" id="nama" wire:model="nama" {{-- wire:input.lazy="datamudhohi" --}}
                                class="w-full px-2 py-1 border border-gray-300 rounded"
                            />
                            @error('nama')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror

                            <label class="mt-3 font-semibold">No Telepon (WA Aktif)</label>
                            <input type="text" id="no" wire:model="no" {{-- wire:input.lazy="datamudhohi"  --}}
                                class="w-full px-2 py-1 border border-gray-300 rounded" 
                            />
                            @error('no')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror

                            <label class="mt-3 font-semibold">Alamat Rumah</label>
                            <input type="text" id="alamat" wire:model="alamat" {{-- wire:input.lazy="datamudhohi"  --}}
                                class="w-full px-2 py-1 border border-gray-300 rounded"
                                placeholder="Isikan dengan Alamat anda" 
                            />
                            @error('alamat')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
                <p class="text-[10px]  mb-4 mt-3">
                    Data pribadi Anda akan digunakan untuk memproses pesanan Anda, menunjang pengalaman Anda di seluruh
                    situs web ini, dan untuk tujuan lain yang dijelaskan dalam
                    <a href="/ziwaf/KebijakanPrivasi" class="text-blue-500 hover:underline">kebijakan privasi</a> kami.
                </p>
                <button wire:click="co" class="w-full px-4 py-2 font-semibold text-white bg-green-500 rounded">
                    Qurban Sekarang
                </button>
            </div>
        </div>
    </div>
</div>

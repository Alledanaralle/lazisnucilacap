<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Qurban LAZISNU Cilacap" backUrl="{{ route('landing') }}"/>
    <div class="flex flex-col w-screen min-h-screen mt-12 pb-24 bg-white shadow-md md:w-[414px]">
        <livewire:ziwaf.navigation/>
        <div class="flex flex-col p-4">
            <h1 class="pb-2 font-semibold">Harga Hewan Qurban</h1>
            </div>
            <div class="flex flex-col justify-center px-4">
                <h1 class="pb-2 font-semibold">Jenis Hewan</h1>
                    <div class="relative w-full md:w-96">
                        <select wire:model.lazy="selectedOption"class="block w-full px-4 py-2 pr-8 leading-tight bg-white border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                            <option value="" disabled selected>Pilih Jenis Hewan</option>
                            @foreach ($pilihan_qurbans as $x)
                                <option value="{{ $x->nama }}">{{ $x->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('selectedOption')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                    @if ($selectedOption)
                        @php
                            // Find the selected item based on the selectedOption
                            $selectedQurban = $pilihan_qurbans->firstWhere('nama', $selectedOption);
                        @endphp
                        @if ($selectedQurban)
                            <label class="mt-4 font-semibold">Harga</label>
                            <div class="relative flex flex-col">
                                <div class="flex items-center justify-center">
                                    <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 bg-gray-300 border border-black rounded h-9">Rp. </span>
                                    <input 
                                        type="text" 
                                        value="{{ number_format($selectedQurban->harga, 0, ',', '.') }} / Mudhohi" 
                                        class="w-full py-1 pr-2 mt-2 bg-gray-300 border border-black rounded h-9 pl-14 md:w-96" 
                                        placeholder="Rp. 0" 
                                        readonly 
                                    />
                                </div>
                            </div>
                        @endif
                    @endif
                    <label class="mt-4 font-semibold">Jumlah Mudhohi</label>
                    <div class="mb-4">
                        <input
                        type="number" 
                        id="mudhohi" 
                        wire:model="mudhohi"
                        wire:input.lazy="price" 
                        class="w-full px-2 py-1 mt-2 border border-gray-300 rounded" 
                        placeholder="Isi dengan jumlah Mudhohi" 
                        />
                        @error('mudhohi')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    @if ($mudhohi > 0)
                        <label class="font-semibold">Daftar Mudhohi</label>
                            @for ($i = 0; $i < $mudhohi; $i++)
                                <div class="mb-2">
                                    <input
                                        type="text"
                                        id="daftar.{{ $i }}"
                                        wire:model="daftar.{{ $i }}"
                                        class="w-full px-2 py-1 mt-2 border border-gray-300 rounded"
                                        placeholder="Isi dengan nama Mudhohi"
                                    />
                                    @error("daftar.$i")
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endfor
                    @endif
                    
        
                <label class="font-semibold">Total Nominal Qurban</label>
                @if ($mudhohi > 0)
                    <div class="relative flex flex-col mb-4">
                        <div class="flex items-center justify-center">
                            <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 bg-gray-300 border border-black rounded h-9">Rp. </span>
                            <input 
                                type="text" 
                                value="{{ number_format($nominal, 0, ',', '.') }}" 
                                class="w-full py-1 pr-2 mt-2 bg-gray-300 border border-black rounded h-9 pl-14 md:w-96" 
                                placeholder="Rp. 0" 
                                readonly 
                            />
                        </div>
                    </div>
                @else
                    <div class="relative flex flex-col mb-4">
                        <div class="flex items-center justify-center">
                            <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 bg-gray-300 border border-black rounded h-9">Rp. </span>
                            <input 
                                type="text" 
                                value="0" 
                                class="w-full py-1 pr-2 mt-2 bg-gray-300 border border-black rounded h-9 pl-14 md:w-96" 
                                placeholder="Rp. 0" 
                                readonly 
                            />
                        </div>
                    </div>
                @endif
            </div>
            
                    <div class="flex items-center justify-center mt-4">
                        <button wire:click="submitqurban" class="px-4 py-2 font-semibold text-white bg-green-500 rounded w-96">
                            Qurban Sekarang
                        </button>
                    </div>
    </div>
</div>
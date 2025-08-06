<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Zakat LAZISNU Cilacap" backUrl="{{ route('landing') }}"/>
    <div class="flex flex-col w-screen min-h-screen mt-12 pb-24 bg-white  shadow-md md:w-[414px]">
        <livewire:ziwaf.navigation/>
        <div class="flex flex-col justify-center p-4 ">
            <h1 class="pb-2 font-semibold">Pilih Kategori Zakat</h1>
            <div class="relative w-full md:w-96">
                <select wire:model="selectedOption" wire:change="handleDropdownChange" class="block w-full px-4 py-2 pr-8 leading-tight bg-white border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    <option value="" disabled selected >Pilih Kategori Zakat</option>
                    <option value="maal">Zakat Maal</option>
                    <option value="fitrah">Zakat Fitrah</option>
                </select>
            </div>
        </div>


        <!-- Konten tambahan jika Zakat Maal dipilih -->
        @if($selectedOption === 'maal')
            <div class="flex flex-col justify-center px-4 pb-4">
                <h1 class="pb-2 font-semibold">Perhitungan Zakat</h1>
                    <div class="relative w-full md:w-96">
                        <a href="{{ asset('storage/tabel_perhitungan_zakat_lazisnu.pdf') }}" target="_blank">
                            <button class="flex items-center w-full px-4 py-2 border border-gray-300 rounded">
                                <img src="{{ asset('images/paper.png') }}" alt="logo" class="w-6">
                                <span class="pl-2 text-sm font-semibold">Tabel Perhitungan Zakat.pdf</span>
                            </button>
                        </a>
                    </div>
            </div>
            <div class="flex flex-col justify-center px-4">
            <h1 class="pb-2 font-semibold">Pilih Kategori Zakat Maal</h1>
                <div class="relative w-fscreen md:w-96">
                    <select wire:model="selectedOption2" wire:change="handleDropdownChange" class="block w-full px-4 py-2 pr-8 leading-tight bg-white border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Pilih Kategori Zakat Maal</option>
                        <option value="Emas">Emas</option>
                        <option value="Uang">Uang Dan Surat Berharga</option>
                        <option value="Penghasilan">Penghasilan</option>
                        <option value="Perdagangan">Perdagangan</option>
                        <option value="Pertanian">Pertanian dan Buah Buahan</option>
                        <option value="Perusahaan">Perusahaan</option>
                    </select>
                </div>
            </div>
            @if ($selectedOption2 === 'Emas')
                <div class="px-4 pt-4">
                    <!-- Form untuk input Zakat Maal -->
                    <label class="font-semibold">Atas Nama</label>
                    <input 
                        type="text" 
                        id="atasNama" 
                        wire:model="atasNama" 
                        class="w-full px-2 py-2 mt-2 border border-gray-300 rounded md:w-96" 
                        placeholder="Isikan nama anda" 
                    />
                    @error('atasNama')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="flex flex-col mt-4 mb-4 space-x-4">
                        <label class="font-semibold">Jenis</label>
                        <div class="flex pt-2 space-x-6">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="jenis3" value="Pribadi" wire:model='jenis3'>
                                <span>Pribadi</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="jenis3" value="Entitas" wire:model='jenis3'>
                                <span>Entitas</span>
                            </label>
                        </div>
                        @error('jenis3')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <label class="font-semibold">Jumlah Emas (Dalam Gram)</label>
                    <input
                        oninput="formatMoney(this)" 
                        type="text" 
                        id="gram" 
                        wire:model="gram" 
                        wire:input.lazy="gramtoidr" 
                        class="w-full px-2 py-2 mt-2 mb-4 border border-gray-300 rounded md:w-96" 
                        placeholder="Isikan jumlah emas anda" 
                    />

                    <label class="font-semibold">Jumlah Emas (Dalam Rupiah)</label>
                        <div class="relative flex flex-col mb-4">
                            <div class="flex items-center justify-center">
                                <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 bg-gray-300 border border-black rounded h-9">Rp. </span>
                                <input 
                                    type="text" 
                                    value="{{ number_format($nilaiemas, 0, ',', '.') }}" 
                                    class="w-full py-1 pr-2 mt-2 bg-gray-300 border border-black rounded h-9 pl-14 md:w-96" 
                                    placeholder="Rp. 0" 
                                    readonly 
                                />
                            </div>
                        </div>

                    <label class="font-semibold">Nisab per Tahun</label>
                        <div class="relative flex flex-col mb-4">
                            <div class="flex items-center justify-center">
                                <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 bg-gray-300 border border-black rounded h-9">Rp. </span>
                                <input 
                                    type="text" 
                                    value="{{ number_format($nisab, 0, ',', '.') }}" 
                                    class="w-full py-1 pr-2 mt-2 bg-gray-300 border border-black rounded h-9 pl-14 md:w-96" 
                                    placeholder="Rp. 0" 
                                    readonly 
                                />
                            </div>
                        </div>

                        @if ($zakatEmas === 0)
                        <div class="flex items-center justify-center my-4">                          
                            <span class="text-gray-400">jumlah emas anda belum memenuhi nisab</span>
                        </div>
                        @elseif ($zakatEmas != 0)
                            <label class="font-semibold">Jumlah Wajib Zakat Yang Harus Dibayarkan (2,5% Dari Nilai Emas)</label>
                            <div class="relative flex flex-col mt-2 mb-4">
                                <div class="flex items-center justify-center">
                                    <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 border border-black rounded h-9">Rp. </span>
                                    <input 
                                    type="text" 
                                    value="{{ number_format($zakatEmas, 0, ',', '.') }}" 
                                    class="w-full py-1 pr-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                                    placeholder="Rp. 0" 
                                    readonly 
                                    />
                                </div>
                            </div>
                        @endif
                        @if ($zakatEmas === 0)
                            <livewire:ziwaf.zakat.niat>
                            <div class="flex items-center justify-center mt-4">
                                <button wire:click="maalEmas" class="w-full px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                    Hitung Zakat
                                </button>
                            </div>
                        @elseif ($zakatEmas != 0)
                            <livewire:ziwaf.zakat.niat>
                            <div class="flex items-center justify-center mt-4">
                                <button id="user-menu-btn" wire:click="submitZakat" class="w-full px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                    Zakat Sekarang
                                </button>
                            </div>
                        @else
                            <livewire:ziwaf.zakat.niat>
                            <div class="flex items-center justify-center mt-4">
                                <button wire:click="maalEmas" class="w-full px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                    Hitung Zakat
                                </button>
                            </div>
                        @endif
                </div>
                
                
            @elseif ($selectedOption2 === 'Perusahaan')
                @if ($jenisPerusahaan === 'jasa')
                    <div class="px-4 py-2">
                        <div class="flex justify-center py-4 space-x-2 bg-white">
                            <div class="flex justify-center w-1/2 font-bold border-b-4 border-green-500 cursor-pointer">
                                <a wire:click='jasa'>
                                    <span class="text-green-500 text-center text-[12px]">
                                        Jasa
                                    </span>
                                </a>
                            </div>
                            <div class="flex justify-center w-1/2 font-bold border-b-2 cursor-pointer">
                                <a wire:click='dagang'>
                                    <span class="text-center text-[12px]">
                                        Dagang/Industri
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- Form untuk input Zakat Maal -->
                        <div class="mb-4">
                            <label class="font-semibold">Atas Nama</label>
                        <input 
                            type="text" 
                            id="atasNama" 
                            wire:model="atasNama" 
                            class="w-full px-2 py-1 mt-2 border border-gray-300 rounded md:w-96" 
                            placeholder="Isikan nama anda" 
                        />
                        @error('atasNama')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                        </div>
                    
                        <label class="font-semibold">Pendapatan sebelum pajak (tahun)</label>
                        <div class="relative flex items-center justify-center mb-4">
                            <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 bg-gray-300 rounded h-9">Rp. </span>
                            <input 
                                oninput="formatMoney(this)"
                                type="text" 
                                id="pendapatan" 
                                wire:model.lazy="pendapatan" 
                                wire:input="pendapatan" 
                                class="w-full px-2 py-1 mt-2 mb-3 border border-gray-300 rounded pl-14 h-9" 
                                placeholder="Isikan dengan jumlah asset dalam 1 tahun" 
                            />
                        </div>

                        <label class="font-semibold">Nisab per Tahun</label>
                        <div class="relative flex flex-col mb-4">
                                <div class="flex items-center justify-center">
                                    <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 bg-gray-300 border border-black rounded h-9">Rp. </span>
                                    <input 
                                        type="text" 
                                        value="{{ number_format($nisab, 0, ',', '.') }}" 
                                        class="w-full py-1 pr-2 mt-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                                        placeholder="Rp. 0" 
                                        readonly 
                                    />
                                </div>

                            </div>

                            @if ($zakatJasa === 0)
                            <div class="flex items-center justify-center my-4">                          
                                <span class="text-gray-400">Harta anda belum masuk nisab</span>
                            </div>
                            @elseif ($zakatJasa != 0)
                                <label class="font-semibold">Jumlah Wajib Zakat Yang Harus Dibayarkan</label>
                                <div class="relative flex flex-col mb-4">
                                    <div class="flex items-center justify-center">
                                    <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 bg-gray-300 border border-black rounded h-9">Rp. </span>
                                        <input 
                                        type="text" 
                                        value="{{ number_format($zakatJasa, 0, ',', '.') }}" 
                                        class="w-full py-1 pr-2 mt-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                                        placeholder="Rp. 0" 
                                        readonly 
                                        />
                                    </div>
                                </div>
                            @endif
                            @if ($zakatJasa === 0)
                                <livewire:ziwaf.zakat.niat>
                                <div class="flex items-center justify-center mt-4">
                                    <button wire:click="maalJasa" class="w-full px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                        Hitung Zakat
                                    </button>
                                </div>
                            @elseif ($zakatJasa != 0)
                                <livewire:ziwaf.zakat.niat>
                                <div class="flex items-center justify-center mt-4">
                                    <button id="user-menu-btn" wire:click="submitZakat" class="w-full px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                        Zakat Sekarang
                                    </button>
                                </div>
                            @else
                                <livewire:ziwaf.zakat.niat>
                                <div class="flex items-center justify-center mt-4">
                                    <button wire:click="maalJasa" class="w-full px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                        Hitung Zakat
                                    </button>
                                </div>
                            @endif
                    </div>
                
                        
                @elseif ($jenisPerusahaan === 'dagang')
                    <div class="px-4 py-2">
                        <div class="flex justify-center py-4 space-x-2 bg-white">
                            <div class="flex justify-center w-1/2 font-bold border-b-2 cursor-pointer">
                                <a wire:click='jasa'>
                                    <span class="text-center text-[12px]">
                                        Jasa
                                    </span>
                                </a>
                            </div>
                            <div class="flex justify-center w-1/2 font-bold border-b-4 border-green-500 cursor-pointer">
                                <a wire:click='dagang'>
                                    <span class="text-center text-[12px] text-green-500">
                                        Dagang/Industri
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- Form untuk input Zakat Maal -->
                        <div class="mb-4">
                            <label class="font-semibold">Atas Nama</label>
                        <input 
                            type="text" 
                            id="atasNama" 
                            wire:model="atasNama" 
                            class="w-full px-2 py-1 mt-2 border border-gray-300 rounded md:w-96" 
                            placeholder="Isikan nama anda" 
                        />
                        @error('atasNama')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                        </div>
                        
                        <label class="font-semibold">Aktiva Lancar</label>
                        <input 
                            oninput="formatMoney(this)"
                            type="text" 
                            id="aktiva" 
                            wire:model.lazy="aktiva" 
                            wire:input="aktifpasif" 
                            class="w-full px-2 py-1 mt-2 mb-4 border border-gray-300 rounded" 
                            placeholder="Isikan dengan jumlah asset dalam 1 tahun" 
                        />
                        
                        <label class="font-semibold">Pasiva Lancar</label>
                        <input 
                            oninput="formatMoney(this)"
                            type="text" 
                            id="pasiva" 
                            wire:model.lazy="pasiva" 
                            wire:input="aktifpasif" 
                            class="w-full px-2 py-1 mt-2 mb-4 border border-gray-300 rounded" 
                            placeholder="Isikan dengan jumlah laba dalam 1 tahun" 
                        />
                        <label class="font-semibold">Nisab per Tahun</label>
                        <div class="relative flex flex-col mb-4">
                                <div class="flex items-center justify-center">
                                    <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 bg-gray-300 border border-black rounded h-9">Rp. </span>
                                    <input 
                                        type="text" 
                                        value="{{ number_format($nisab, 0, ',', '.') }}" 
                                        class="w-full py-1 pr-2 mt-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                                        placeholder="Rp. 0" 
                                        readonly 
                                    />
                                </div>

                            </div>

                            @if ($zakatDagang === 0)
                            <div class="flex items-center justify-center my-4">                          
                                <span class="text-gray-400">Harta anda belum masuk nisab</span>
                            </div>
                            @elseif ($zakatDagang != 0)
                                <label class="font-semibold">Jumlah Wajib Zakat Yang Harus Dibayarkan</label>
                                <div class="relative flex flex-col mb-4">
                                    <div class="flex items-center justify-center">
                                        <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 bg-gray-300 border border-black rounded h-9">Rp. </span>
                                        <input 
                                        type="text" 
                                        value="{{ number_format($zakatDagang, 0, ',', '.') }}" 
                                        class="w-full py-1 pr-2 mt-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                                        placeholder="Rp. 0" 
                                        readonly 
                                        />
                                    </div>
                                </div>
                            @endif
                            @if ($zakatDagang === 0)
                                <livewire:ziwaf.zakat.niat>
                                <div class="flex items-center justify-center mt-4">
                                    <button wire:click="maalDagang" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                        Hitung Zakat
                                    </button>
                                </div>
                            @elseif ($zakatDagang != 0)
                                <livewire:ziwaf.zakat.niat>
                                <div class="flex items-center justify-center mt-4">
                                    <button id="user-menu-btn" wire:click="submitZakat" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                        Zakat Sekarang
                                    </button>
                                </div>
                            @else
                                <livewire:ziwaf.zakat.niat>
                                <div class="flex items-center justify-center mt-4">
                                    <button wire:click="maalDagang" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                        Hitung Zakat
                                    </button>
                                </div>
                            @endif
                    </div>
                @endif

                    
                
                
            @elseif ($selectedOption2 === 'Perdagangan')
                <div class="px-4 py-2">
                    <!-- Form untuk input Zakat Maal -->
                    <label class="font-semibold">Atas Nama</label>
                    <input 
                        type="text" 
                        id="atasNama" 
                        wire:model="atasNama" 
                        class="w-full px-2 py-1 mt-2 border border-gray-300 rounded" 
                        placeholder="Isikan nama anda" 
                    />
                    @error('atasNama')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="flex flex-col mt-4 mb-4 space-x-4">
                        <label class="font-semibold">Jenis</label>
                        <div class="flex pt-2 space-x-6">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="jenis3" value="pribadi" wire:model='jenis3'>
                                <span>Pribadi</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="jenis3" value="entitas" wire:model='jenis3'>
                                <span>Entitas</span>
                            </label>
                        </div>
                        @error('jenis3')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <label class="font-semibold">Asset Lancar</label>
                    <input 
                        oninput="formatMoney(this)"
                        type="text" 
                        id="asset" 
                        wire:model.lazy="asset" 
                        wire:input="assetlaba" 
                        class="w-full px-2 py-1 mt-2 mb-4 border border-gray-300 rounded" 
                        placeholder="Isikan dengan jumlah aset dalam 1 tahun" 
                    />
                    
                    <label class="font-semibold">Laba</label>
                    <input 
                        oninput="formatMoney(this)"
                        type="text" 
                        id="laba" 
                        wire:model.lazy="laba" 
                        wire:input="assetlaba" 
                        class="w-full px-2 py-1 mt-2 mb-4 border border-gray-300 rounded" 
                        placeholder="Isikan dengan jumlah laba dalam 1 tahun" 
                    />

                    <label class="font-semibold">Jumlah</label>
                    <div class="relative flex items-center justify-center mb-4">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 bg-gray-300 border border-black rounded h-9 ">Rp. </span>
                        <input 
                            type="text" 
                            value="{{ number_format($totalassetlaba, 0, ',', '.') }}" 
                            class="w-full py-1 pr-2 mt-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                            readonly
                        />
                    </div>
                    <label class="font-semibold">Nisab per Tahun</label>
                    <div class="relative flex flex-col mb-4">
                            <div class="flex items-center justify-center">
                                <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 bg-gray-300 border border-black rounded h-9 ">Rp. </span>
                                <input 
                                    type="text" 
                                    value="{{ number_format($nisab, 0, ',', '.') }}" 
                                    class="w-full py-1 pr-2 mt-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                                    placeholder="Rp. 0" 
                                    readonly 
                                />
                            </div>
                        </div>

                        @if ($zakatPerdagangan === 0)
                        <div class="flex items-center justify-center my-4">                          
                            <span class="text-gray-400">Harta anda belum masuk nisab</span>
                        </div>
                        @elseif ($zakatPerdagangan != 0)
                            <label class="font-semibold">Jumlah Wajib Zakat Yang Harus Dibayarkan</label>
                            <div class="relative flex flex-col mb-4">
                                <div class="flex items-center justify-center">
                                    <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 bg-gray-300 border border-black rounded h-9 ">Rp. </span>
                                    <input 
                                    type="text" 
                                    value="{{ number_format($zakatPerdagangan, 0, ',', '.') }}" 
                                    class="w-full py-1 pr-2 mt-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                                    placeholder="Rp. 0" 
                                    readonly 
                                    />
                                </div>
                            </div>
                        @endif
                        @if ($zakatPerdagangan === 0)
                            <livewire:ziwaf.zakat.niat>
                            <div class="flex items-center justify-center mt-4">
                                <button wire:click="maalPerdagangan" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                    Hitung Zakat
                                </button>
                            </div>
                        @elseif ($zakatPerdagangan != 0)
                            <livewire:ziwaf.zakat.niat>
                            <div class="flex items-center justify-center mt-4">
                                <button id="user-menu-btn" wire:click="submitZakat" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                    Zakat Sekarang
                                </button>
                            </div>
                        @else
                            <livewire:ziwaf.zakat.niat>
                            <div class="flex items-center justify-center mt-4">
                                <button wire:click="maalPerdagangan" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                    Hitung Zakat
                                </button>
                            </div>
                        @endif
                </div>
                
                
                @elseif ($selectedOption2 === 'Penghasilan')
                <div class="px-4 py-2">
                    <!-- Form untuk input Zakat Maal -->
                    <label class="font-semibold">Atas Nama</label>
                    <input 
                        type="text" 
                        id="atasNama" 
                        wire:model="atasNama" 
                        class="w-full px-2 py-1 mt-2 border border-gray-300 rounded" 
                        placeholder="Isikan nama anda" 
                    />
                    @error('atasNama')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="flex flex-col mt-4 mb-4 space-x-4">
                        <label class="font-semibold">Jenis</label>
                        <div class="flex pt-2 space-x-6">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="jenis3" value="pribadi" wire:model='jenis3'>
                                <span>Pribadi</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="jenis3" value="entitas" wire:model='jenis3'>
                                <span>Entitas</span>
                            </label>
                        </div>
                        @error('jenis3')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <label class="font-semibold">Gaji Perbulan</label>
                    <div class="relative flex items-center justify-center mt-2 mb-4">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 rounded h-9">Rp. </span>
                        <input 
                            oninput="formatMoney(this)"
                            type="text" 
                            id="gaji" 
                            wire:model.lazy="gaji" 
                            wire:input="penghasilan" 
                            class="w-full py-1 pr-2 border border-gray-300 rounded h-9 pl-14" 
                            placeholder="Isikan dengan jumlah gaji anda dalam 1 bulan" 
                        />
                    </div>
                    
                    <label class="font-semibold">Penghasilan Lain Perbulan</label>
                    <div class="relative flex items-center justify-center mt-2 mb-4">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 rounded h-9">Rp. </span>
                        <input 
                            oninput="formatMoney(this)"
                            type="text" 
                            id="gaji2" 
                            wire:model.lazy="gaji2" 
                            wire:input="penghasilan" 
                            class="w-full py-1 pr-2 border border-gray-300 rounded h-9 pl-14" 
                            placeholder="Isikan dengan penghasilan lain anda dalam 1 bulan"
                        />
                    </div>

                    <label class="font-semibold">Total Penghasilan Perbulan</label>
                    <div class="relative flex items-center justify-center mt-2 mb-4">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 border border-black rounded h-9">Rp. </span>
                        <input 
                            type="text" 
                            value="{{ number_format($totalpenghasilan, 0, ',', '.') }}" 
                            class="w-full py-1 pr-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                            readonly
                        />
                    </div>
                    <label class="font-semibold">Nisab per Bulan</label>
                    <div class="relative flex flex-col mt-2 mb-4">
                            <div class="flex items-center justify-center">
                                <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 border border-black rounded h-9">Rp. </span>
                                <input 
                                    type="text" 
                                    value="{{ number_format($nisabbulan, 0, ',', '.') }}" 
                                    class="w-full py-1 pr-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                                    placeholder="Rp. 0" 
                                    readonly 
                                />
                            </div>
                        </div>

                        @if ($zakatPenghasilan === 0)
                        <div class="flex items-center justify-center my-4">                          
                            <span class="text-gray-400">Harta anda belum masuk nisab</span>
                        </div>
                        @elseif ($zakatPenghasilan != 0)
                            <label class="font-semibold">Jumlah Wajib Zakat Yang Harus Dibayarkan (2,5% Dari Jumlah Penghasilan)</label>
                            <div class="relative flex flex-col mt-2 mb-4">
                                <div class="flex items-center justify-center">
                                    <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 border border-black rounded h-9">Rp. </span>
                                    <input 
                                    type="text" 
                                    value="{{ number_format($zakatPenghasilan, 0, ',', '.') }}" 
                                    class="w-full py-1 pr-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                                    placeholder="Rp. 0" 
                                    readonly 
                                    />
                                </div>
                            </div>
                        @endif
                        @if ($zakatPenghasilan === 0)
                            <livewire:ziwaf.zakat.niat>
                            <div class="flex items-center justify-center mt-4">
                                <button wire:click="maalPenghasilan" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                    Hitung Zakat
                                </button>
                            </div>
                        @elseif ($zakatPenghasilan != 0)
                            <livewire:ziwaf.zakat.niat>
                            <div class="flex items-center justify-center mt-4">
                                <button id="user-menu-btn" wire:click="submitZakat" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                    Zakat Sekarang
                                </button>
                            </div>
                        @else
                            <livewire:ziwaf.zakat.niat>
                            <div class="flex items-center justify-center mt-4">
                                <button wire:click="maalPenghasilan" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                    Hitung Zakat
                                </button>
                            </div>
                        @endif
                </div>


                @elseif ($selectedOption2 === 'Pertanian')
                <div class="px-4 py-2">
                    <!-- Form untuk input Zakat Maal -->
                    <label class="font-semibold">Atas Nama</label>
                    <input 
                        type="text" 
                        id="atasNama" 
                        wire:model="atasNama" 
                        class="w-full px-2 py-1 mt-2 border border-gray-300 rounded" 
                        placeholder="Isikan nama anda" 
                    />
                    @error('atasNama')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="flex flex-col mt-4 mb-4 space-x-4">
                        <label class="font-semibold">Jenis</label>
                        <div class="flex pt-2 space-x-6">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="jenis3" value="pribadi" wire:model='jenis3'>
                                <span>Pribadi</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="jenis3" value="entitas" wire:model='jenis3'>
                                <span>Entitas</span>
                            </label>
                        </div>
                        @error('jenis3')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <label class="font-semibold">Harga Produk Per Kg</label>
                    <div class="relative flex items-center justify-center mt-2 mb-4">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 rounded">Rp. </span>
                        <input 
                            oninput="formatMoney(this)"
                            type="text" 
                            id="harga" 
                            wire:model.lazy="harga" 
                            wire:input="totalharga" 
                            class="w-full py-1 pr-2 border border-gray-300 rounded h-9 pl-14" 
                            placeholder="Isikan dengan perkiraan harga produk per kg" 
                        />
                    </div>
                    
                    <label class="font-semibold">Jumlah Produk (Kg)</label>
                    <input 
                        type="text" 
                        id="kg" 
                        wire:model.lazy="kg" 
                        wire:input="totalharga" 
                        class="w-full px-2 py-1 mt-2 mb-4 border border-gray-300 rounded" 
                        placeholder="Isikan dengan penghasilan anda yang lain" 
                    />

                    <label class="font-semibold">Jumlah</label>
                    <div class="relative flex items-center justify-center mt-2 mb-4">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 border border-black rounded h-9">Rp. </span>
                        <input 
                            type="text" 
                            value="{{ number_format($hargatotal, 0, ',', '.') }}" 
                            class="w-full py-1 pr-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                            readonly
                        />
                    </div>
                    
                    <div class="flex items-center justify-between w-full mt-6 mb-4">
                        <label for="diari" class="font-semibold">Diairi memakai alat ?</label>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="alat" wire:model="toggleValue" class="sr-only peer">
                            <div class="h-6 bg-gray-200 rounded-full w-11 peer-focus:outline-none peer peer-checked:bg-blue-600"></div>
                            <div class="absolute left-0.5 top-0.5 bg-white w-5 h-5 rounded-full transition-transform peer-checked:translate-x-5"></div>
                        </label>
                    </div>
                    
                    <label class="font-semibold">Nisab</label>
                    <div class="relative flex flex-col mt-2 mb-4">
                            <div class="flex items-center justify-center">
                                <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 border border-black rounded h-9">Rp. </span>
                                <input 
                                    type="text" 
                                    value="653 Kg" 
                                    class="w-full py-1 pr-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                                    placeholder="Rp. 0" 
                                    readonly 
                                />
                            </div>
                        </div>

                        @if ($zakatPertanian === 0)
                        <div class="flex items-center justify-center my-4">                          
                            <span class="text-gray-400">Harta anda belum masuk nisab</span>
                        </div>
                        @elseif ($zakatPertanian != 0)
                            <label class="font-semibold">Jumlah Wajib Zakat Yang Harus Dibayarkan</label>
                            <div class="relative flex flex-col mb-4">
                                <div class="flex items-center justify-center">
                                    <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 border border-black rounded h-9">Rp. </span>
                                    <input 
                                    type="text" 
                                    value="{{ number_format($zakatPertanian, 0, ',', '.') }}" 
                                    class="w-full py-1 pr-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                                    placeholder="Rp. 0" 
                                    readonly 
                                    />
                                </div>
                            </div>
                        @endif
                        @if ($zakatPertanian === 0)
                            <livewire:ziwaf.zakat.niat>
                            <div class="flex items-center justify-center mt-4">
                                <button wire:click="maalPertanian" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                    Hitung Zakat
                                </button>
                            </div>
                        @elseif ($zakatPertanian != 0)
                            <livewire:ziwaf.zakat.niat>
                            <div class="flex items-center justify-center mt-4">
                                <button id="user-menu-btn" wire:click="submitZakat" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                    Zakat Sekarang
                                </button>
                            </div>
                        @else
                            <livewire:ziwaf.zakat.niat>
                            <div class="flex items-center justify-center mt-4">
                                <button wire:click="maalPertanian" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                    Hitung Zakat
                                </button>
                            </div>
                        @endif
                </div>

                @elseif ($selectedOption2 === 'Uang')
                <div class="px-4 py-2">
                    <!-- Form untuk input Zakat Maal -->
                    <label class="font-semibold">Atas Nama</label>
                    <input 
                        type="text" 
                        id="atasNama" 
                        wire:model="atasNama" 
                        class="w-full px-2 py-1 mt-2 border border-gray-300 rounded" 
                        placeholder="Isikan nama anda" 
                    />
                    @error('atasNama')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="flex flex-col mt-4 mb-4 space-x-4">
                        <label class="font-semibold">Jenis</label>
                        <div class="flex pt-2 space-x-6">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="jenis3" value="pribadi" wire:model='jenis3'>
                                <span>Pribadi</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="jenis3" value="entitas" wire:model='jenis3'>
                                <span>Entitas</span>
                            </label>
                        </div>
                        @error('jenis3')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <label class="font-semibold">Nominal Uang</label>
                    <div class="relative flex items-center justify-center mt-2 mb-4">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 rounded h-9">Rp. </span>
                        <input 
                            oninput="formatMoney(this)"
                            type="text" 
                            id="uang" 
                            wire:model.lazy="uang" 
                            wire:input="kekayaan" 
                            class="w-full py-1 pr-2 border border-gray-300 rounded h-9 pl-14" 
                            placeholder="Isikan dengan jumlah uang anda dalam 1 tahun"
                        />
                    </div>

                    <label class="font-semibold">Surat Berharga Lainnya</label>
                    <div class="relative flex items-center justify-center mt-2 mb-4">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 rounded h-9">Rp. </span>
                        <input 
                            oninput="formatMoney(this)"
                            type="text" 
                            id="surat" 
                            wire:model.lazy="surat" 
                            wire:input="kekayaan" 
                            class="w-full py-1 pr-2 border border-gray-300 rounded h-9 pl-14" 
                            placeholder="Isikan dengan jumlah surat berharga anda dalam rupiah"
                        />
                    </div>

                    <label class="font-semibold">jumlah</label>
                    <div class="relative flex items-center justify-center mt-2 mb-4">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 border border-black rounded h-9">Rp. </span>
                        <input 
                            type="text" 
                            value="{{ number_format($totalkekayaan, 0, ',', '.') }}" 
                            class="w-full py-1 pr-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                            readonly
                        />
                    </div>
                    <label class="font-semibold">Nisab per Tahun</label>
                    <div class="relative flex flex-col mt-2 mb-4">
                            <div class="flex items-center justify-center">
                                <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 border border-black rounded h-9">Rp. </span>
                                <input 
                                    type="text" 
                                    value="{{ number_format($nisab, 0, ',', '.') }}" 
                                class="w-full py-1 pr-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                                    placeholder="Rp. 0" 
                                    readonly 
                                />
                            </div>
                        </div>

                        @if ($zakatUang === 0)
                        <div class="flex items-center justify-center my-4">                          
                            <span class="text-gray-400">Harta anda belum masuk nisab</span>
                        </div>
                        @elseif ($zakatUang != 0)
                            <label class="font-semibold">Jumlah Wajib Zakat Yang Harus Dibayarkan</label>
                            <div class="relative flex flex-col mt-2 mb-4">
                                <div class="flex items-center justify-center">
                                    <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 border border-black rounded h-9">Rp. </span>
                                    <input 
                                    type="text" 
                                    value="{{ number_format($zakatUang, 0, ',', '.') }}" 
                                    class="w-full py-1 pr-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                                    placeholder="Rp. 0" 
                                    readonly 
                                    />
                                </div>
                            </div>
                        @endif
                        @if ($zakatUang === 0)
                            <livewire:ziwaf.zakat.niat>
                            <div class="flex items-center justify-center mt-4">
                                <button wire:click="maalUang" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                    Hitung Zakat
                                </button>
                            </div>
                        @elseif ($zakatUang != 0)
                            <livewire:ziwaf.zakat.niat>
                            <div class="flex items-center justify-center mt-4">
                                <button id="user-menu-btn" wire:click="submitZakat" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                    Zakat Sekarang
                                </button>
                            </div>
                        @else
                            <livewire:ziwaf.zakat.niat>
                            <div class="flex items-center justify-center mt-4">
                                <button wire:click="maalUang" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                                    Hitung Zakat
                                </button>
                            </div>
                        @endif
                </div>
            @endif

        @elseif($selectedOption === 'fitrah')
            @if ($fitrah === 'true')
                <div class="px-4 py-2">
                    <label class="font-semibold">Jumlah Muzakki</label>
                    <input type="text"
                    id="jumlah" 
                    wire:model="jumlah" 
                    wire:input.lazy="hitung" 
                    class="w-full px-2 py-1 mt-2 border border-gray-300 rounded" 
                    placeholder="Isikan jumlah muzakki"
                    />
                    @error('jumlah')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                    
                    @if ($jumlah > 0)
                        <div class="mt-4">
                            <label class="font-semibold">Nama Muzakki</label>
                            @for ($i = 0; $i < $jumlah; $i++)
                                <div>   
                                    <input
                                        type="text"
                                        id="nama_{{ $i }}"
                                        wire:model="nama.{{ $i }}"
                                        wire:input="hitung"
                                        class="w-full px-2 py-1 mt-2 border border-gray-300 rounded"
                                        placeholder="Isi dengan nama lengkap"
                                    />
                                    @error("nama.$i")
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endfor
                        </div>
                    @endif
                    <div class="mt-4">
                        <label class="font-semibold">Total Zakat</label>
                        <input type="text"
                        readonly
                        value="{{ $total }} Paket"
                        class="w-full px-2 py-1 mt-2 mb-4 bg-gray-300 border border-gray-300 rounded" 
                        placeholder="Isi dengan nama lengkap"
                        />
                    </div>

                    <label class="font-semibold">Jumlah Wajib Zakat Yang Harus Dibayarkan</label>
                            <div class="relative flex flex-col mb-4">
                                <div class="flex items-center justify-center">
                                    <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 bg-gray-300 border border-black rounded h-9">Rp. </span>
                                    <input 
                                    type="text" 
                                    value="{{ number_format($zakatFitrah, 0, ',', '.') }}"
                                    class="w-full py-1 pr-2 mt-2 bg-gray-300 border border-black rounded h-9 pl-14" 
                                    placeholder="0" 
                                    readonly 
                                    />
                                </div>
                            </div>

                    <livewire:ziwaf.zakat.niat-fitrah>
                        
                    <div class="flex items-center justify-center mt-4">
                        <button id="user-menu-btn" wire:click="submitZakat" class="w-screen px-4 py-2 font-semibold text-white bg-green-500 rounded">
                            Zakat Sekarang
                        </button>
                    </div>
                </div>
            @else
                <div class="flex items-center justify-center">
                    <span class="mt-20 text-gray-400">Belum waktunya zakat fitrah</span>
                </div>
            @endif
        @endif
    </div>
    <!-- Tambahkan script untuk format angka dengan titik setiap 3 digit -->
    <script>
        function formatMoney(input) {
            let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Add dots for thousands
            input.value = value;
        }

        document.addEventListener('DOMContentLoaded', function () {
            if (!sessionStorage.getItem('ziwafRefreshed')) {
                sessionStorage.setItem('ziwafRefreshed', 'true');
                location.reload();
            }
        });

        window.addEventListener('reload-page', function() {
            window.location.reload();
        });
    </script>
</div>

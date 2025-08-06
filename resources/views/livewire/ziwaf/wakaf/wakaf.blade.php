<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Wakaf LAZISNU Cilacap" backUrl="{{ route('landing') }}"/>
    <div class="flex flex-col w-screen min-h-screen mt-12 bg-white  shadow-md md:w-[414px]">
        <livewire:ziwaf.navigation/>
        <div class="flex flex-col justify-center p-4">
                <h1 class="font-semibold">Pilih Program Wakaf</h1>
                <div class="relative w-full mt-2 mb-4 md:w-96">
                    <select wire:model="selectedOption" class="block w-full px-4 py-2 pr-8 leading-tight bg-white border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Pilih Program Wakaf</option>
                        @foreach ($pilihan_wakafs as $item)
                            <option value="{{ $item->pil_wakaf }}">{{ $item->pil_wakaf }}</option>
                        @endforeach
                    </select>
                    @error('selectedOption')
                        <span class="mt-2 text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
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

                    <div class="flex flex-col mt-4 space-x-4">
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
                <div class="relative w-full mt-4 mb-4 md:w-96">
                    <label class="font-semibold">Nominal Wakaf Anda</label>
                    <div class="relative flex items-center justify-center mt-2">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 rounded h-9">Rp. </span>
                        <input 
                            oninput="formatMoney(this)" 
                            id="wakaf" 
                            wire:model.lazy="wakaf" 
                            type="text" 
                            class="w-full py-1 pr-2 border border-gray-300 rounded h-9 pl-14" 
                            placeholder="0" 
                        />
                    </div>
                    @if ($wakaf > 0)
                        @error('wakaf2')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    @else
                        @error('wakaf')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    @endif
                </div>
                <div class="flex items-center justify-center mt-4">
                    <button wire:click="submitwaif" class="px-4 py-2 font-bold text-white bg-green-500 rounded w-96">
                        Wakaf Sekarang
                    </button>
            </div>
        </div>
    </div>
    <script>
        function formatMoney(input) {
            let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Add dots for thousands
            input.value = value;
        }
    </script>
</div>
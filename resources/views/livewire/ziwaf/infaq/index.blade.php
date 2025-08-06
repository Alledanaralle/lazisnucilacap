<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Infaq LAZISNU Cilacap" backUrl="{{ route('landing') }}"/>
    <div class="flex flex-col w-screen min-h-screen mt-12 bg-white shadow-md md:w-[414px]">
        <livewire:ziwaf.navigation />
        <form wire:submit.prevent="bayarInfaq">
            <div class="flex flex-col justify-center p-4">
                <div class="relativew-full md:w-96">
                        <label class="font-semibold">Pilih Program Infaq</label>
                        <select wire:model="jenis_ziwaf" class="block w-full px-4 py-2 pr-8 mt-2 leading-tight bg-white border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                            <option value={{ null }}>Pilih Program Infaq</option>
                            @foreach ($pilihan_infaqs as $item)
                                <option value="{{ $item->pil_infaq }}">{{ $item->pil_infaq }}</option>
                            @endforeach
                        </select>
                        @error('jenis_ziwaf')
                            <span class="mt-2 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <label class="mt-4 font-semibold">Atas Nama</label>
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
                        <label class="font-semibold">Nominal Infaq Kamu</label>
                        <div class="relative flex items-center justify-center mt-2">
                            <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 rounded h-9">Rp. </span>
                            <input 
                            type="hidden" 
                            name="nominal_infaq_raw" 
                            wire:model="nominal_infaq" 
                            />
                            <input 
                                data-input="nominal_infaq" 
                                type="text" 
                                class="w-full py-1 pr-2 border border-gray-300 rounded h-9 pl-14" 
                                placeholder="0" 
                                oninput="formatNumberInput(this)" 
                            />
                        </div>
                        @error('nominal_infaq')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-center mt-4">
                        <button class="px-4 py-2 font-semibold text-white bg-green-500 rounded w-96">
                            Infaq Sekarang
                        </button>
                    </div>
            </div>
        </form>
    </div>
</div>

<script>
    function formatNumberInput(input) {
        let value = input.value.replace(/\D/g, ''); // Remove all non-numeric characters
        let formattedValue = new Intl.NumberFormat('id-ID').format(value); // Format the number with dots
        
        // Update the displayed value
        input.value = formattedValue;

        // Update the raw value without the dots in Livewire
        let rawInput = document.querySelector('input[name="nominal_infaq_raw"]'); // Reference the hidden input
        rawInput.value = value;
        rawInput.dispatchEvent(new Event('input')); // Trigger Livewire's input update
    }
</script>


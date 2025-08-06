<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Fidyah LAZISNU Cilacap" BackUrl="{{ route('landing') }}"/>
    <div class="flex flex-col w-screen min-h-screen mt-12 pb-24 bg-white shadow-md md:w-[414px]">
        <livewire:ziwaf.navigation/>
        <form wire:submit.prevent="bayarFidyah">
            <div class="flex flex-col justify-center p-4">
                <div class="flex flex-col relativew-full md:w-96">
                    <label class="font-semibold">Jumlah Hari</label>
                    <div class="relative flex items-center justify-center mt-2">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 rounded h-9">Hari </span>
                        <input type="text"
                        class="w-full py-1 pl-16 pr-2 border border-gray-300 rounded h-9 md:w-96" 
                        placeholder="Isi Dengan Jumlah Hari" onkeyup="formatAndSync(this)" id="formattedInput">
                        <input type="hidden" wire:model.live="nominal" id="rawInput">
                    </div>
                    @error('nominal')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                    
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
                    
                    <label class="mt-4 font-semibold">Nominal Fidyah</label>
                    <div class="relative flex flex-col mb-4">
                        <div class="flex items-center justify-center">
                            <span class="absolute inset-y-0 left-0 flex items-center px-3 mt-2 bg-gray-300 border border-black rounded h-9">Rp. </span>
                            <input 
                            oninput="formatMoney(this)"
                            type="text"   
                            class="w-full py-1 pr-2 mt-2 bg-gray-300 border border-black rounded h-9 pl-14 md:w-96" 
                            id="nominalFidyahDisplay" placeholder="Minimal donasi"
                            value="{{ number_format($nominal_fidyah, 0, ',', '.') }}"
                            readonly
                            />
                        </div>
                </div>
                    
                <div class="flex items-center justify-center w-full py-4 space-x-4">
                    <button type="submit"
                        class="items-center w-full px-16 py-2 font-bold text-white bg-green-500 rounded">
                        Bayar Sekarang
                    </button>
                </div>
            </div>
            </div>
        </form>
    </div>
</div>

<script>
    function formatAndSync(input) {
        let rawValue = input.value.replace(/\D/g, ''); 
        let formattedValue = rawValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); 
        input.value = formattedValue; 
        document.getElementById('rawInput').value = rawValue;
        Livewire.find(document.querySelector('[wire\\:id]').getAttribute('wire:id')).set('nominal', rawValue);
    }
    document.addEventListener('livewire:load', function () {
        Livewire.hook('message.processed', (message, component) => {
            let fidyahValue = @this.nominal_fidyah;
            let formattedFidyahValue = fidyahValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            document.getElementById('nominalFidyahDisplay').value = formattedFidyahValue;
        });
    });
</script>

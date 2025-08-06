<div class="flex flex-col items-center justify-center ">
    <x-nav-mobile2 title="Nominal Donasi" :backUrl="route('donasi.index', $campaign->title)" />
    <div class=" w-full max-w-[414px] mx-auto bg-gray-100 py-4">
        <div class="w-full ">
            <!-- Kategori and Filter Buttons -->
            <div class="flex items-center justify-between">
                <!-- Campaign Cards -->
                <div class="flex grid items-center justify-center w-full h-auto grid-cols-1">
                    <div class="z-5 flex flex-grow h-[100px] px-4 ">
                        <div
                            class="z-0 relative group flex justify-center items-center w-[220px] h-full overflow-hidden">
                            <img src="{{ asset('storage/images/campaign/' . $campaign->main_picture) }}" alt="Picture"
                                class="object-cover w-full h-full hover:cursor-pointer">
                            <div
                                class="hover:cursor-pointer absolute inset-0 flex items-center justify-center bg-green-600 bg-opacity-80 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="text-white text-lg text-center">View Campaign</p>
                            </div>
                        </div>
                        <div class="px-3  w-4/5 ">
                            <p class="text-[12px] text-gray-400">
                                Anda akan berdonasi untuk campaign
                            </p>
                            <p class="text-[14px] font-semibold text-gray-800">
                                {{ \Illuminate\Support\Str::limit($campaign->title, 40, '...') }}
                            </p>
                            <div class="flex items-center mt-1">
                                <img src="{{ asset('images/icon_location.png') }}" alt="pinpoint" class="w-3 h-3">
                                <p class="pl-1 text-[10px]  text-gray-600">{{ $campaign->lokasi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-4 mt-4">
                <!-- Donation Options -->
                <form wire:submit="pembayaran">

                    <div class="w-full flex-col items-center space-y-4">
                        <div class="flex-col items-center pt-2 w-full">
                            <p class="text-[12px] font-semibold text-black">
                                Nominal Donasi
                            </p>

                            <!-- Disabled input for displaying the formatted value -->
                            <div class="flex items-center w-full rounded-lg border">
                                <p class="px-2">Rp</p>

                                <input type="text"
                                    class="w-full border  p-1 focus:outline-none focus:ring-2 focus:ring-green-500"
                                    wire:model="formattedDisplay" disabled>
                            </div>

                            <span class="text-[12px] text-red-400">Nominal Dibulatkan *</span>
                            <!-- Hidden input to store the raw value, bound to Livewire -->
                            <input type="hidden" wire:model="nominal" id="rawInput">

                            @error('nominal')
                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <p class="text-[14px] font-semibold text-black">
                                Mohon Lengkapi Data Di Bawah
                            </p>
                            @if (!Auth::check())
                                <p class="text-[12px]  mb-4">Sudah Punya Akun? <a href="/login"
                                        class="text-green-500 hover:underline">Login</a></p>
                            @endif
                        </div>
                        <div class="flex-col items-center w-full">
                            <p class="text-[12px] font-semibold text-black">
                                Nama Anda
                            </p>
                            <input type="text"
                                class=" w-full border rounded-lg p-1 focus:outline-none focus:ring-2 focus:ring-green-500"
                                wire:model="username">
                            @error('username')
                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="toggle" class="flex justify-between items-center cursor-pointer">
                                <div class="text-[12px] font-semibold text-black">Sembunyikan Nama (Hamba Allah)</div>
                                <div class="relative">
                                    <input id="toggle" type="checkbox" wire:model="toggleValue" class="sr-only" />
                                    <div class="block bg-gray-200 w-9 h-5 rounded-full"></div>
                                    <div class="dot absolute left-1 top-1 bg-white w-3 h-3 rounded-full transition">
                                    </div>
                                </div>
                            </label>
                        </div>


                        <div class="flex-col items-center w-full">
                            <p class="text-[12px] font-semibold text-black">
                                No Whatshapp
                            </p>
                            <input type="number"
                                class=" w-full border rounded-lg p-1 focus:outline-none focus:ring-2 focus:ring-green-500"
                                wire:model="no_telp">
                            @error('no_telp')
                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex-col items-center w-full">
                            <p class="text-[12px] font-semibold text-black">
                                Email
                            </p>
                            <input type="email"
                                class=" w-full border rounded-lg p-1 focus:outline-none focus:ring-2 focus:ring-green-500"
                                wire:model="email">
                            @error('email')
                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex-col items-center w-full">
                            <p class="text-[12px] font-semibold text-black">
                                Alamat
                            </p>
                            <input type="text"
                                class=" w-full border rounded-lg p-1 focus:outline-none focus:ring-2 focus:ring-green-500"
                                wire:model="alamat">
                            @error('alamat')
                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex-col items-center w-full">
                            <p class="text-[12px] font-semibold text-black">
                                Kirim kan Doa Anda
                            </p>
                            <textarea type="text"
                                class=" w-full border rounded-lg h-8 focus:outline-none focus:ring-2 focus:ring-green-500 resize-none overflow-hidden"
                                wire:model="doa" oninput="autoResize(this)">    
                            </textarea>
                            @error('doa')
                                <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex-col items-center w-full">
                            <button type="submit"
                                class="text-[12px] bg-green-600 w-full py-2 items-center text-white rounded-lg">
                                Donasi Sekarang
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function autoResize(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = textarea.scrollHeight + 'px';
    }
    document.addEventListener('livewire:load', function() {
        // Hook into Livewire to observe changes to the 'nominal' value
        Livewire.hook('message.processed', (message, component) => {
            // Get the raw nominal value from the Livewire model
            let rawNominalValue = @this.nominal;

            // Format the nominal value with dots (thousands separators)
            let formattedNominalValue = rawNominalValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                '.');

            // Set the formatted value in the disabled input for display
            document.getElementById('formattedDisplay').value = formattedNominalValue;

            // Ensure the hidden input holds the real raw value
            document.getElementById('rawInput').value = rawNominalValue;
        });
    });
</script>

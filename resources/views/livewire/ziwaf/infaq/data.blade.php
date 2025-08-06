<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Infaq LAZISNU Cilacap" backUrl="{{ route('infaq.index') }}"/>
    <div class="flex flex-col w-full h-full min-h-screen pb-24 bg-white shadow-md md:w-[414px]">
        <div class="w-full p-6 ">
            <h2 class="text-[12px] text-gray-500 mb-4">Anda Akan Melakukan Pembayaran Untuk Infaq</h2>
            <form wire:submit="bayarInfaq">
                <div class="flex flex-col">
                    <span class="mb-2">
                        Detail Infaq
                    </span>
                    <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">Jenis infaq</div>
                    <div class="w-4 text-gray-500text-center">:</div>
                    <div>{{ $jenis }}</div>
                </div>  
                <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">Nama program</div>
                    <div class="w-4 text-sm text-gray-500text-center">:</div>
                    <div>{{ $jenis_ziwaf }}</div>
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
                                value="{{ number_format($this->nominal_infaq, 0, ',', '.') }}" 
                                class="w-full py-1 pr-2 text-green-500 bg-gray-300 border border-black rounded pl-14 h-9" 
                                placeholder="Rp. 0" 
                                readonly 
                            />
                    </div>
                </div>
                <h3 class="text-[16px] font-semibold  mb-2">Mohon Lengkapi Data Berikut</h3>
                @if (!Auth::check())
                    <p class="text-[12px]  mb-4">Sudah Punya Akun? <a href="/login"
                            class="text-green-500 hover:underline">Login</a></p>
                @endif
                <div class="mb-4">
                    <label class="block text-sm font-bold ">Nama Anda *</label>
                    <input type="text" wire:model="username"
                        class="mt-2 text-[12px] block w-full p-2 border border-border rounded-md bg-input text-foreground"
                        placeholder="Isikan nama anda" />
                    @error('username')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold ">No Telepon (WhatsApp Aktif) *</label>
                    <input type="tel" wire:model="no_telp"
                        class="mt-2 text-[12px] block w-full p-2 border border-border rounded-md bg-input text-foreground"
                        placeholder="Isikan no whatsapp anda" />
                    @error('no_telp')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-bold ">Email (opsional)</label>
                    <input type="email" wire:model="email"
                        class="mt-2 text-[12px] block w-full p-2 border border-border rounded-md bg-input text-foreground"
                        placeholder="Isikan Email Anda" />
                    @error('email')
                        <span class="mt-2 text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <p class="text-[10px]  mb-4">
                    Data pribadi Anda akan digunakan untuk memproses pesanan Anda, menunjang pengalaman Anda di seluruh
                    situs web ini, dan untuk tujuan lain yang dijelaskan dalam
                    <a href="/ziwaf/KebijakanPrivasi" class="text-blue-500 hover:underline">kebijakan privasi</a> kami.
                </p>
                <button type="submit" class="w-full p-2 text-white bg-green-500 rounded-md">Bayar Infaq
                    Sekarang</button>
            </form>
        </div>
    </div>
</div>
<script>
    function formatInput(input) {
        let value = input.value.replace(/\D/g, ''); // Remove any non-digit characters
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Add dot every 3 digits
        input.value = value;
    }
</script>
<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Fidyah LAZISNU Cilacap" backUrl="{{ route('fidyah.index') }}" />
    <div class="flex flex-col w-screen h-full min-h-screen pb-24 bg-white shadow-md md:w-[414px]">
        <div class="w-full p-6 ">
            <h2 class="text-[12px] text-gray-500 mb-4">Anda Akan Melakukan Pembayaran Untuk Fidyah</h2>
            <form wire:submit="bayarFidyah">
                <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">Atas nama</div>
                    <div class="w-4 text-center text-gray-500">:</div>
                    <div>{{ $atasNama }}</div>
                </div>

                <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">Hari</div>
                    <div class="w-4 text-center text-gray-500">:</div>
                    <div>{{ $hari }}</div>
                </div>

                <label class="font-bold text-md">Nominal</label>
                <div class="relative flex items-center justify-center mt-2 mb-4 text-black-500">
                    <span
                        class="absolute inset-y-0 left-0 flex font-bold items-center px-3 bg-gray-300 rounded h-9 text-[14px] border border-gray-400">Rp.
                    </span>
                    <input type="text"
                        class="w-full py-1 pr-2 border border-gray-400 font-bold rounded h-9 pl-14 text-[14px] bg-gray-300"
                        id="nominalField" value="{{ $nominal }}" disabled />
                </div>

                <h3 class="text-[16px] font-semibold  mb-2">Mohon Lengkapi Data Berikut</h3>
                @if (!Auth::check())
                    <p class="text-[12px]  mb-4">Sudah Punya Akun? <a href="/login"
                            class="text-green-500 hover:underline">Login</a></p>
                @endif
                <div class="mb-4">
                    <label class="block text-sm font-bold ">Nama Anda *</label>
                    <input type="text" wire:model="username"
                        class="mt-1 text-[12px] block w-full p-2 border border-border rounded-md bg-input text-foreground"
                        placeholder="Isikan nama anda" />
                    @error('username')
                        <span class="mt-2 text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold ">No Telepon (WhatsApp Aktif) *</label>
                    <input type="tel" wire:model="no_telp"
                        id="no_telp"
                        class="mt-1 text-[12px] block w-full p-2 border border-border rounded-md bg-input text-foreground"
                        placeholder="Isikan no whatsapp anda" />
                    @error('no_telp')
                        <span class="mt-2 text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold ">Email (opsional)</label>
                    <input type="email" wire:model="email"
                        class="mt-1 text-[12px] block w-full p-2 border border-border rounded-md bg-input text-foreground"
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
                <button type="submit" class="w-full p-2 font-bold text-white bg-green-500 rounded-md">Bayar Fidyah
                    Sekarang</button>
            </form>
        </div>
    </div>
</div>
<script>
    // Function to format the nominal value
    function formatNominal(nominal) {
        nominal = nominal.replace(/\D/g, ''); // Remove any non-digit characters

        if (nominal === '') {
            return '';
        }

        // Add dot as thousand separator every 3 digits
        return nominal.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    // Apply format on page load
    document.addEventListener('DOMContentLoaded', function() {
        const nominalField = document.getElementById('nominalField');

        // Get the PHP value (assumed to be already set as `nominalField.value`)
        let formattedValue = formatNominal(nominalField.value);
        nominalField.value = formattedValue; // Set the formatted value
    });
    document.getElementById('no_telp').addEventListener('input', function (e) {
        let value = e.target.value;
        value = value.replace(/[^0-9+]/g, '');
        e.target.value = value;
    });

</script>

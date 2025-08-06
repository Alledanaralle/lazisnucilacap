<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Pengajuan" backUrl="{{ route('landing') }}"/>
    <div class="flex flex-col h-full min-h-screen bg-white shadow-md md:w-[414px] w-screen">
        <div class="mx-[24px] bg-white ">
            <h2 class="text-[14px] font-semibold text-green-600 mt-4">FORMULIR PENGAJUAN UMUM</h2>

            <form wire:submit="create">
                <input type="text" hidden wire:model="id_user">
                <!-- Nama Anda -->
                <div class="mt-3">
                    <label class="block text-gray-700  font-bold mb-2 text-[12px]" for="nama-anda">
                        Nama Anda
                    </label>
                    <input wire:model="username"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        id="nama-anda" type="text" placeholder="Isikan nama anda">
                    @error('username')
                        <span class="mt-2 text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- No Telepon -->
                <div class="mt-3">
                    <label class="block text-gray-700  font-bold mb-2 text-[12px]" for="no-telepon">
                        No Telepon
                    </label>
                    <input wire:model="no_telp"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        id="no-telepon" type="text" placeholder="Isikan no WhatsApp anda">
                    @error('no_telp')
                        <span class="mt-2 text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Jenis Pemohon -->
                <div class="mt-3">
                    <label class="block text-gray-700  font-bold mb-2 text-[12px]" for="jenis-pemohon">
                        Jenis Pemohon
                    </label>
                    <select wire:model="jenis_pemohon"
                        class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border border-gray-300 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                        id="jenis-pemohon">
                        <option value="{{ null }}">Jenis Pemohon</option>
                        <option value="Entitas">Entitas</option>
                        <option value="Perseorangan">Perseorangan</option>
                    </select>
                    @error('jenis_pemohon')
                        <span class="mt-2 text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Keterangan -->
                <div class="mt-3">
                    <label class="block text-gray-700  font-bold mb-2 text-[12px]" for="keterangan">
                        Keterangan
                    </label>
                    <textarea wire:model="keterangan"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        id="keterangan" rows="4" placeholder="Keterangan"></textarea>
                    @error('keterangan')
                        <span class="mt-2 text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tanggal Pelaksanaan -->
                <div class="mt-3">
                    <label class="block text-gray-700 font-bold mb-2 text-[12px]" for="tanggal-pelaksanaan">
                        Tanggal Pelaksanaan
                    </label>
                    <input wire:model="tanggal_pelaksanaan"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        id="tanggal-pelaksanaan" type="date">
                    @error('tanggal_pelaksanaan')
                        <span class="mt-2 text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nominal Pengajuan -->
                <div class="mt-3">
                    <label class="block text-gray-700  font-bold mb-2 text-[12px]" for="nominal-pengajuan">
                        nominal pengajuan
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 bg-gray-300 rounded h-9">Rp. </span>
                        <input wire:model="nominal"
                            oninput="formatMoney(this)"
                            class="w-full py-1 pr-2 border border-gray-300 rounded h-9 pl-14" 
                            id="nominal-pengajuan" type="text" placeholder="Isikan dengan nominal pengajuan">
                        @error('nominal')
                            <span class="mt-2 text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Jumlah Penerima -->
                <div class="mt-3">
                    <label class="block text-gray-700  font-bold mb-2 text-[12px]" for="jumlah-penerima">
                        Jumlah Penerima
                    </label>
                    <input wire:model="jumlah_penerima"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        id="jumlah-penerima" type="text" placeholder="Isikan dengan Jumlah Penerima">
                    @error('jumlah_penerima')
                        <span class="mt-2 text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Kirim Button -->
                <div class="mt-3">
                    <button
                        class="w-full px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-600 focus:outline-none focus:shadow-outline"
                        type="submit">
                        kirim
                    </button>
                </div>
            </form>
        </div>
        <div style="height: 67px "></div>
    </div>
    <script>
        function formatMoney(input) {
                let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
                value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Add dots for thousands
                input.value = value;
            }
            
        // Set the min attribute to today's date
        document.addEventListener('DOMContentLoaded', () => {
            const dateInput = document.getElementById('tanggal-pelaksanaan');
            const today = new Date().toISOString().split('T')[0]; // Format: YYYY-MM-DD
            dateInput.setAttribute('min', today); // Disable dates after today
        });


</script>
</div>

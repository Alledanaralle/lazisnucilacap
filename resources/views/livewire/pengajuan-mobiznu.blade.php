<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Pengajuan Mobiznu" />
    <div class="flex flex-col min-h-screen bg-white shadow-md md:w-[414px] w-screen">
        <div class="flex flex-col py-4 px-[24px]">
            <div>
                @if (session()->has('message'))
                    <div id="flash-message"
                        class="flex items-center justify-between p-4 mx-12 mt-8 mb-4 text-white bg-green-500 rounded">
                        <span>{{ session('message') }}</span>
                        <button class="p-1" onclick="document.getElementById('flash-message').style.display='none'"
                            class="font-bold text-white">
                            &times;
                        </button>
                    </div>
                @endif
            </div>
            <h1 class="font-semibold text-green-500">
                Formulir Layanan Mobiznu
            </h1>
            <form wire:submit.prevent="save">
                <!-- Nama dan No Telepon -->
                <div class="flex flex-col pt-2">
                    <h1 class="py-2 text-sm font-semibold">
                        Nama Anda
                    </h1>
                    <input type="text" id="nama" wire:model.lazy="nama" wire:input="nama"
                        class="w-full px-2 py-1 border border-gray-300 rounded" placeholder="Isikan nama anda" />
                    @error('nama')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <h1 class="py-2 text-sm font-semibold">
                        No Telepon (Whatsapp Aktif)
                    </h1>
                    <input type="text" id="no_telp" wire:model.lazy="no_telp" wire:input="no_telp"
                        class="w-full px-2 py-1 border border-gray-300 rounded"
                        placeholder="Isikan No Telepon anda" />
                    @error('no_telp')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Dropdown Keperluan -->
                <div class="flex flex-col pt-2">
                    <h1 class="py-2 text-sm font-semibold">
                        Jenis Pelayanan Ambulance
                    </h1>
                    <select id="jenis" wire:model.lazy="jenis" name="jenis"
                        class="block w-full py-2 pl-3 pr-10 mt-1 text-gray-900 bg-white border border-gray-300 rounded focus:border-indigo-500 focus:ring focus:ring-indigo-500 sm:text-sm">
                        <option value="" disabled selected>Pilih Jenis</option>
                        <option value="Pasien">Pasien</option>
                        <option value="Jenazah">Jenazah</option>
                    </select>
                    @error('jenis')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Dropdown Jenis: Tampil Jika Keperluan = "Pasien" -->
                <div class="flex flex-col pt-2">
                    <h1 class="py-2 text-sm font-semibold">
                        Keperluan
                    </h1>
                    @if ($jenis === 'Pasien')
                        <select id="keperluan" wire:model.lazy="keperluan" name="keperluan"
                            class="block w-full py-2 pl-3 pr-10 mt-1 text-gray-900 bg-white border border-gray-300 rounded focus:border-indigo-500 focus:ring focus:ring-indigo-500 sm:text-sm">
                            <option value="" disabled selected>Pilih Keperluan</option>
                            <option value="Kontrol">Kontrol</option>
                            <option value="Operasi">Operasi</option>
                            <option value="Rawat Inap">Rawat Inap</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    @elseif ($jenis === 'Jenazah')
                        <select id="keperluan" wire:model="keperluan" name="keperluan"
                            class="block w-full py-2 pl-3 pr-10 mt-1 text-gray-900 bg-white border border-gray-300 rounded focus:border-indigo-500 focus:ring focus:ring-indigo-500 sm:text-sm">
                            <option value="" disabled selected>Pilih Keperluan</option>
                            <option value="Pengantaran Jenazah">Pengantaran Jenazah</option>
                        </select>    
                    @else
                        <select id="keperluan" wire:model="keperluan" name="keperluan"
                            class="block w-full py-2 pl-3 pr-10 mt-1 text-gray-900 bg-white border border-gray-300 rounded focus:border-indigo-500 focus:ring focus:ring-indigo-500 sm:text-sm">
                            <option value="" disabled selected>keperluan</option>
                        </select>
                    @endif
                        @error('keperluan')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                </div>
                <div class="flex flex-col pt-2">
                    @if ($keperluan === 'Lainnya')
                        <h1 class="py-2 text-sm font-semibold">
                            Keperluan (Lainnya)
                        </h1>
                        <input type="text" id="lainnya" wire:model.lazy="lainnya" wire:input="lainnya"
                            class="w-full px-2 py-1 border border-gray-300 rounded"
                            placeholder="Isikan dengan keperluan anda" />

                    @else
                        
                    @endif
                        @error('lainnya')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                </div>
                <div class="flex flex-col">
                    <h1 class="py-2 text-sm font-semibold">
                        Tanggal layanan
                    </h1>
                    <input type="date" id="tanggal" wire:model.lazy="tanggal" min="{{ date('Y-m-d') }}"
                        class="w-full px-2 py-1 border border-gray-300 rounded"/>
                    @error('tanggal')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <h1 class="py-2 text-sm font-semibold">
                        waktu Penjemputan
                    </h1>
                    <input type="time" id="waktu_jemput" wire:model.lazy="waktu_jemput" wire:input="waktu_jemput"
                        class="w-full px-2 py-1 border border-gray-300 rounded"/>
                    @error('waktu_jemput')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <h1 class="py-2 text-sm font-semibold">
                        Alamat Penjemputan
                    </h1>
                    <textarea type="text" id="jemput" wire:model.lazy="jemput" wire:input="jemput"
                        class="w-full px-2 py-1 border border-gray-300 rounded" rows="3"></textarea>
                    @error('jemput')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <h1 class="py-2 text-sm font-semibold">
                        Alamat tujuan
                    </h1>
                    <textarea type="text" id="tujuan" wire:model.lazy="tujuan" wire:input="tujuan"
                        class="w-full px-2 py-1 border border-gray-300 rounded" rows="3"></textarea>
                    @error('tujuan')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="py-4">
                    <button type="submit"
                        class="px-4 py-2 ml-64 font-bold text-white bg-green-500 rounded hover:bg-green-700">
                        Submit
                    </button>
                </div>
            </form>
            <div class="mb-16"></div>
        </div>
    </div>
</div>

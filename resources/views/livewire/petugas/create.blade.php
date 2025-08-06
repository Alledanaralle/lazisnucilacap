<div x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
    <!-- Button to open the modal -->
    <button @click="isOpen=true" class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">Create</button>

    <!-- Modal Background -->
    <div x-show="isOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-600 bg-opacity-75">
        <!-- Modal Content -->
        <div class="w-1/2 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 bg-gray-200 rounded-t-lg">
                <h3 class="text-xl font-semibold">Tambah Petugas</h3>
                <div @click="isOpen=false" class="px-3 rounded-sm shadow hover:bg-red-500">
                    <button class="text-gray-900">&times;</button>
                </div>
            </div>
            <div class="p-4">

                <form wire:submit="save">
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Petugas</label>
                        <input type="text" id="nama" wire:model="nama" name="nama"
                            class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                        @error('nama')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="no" class="block text-sm font-medium text-gray-700">No Telepon (62)</label>
                        <input type="text" id="no" wire:model="no" name="no"
                            class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                        @error('no')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="bagian" class="block text-sm font-medium text-gray-700">Bagian</label>
                        <select id="bagian" wire:model="bagian" name="bagian"
                            class="block w-full py-2 mt-1 bg-gray-200 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 sm:text-sm">
                            <option value="" disabled selected>Select</option>
                            <option value="mobiznu">mobiznu</option>
                            <option value="konsultasi zakat">Konsultasi zakat</option>
                            <option value="konfirmasi donasi">konfirmasi donasi</option>
                            <option value="Pengaduan">Pengaduan Gocap</option>
                        </select>
                        @error('bagian')
                            <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                   
                    <!-- Submit Button inside the form -->
                    <div class="flex justify-end p-4 bg-gray-200 rounded-b-lg">
                        <button type="button" @click="isOpen = false"
                            class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Close</button>
                        <button type="submit" @click="isOpen = true"
                            class="px-4 py-2 ml-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

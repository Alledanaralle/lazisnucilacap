<div x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
    <!-- Button to open the modal -->
    <button @click="isOpen=true"
        class="bg-green-600 hover:bg-green-700 text-white mb-4 font-bold py-2 px-4 rounded-md shadow-md transition duration-300 ease-in-out transform hover:scale-105">
        Create
    </button>

    <!-- Modal Background -->
    <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50 p-4 sm:p-6">
        <!-- Modal Content -->
        <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="bg-white rounded-lg shadow-xl w-full max-w-2xl mx-auto max-h-[90vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex justify-between items-center bg-gray-100 p-4 rounded-t-lg border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800">Tambah Pilar dan Program</h3>
                <button @click="isOpen=false"
                    class="text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 rounded-md p-1">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-6 space-y-4">
                <form wire:submit.prevent="save">
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="nama" wire:model="nama" name="nama"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            placeholder="Enter name">
                        @error('nama')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" id="slug" wire:model="slug" name="slug"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            placeholder="Enter slug">
                        @error('slug')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="id_kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select id="id_kategori" wire:model="id_kategori" name="id_kategori"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <option value="{{null}}" selected>Select</option>
                            @foreach($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                            <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="img" class="block text-sm font-medium text-gray-700">Gambar</label>
                        <input type="file" id="img" wire:model="img" name="img"
                            class="mt-1 block w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-green-50 file:text-green-700
                            hover:file:bg-green-100">
                        @error('img')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea id="deskripsi" wire:model="deskripsi" name="deskripsi" rows="4"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            placeholder="Enter description"></textarea>
                        @error('deskripsi')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- SDG Selection -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Select SDGs</label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                            @foreach($sdgs as $sdg)
                                <label class="flex items-center space-x-2 p-2 border border-gray-300 rounded-md shadow-sm cursor-pointer hover:bg-gray-50">
                                    <input type="checkbox" wire:model="selectedSdgs" value="{{ $sdg['id'] }}" 
                                        class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                                    <img src="{{ asset('images/sdg/' . $sdg['image']) }}" alt="{{ $sdg['label'] }}" class="w-6 h-6">
                                    <span class="text-gray-800 text-xs">{{ $sdg['label'] }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('selectedSdgs')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                        <button type="button" @click="isOpen = false"
                            class="px-4 py-2 bg-gray-300 text-gray-800 font-semibold rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 transition duration-300 ease-in-out">
                            Cancel
                        </button>
                        <button type="submit" @click="isOpen = false" wire:loading.attr="disabled"
                            wire:loading.class="bg-green-300 cursor-not-allowed"
                            class="px-4 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300 ease-in-out">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
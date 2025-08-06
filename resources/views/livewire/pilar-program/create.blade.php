<div x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
    <!-- Button to open the modal -->
    <button @click="isOpen=true" class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">Create</button>

    <!-- Modal Background -->
    <div x-show="isOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-600 bg-opacity-75">
        <!-- Modal Content -->
        <div class="w-1/2 bg-white rounded-lg shadow-lg max-h-[100vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 bg-gray-200 rounded-t-lg">
                <h3 class="text-xl font-semibold">Tambah Pilar dan Program</h3>
                <div @click="isOpen=false" class="px-3 rounded-sm shadow hover:bg-red-500">
                    <button class="text-gray-900">&times;</button>
                </div>
            </div>
            <div class="p-4 ">

                <form wire:submit.prevent="save">
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="nama" wire:model="nama" name="nama"
                            class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                        @error('nama')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" id="slug" wire:model="slug" name="slug"
                            class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                        @error('slug')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="id_kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select id="id_kategori" wire:model="id_kategori" name="id_kategori"
                            class="block w-full py-2 mt-1 bg-gray-200 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 sm:text-sm">
                            <option value="{{null}}" selected>Select</option>
                            @foreach($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                            <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="img" class="block text-sm font-medium text-gray-700">Gambar</label>
                        <input type="file" id="img" wire:model="img" name="img"
                            class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                        @error('img')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <input type="text" id="deskripsi" wire:model="deskripsi" name="deskripsi"
                            class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                        @error('deskripsi')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- SDG Selection -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Select SDGs</label>
                        <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                            @foreach($sdgs as $sdg)
                                <label class="flex items-center space-x-3">
                                    <input type="checkbox" wire:model="selectedSdgs" value="{{ $sdg['id'] }}" 
                                        class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                                    <img src="{{ asset('images/sdg/' . $sdg['image']) }}" alt="{{ $sdg['label'] }}" class="w-8 h-8">
                                    <span class="text-gray-800 text-xs">{{ $sdg['label'] }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('selectedSdgs')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button inside the form -->
                    <div class="flex justify-end p-4 bg-gray-200 rounded-b-lg">
                        <button type="button" @click="isOpen = false"
                            class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Close</button>
                        <button type="submit"
                            class="px-4 py-2 ml-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

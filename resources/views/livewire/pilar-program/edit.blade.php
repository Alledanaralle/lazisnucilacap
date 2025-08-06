<div x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
    <button @click="isOpen=true" 
        class="inline-block px-3 py-1 text-white bg-blue-500 rounded hover:bg-blue-700">Edit</button>

        <div>
    <div x-show="isOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-600 bg-opacity-75">
        <div class="w-1/2 bg-white rounded-lg shadow-lg max-h-[100vh] overflow-y-auto">
            <div class="flex items-center justify-between p-4 bg-gray-200 rounded-t-lg">
                <h3 class="text-xl font-semibold">Edit Pilar dan Program</h3>
                <div @click="isOpen=false" class="px-3 rounded-sm shadow hover:bg-red-500">
                    <button class="text-gray-900">&times;</button>
                </div>
            </div>
            <div class="p-4">
                <form wire:submit="update">
                    <input type="text" hidden wire:model="id">
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
                    <div class="mb-4">
                        <label for="sdgs" class="block text-sm font-medium text-gray-700">SDG</label>
                        
                        <div class="flex flex-wrap grid grid-cols-2 gap-4 md:grid-cols-4">
                            @foreach($sdgs as $sdg)
                                <div class="flex items-center mb-2 mr-4">
                                    <!-- Checkbox for each SDG -->
                                    <input type="checkbox" wire:model="selectedSdgs" id="sdg-{{ $sdg['id'] }}" value="{{ $sdg['id'] }}" class="mr-2">
                                    
                                    <!-- SDG Logo -->
                                    <img src="{{ asset('images/sdg/' . $sdg['image']) }}" alt="{{ $sdg['label'] }}" class="w-10 h-10 object-cover mr-2">
                                    
                                    <!-- SDG Label -->
                                    <label for="sdg-{{ $sdg['id'] }}" class="text-xs">{{ $sdg['label'] }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    
                    
                    <!-- Submit Button inside the form -->
                    <div class="flex justify-end p-4 bg-gray-200 rounded-b-lg">
                        <button type="button" wire:click="clear({{$id}})" @click="isOpen = false" 
                            class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Close</button>
                        <button type="submit" @click="isOpen = true"
                            class="px-4 py-2 ml-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

    
</div>

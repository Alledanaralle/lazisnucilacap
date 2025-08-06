<div x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
    <button @click="isOpen=true" 
        class="inline-block px-3 py-1 text-white bg-blue-500 rounded hover:bg-blue-700">Edit</button>

        <div>
    <div x-show="isOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-600 bg-opacity-75">
        <div class="w-1/2 bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-between p-4 bg-gray-200 rounded-t-lg">
                <h3 class="text-xl font-semibold">Edit Pilihan Wakaf</h3>
                <div @click="isOpen=false" class="px-3 rounded-sm shadow hover:bg-red-500">
                    <button class="text-gray-900">&times;</button>
                </div>
            </div>
            <div class="p-4">
                <form wire:submit="update">
                    <input type="text" hidden wire:model="id">
                    <div class="mb-4">
                        <label for="pil_wakaf" class="block text-sm font-medium text-gray-700">Pilihan Wakaf</label>
                        <input type="text" id="pil_wakaf" wire:model="pil_wakaf" name="pil_wakaf"
                            class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                        @error('pil_wakaf')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Submit Button inside the form -->
                    <div class="flex justify-end p-4 bg-gray-200 rounded-b-lg">
                        <button type="button" wire:click="clear({{$id}})" @click="isOpen = false" 
                            class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Close</button>
                        <button type="submit" @click="isOpen = false"
                            class="px-4 py-2 ml-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

    
</div>

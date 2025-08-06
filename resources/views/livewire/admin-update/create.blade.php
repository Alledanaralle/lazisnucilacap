<div x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
    <!-- Button to open the modal -->
    <button @click="isOpen=true"
        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create</button>

    <!-- Modal Background -->
    <div x-show="isOpen" class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center z-50">
        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-lg w-1/2 max-h-[100vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex justify-between items-center bg-gray-200 p-4 rounded-t-lg">
                <h3 class="text-xl font-semibold">Create Update Campaign</h3>
                <button @click="isOpen=false" class="text-gray-600 hover:text-gray-900">&times;</button>
            </div>
            <div class="p-4">
                <form wire:submit.prevent="save">
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <small><span class="text-black">[img1] akan diganti dengan Image 1 dan seterusnya</span></small>
                        <textarea wire:model="description" rows="10"
                            class="border border-gray-300 rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Type your text here..."></textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="id_campaign" class="block text-sm font-medium text-gray-700">Campaign</label>
                        <select id="id_campaign" wire:model="id_campaign" name="id_campaign"
                            class="mt-1 block w-full rounded-md border-gray-700 shadow-2xl focus:border-indigo-500 bg-gray-200 py-1 sm:text-sm">
                            <option value="">Select a Campaign</option>
                            @foreach($campaigns as $campaign)
                                <option value="{{ $campaign->id_campaign }}">{{ $campaign->title }}</option>
                            @endforeach
                        </select>
                        @error('id_campaign')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    
                    <div class="mb-4">
                        <label for="picture" class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" id="picture" class="border border-gray-300 p-2 w-full rounded-lg"
                            wire:model="picture">
                        @error('picture')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Submit Button inside the form -->
                    <div class="flex justify-between p-4 bg-gray-200 rounded-b-lg">
                        <div wire:loading>
                            <div class="spinner"></div>
                            {{-- <div class="spinner-text">Uploading...</div> --}}
                        </div>
                        <div wire:loading.remove>
                            <!-- This content will be hidden while a Livewire request is processing -->
                        </div>
                        <div>
                            <button type="button" @click="isOpen = false"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Close</button>
                            <button type="submit" @click="isOpen = false"
                                class="ml-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:load', function () {
        $('#id_campaign').select2();

        $('#id_campaign').on('change', function (e) {
            var data = $('#id_campaign').select2("val");
            @this.set('id_campaign', data);
        });
    });
</script>




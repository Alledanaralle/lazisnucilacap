<div x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
    <!-- Button to open the modal -->
    <button @click="isOpen=true"
        class="bg-green-600 hover:bg-green-700 text-white font-bold mb-4 py-2 px-4 rounded-md shadow-md transition duration-300 ease-in-out transform hover:scale-105">
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
                <h3 class="text-xl font-semibold text-gray-800">Create Campaign</h3>
                <button @click="isOpen=false"
                    class="text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 rounded-md p-1">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-6">
                <form wire:submit.prevent="save" class="space-y-4">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="title" wire:model="title"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            placeholder="Enter campaign title">
                        <small class="text-gray-500">Tambahkan ! dalam title jika urgent</small>
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" id="slug" wire:model="slug"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            placeholder="Enter campaign slug">
                        @error('slug')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <small class="text-gray-500">[img1] akan diganti dengan Image 1 dan seterusnya</small>
                        <textarea wire:model="description" rows="5"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            placeholder="Type your text here..."></textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="id_kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select id="id_kategori" wire:model="id_kategori" name="id_kategori"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <option value="{{null}}" selected>Select</option>
                            @foreach($kategoriList as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                            <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="goal" class="block text-sm font-medium text-gray-700">Goal</label>
                        <input type="text" id="goal_display" name="goal_display"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            oninput="formatMoney(this, 'goal_hidden')" value="{{ number_format($goal, 0, ',', '.') }}"
                            placeholder="Enter goal amount">
                        <input type="hidden" id="goal_hidden" wire:model.lazy="goal">
                        @error('goal')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" id="start_date" wire:model="start_date" name="start_date"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                        @error('start_date')
                            <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" id="end_date" wire:model="end_date" name="end_date"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                        @error('end_date')
                            <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="min_donation" class="block text-sm font-medium text-gray-700">Min Donation</label>
                        <input type="text" id="min_donation_display" name="min_donation_display"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            oninput="formatMoney(this, 'min_donation_hidden')"   value="{{ number_format($min_donation, 0, ',', '.') }}"
                            placeholder="Enter minimum donation amount">
                        <input type="hidden" id="min_donation_hidden" wire:model.lazy="min_donation">
                        @error('min_donation')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                        <input type="text" id="lokasi" wire:model="lokasi" name="lokasi"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            placeholder="Enter location">
                        @error('lokasi')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="main_picture" class="block text-sm font-medium text-gray-700">Image 1</label>
                        <input type="file" id="main_picture" class="mt-1 block w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-green-50 file:text-green-700
                            hover:file:bg-green-100"
                            wire:model="main_picture">
                        @error('main_picture')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>


                    <div>
                        <label for="second_picture" class="block text-sm font-medium text-gray-700">Image 2</label>
                        <input type="file" id="second_picture"
                            class="mt-1 block w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-green-50 file:text-green-700
                            hover:file:bg-green-100" wire:model="second_picture">
                        @error('second_picture')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="last_picture" class="block text-sm font-medium text-gray-700">Image 3</label>
                        <input type="file" id="last_picture" class="mt-1 block w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-green-50 file:text-green-700
                            hover:file:bg-green-100"
                            wire:model="last_picture">
                        @error('last_picture')
                            <span class="text-red-600">{{ $message }}</span>
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
<script>
    function formatMoney(input, hiddenInputId) {
     // Get the raw value without formatting
     let value = input.value.replace(/[^\d]/g, ''); // Remove all non-numeric characters
 
     // Format the value with dots for thousands
     let formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
 
     // Update the visible input with the formatted value
     input.value = formattedValue;
 
     // Update the hidden input with the numeric value for Livewire
     let hiddenInput = document.getElementById(hiddenInputId);
     hiddenInput.value = value;
 
     // Dispatch an input event to ensure Livewire sees the change
     hiddenInput.dispatchEvent(new Event('input'));
 }
 
 document.addEventListener('livewire:load', function () {
        $('#id_kategori').select2();

        $('#id_kategori').on('change', function (e) {
            var data = $('#id_kategori').select2("val");
            @this.set('id_kategori', data);
        });
    });
 </script>
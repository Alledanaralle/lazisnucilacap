<div x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
    <!-- Button to open the modal -->
    <button @click="isOpen=true"
        class="inline-block px-3 py-1 text-center text-white bg-blue-500 rounded hover:bg-blue-700">Edit</button>

    <!-- Modal Background -->
    <div x-show="isOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-600 bg-opacity-75">
        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-lg w-1/2 max-h-[100vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 bg-gray-200 rounded-t-lg">
                <h3 class="text-xl font-semibold">Edit User</h3>
                <button @click="isOpen=false" wire:click="clear({{ $id_campaign }})"
                    class="text-gray-600 hover:text-gray-900">&times;</button>
            </div>
            <div class="p-4">
                <form wire:submit="update">
                    <input type="hidden" wire:model="id_campaign">
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="title" wire:model="title" name="title"
                            class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                        <small><span class="text-black">Tambahakan ! dalam title jika urgent</span></small>
                        @error('title')
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
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <small><span class="text-black">[img1] akan diganti dengan Image 1 dan seterusnya</span></small>
                        <textarea wire:model="description" rows="10"
                            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Update your text here..."></textarea>
                        @error('description')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="id_kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select id="id_kategori" wire:model="id_kategori" name="id_kategori"
                            class="block w-full py-2 mt-1 bg-gray-200 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 sm:text-sm">
                            <option value="" selected>Select</option>

                            <!-- Dynamically populate the select options from the kategoriList array -->
                            @foreach ($kategoriList as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>

                        @error('id_kategori')
                            <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="goal" class="block text-sm font-medium text-gray-700">Goal</label>
                        <!-- Visible Input for formatting -->
                        <input type="text" id="goal_display" name="goal_display"
                            class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm"
                            oninput="formatMoney(this, 'goal_hidden')" value="{{ number_format($goal, 0, ',', '.') }}">

                        <!-- Hidden Input for Livewire to store pure numeric value -->
                        <input type="hidden" id="goal_hidden" wire:model.lazy="goal">

                        @error('goal')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start date</label>
                        <input type="date" id="start_date" wire:model="start_date" name="start_date"
                            class="block w-full py-2 mt-1 bg-gray-200 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 sm:text-sm">
                        @error('start_date')
                            <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="end_date" class="block text-sm font-medium text-gray-700">End date</label>
                        <input type="date" id="end_date" wire:model="end_date" name="end_date"
                            class="block w-full py-2 mt-1 bg-gray-200 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 sm:text-sm">
                        @error('end_date')
                            <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="min_donation" class="block text-sm font-medium text-gray-700">Min Donation</label>
                        <!-- Visible Input for formatting -->
                        <input type="text" id="min_donation_display" name="min_donation_display"
                            class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm"
                            oninput="formatMoney(this, 'min_donation_hidden')"
                            value="{{ number_format($min_donation, 0, ',', '.') }}">

                        <!-- Hidden Input for Livewire to store pure numeric value -->
                        <input type="hidden" id="min_donation_hidden" wire:model.lazy="min_donation">

                        @error('min_donation')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                        <input type="text" id="lokasi" wire:model="lokasi" name="lokasi"
                            class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                        @error('lokasi')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label for="edit_main_picture" class="block text-sm font-medium text-gray-700">Image 1</label>
                        <input type="file" id="edit_main_picture"
                            class="w-full p-2 border border-gray-300 rounded-lg" wire:model="main_picture">
                        @error('main_picture')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- For Second Image -->
                    <div class="mb-4">
                        <label for="edit_second_picture" class="block text-sm font-medium text-gray-700">Image
                            2</label>
                        <input type="file" id="edit_second_picture"
                            class="w-full p-2 border border-gray-300 rounded-lg" wire:model="second_picture">
                        @error('second_picture')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror

                        @if ($second_picture || $check_second_picture)
                            <button type="button" wire:click="deleteSecondPicture"
                                class="mt-2 text-red-500 hover:text-red-700">Delete Second Image</button>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="edit_last_picture" class="block text-sm font-medium text-gray-700">Image 3</label>
                        <input type="file" id="edit_last_picture"
                            class="w-full p-2 border border-gray-300 rounded-lg" wire:model="last_picture">
                        @error('last_picture')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror

                        @if ($last_picture || $check_last_picture)
                            <button type="button" wire:click="deleteLastPicture"
                                class="mt-2 text-red-500 hover:text-red-700">Delete Last Image</button>
                        @endif
                    </div>
                    <div class="flex justify-between p-4 bg-gray-200 rounded-b-lg">
                        <div wire:loading>
                            <div class="spinner"></div>
                        </div>
                        <div wire:loading.remove>
                        </div>
                        <div>
                            <button type="button" @click="isOpen = false" wire:click="clear({{ $id_campaign }})"
                                class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Close</button>
                            <button type="submit" wire:loading.attr="disabled"
                                wire:loading.class="bg-blue-300 cursor-not-allowed"
                                class="px-4 py-2 ml-2 font-bold text-white transition-all duration-300 bg-blue-500 rounded hover:bg-blue-700">
                                Update
                            </button>

                        </div>
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

    function formatOnLoad() {
        const goalInput = document.getElementById('goal_display');
        if (goalInput.value) {
            formatMoney(goalInput, 'goal_hidden');
        }
    }

    document.addEventListener('DOMContentLoaded', formatOnLoad);
</script>

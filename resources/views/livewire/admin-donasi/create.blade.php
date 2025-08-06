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
                <h3 class="text-xl font-semibold">Create User</h3>
                <button @click="isOpen=false" class="text-gray-600 hover:text-gray-900">&times;</button>
            </div>
            <div class="p-4">
                <form wire:submit.prevent="save">
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700">username</label>
                        <input type="text" id="username" wire:model="username" name="username"
                            class="mt-1 block w-full rounded-md border-gray-700 shadow-2xl focus:border-indigo-500 bg-gray-200 py-1 sm:text-sm">
                        @error('username')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="no_telp" class="block text-sm font-medium text-gray-700">no_telp</label>
                        <input type="text" id="no_telp" wire:model="no_telp" name="no_telp"
                            class="mt-1 block w-full rounded-md border-gray-700 shadow-2xl focus:border-indigo-500 bg-gray-200 py-1 sm:text-sm">
                        @error('no_telp')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">email</label>
                        <input type="text" id="email" wire:model="email" name="email"
                            class="mt-1 block w-full rounded-md border-gray-700 shadow-2xl focus:border-indigo-500 bg-gray-200 py-1 sm:text-sm">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jumlah_donasi" class="block text-sm font-medium text-gray-700">jumlah_donasi</label>
                        <input type="text" id="jumlah_donasi" wire:model="jumlah_donasi" name="jumlah_donasi"
                            class="mt-1 block w-full rounded-md border-gray-700 shadow-2xl focus:border-indigo-500 bg-gray-200 py-1 sm:text-sm">
                        @error('jumlah_donasi')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="id_campaign" class="block text-sm font-medium text-gray-700">id_campaign</label>
                        <input type="text" id="id_campaign" wire:model="id_campaign" name="id_campaign"
                            class="mt-1 block w-full rounded-md border-gray-700 shadow-2xl focus:border-indigo-500 bg-gray-200 py-1 sm:text-sm">
                        @error('id_campaign')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
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
                            <button type="submit"
                                class="ml-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
{{-- img preview --}}
{{-- <script>
    function previewImage(event, previewId) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById(previewId);
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script> --}}
{{-- format uang --}}
<script>
    function formatMoney(input) {
        let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Add dots for thousands
        input.value = value;
    }
    </script>

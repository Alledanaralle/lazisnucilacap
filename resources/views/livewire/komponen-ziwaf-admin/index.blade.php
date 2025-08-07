<div class="mx-5 shadow-2xl">
    <div class="flex flex-col items-center mx-4 mt-12 mb-16">
        <h1 class="w-full mb-4 text-2xl font-bold text-left">Komponen Ziswaf Table</h1>
        <div class="flex items-center justify-center w-full">
            <form wire:submit="convert" class="p-6 border border-gray-300 rounded-lg shadow-md w-full max-w-md">
                <div class="mb-4">
                    <label for="harga_emas" class="block text-sm font-medium text-gray-700">Harga Emas per Gram</label>
                    <input oninput="formatMoney(this)" type="text" id="harga_emas" wire:model="harga_emas" name="harga_emas"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                        placeholder="Enter price of gold per gram">
                    @error('harga_emas')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="nominal_fitrah" class="block text-sm font-medium text-gray-700">Nominal Fitrah</label>
                    <input oninput="formatMoney(this)" type="text" id="nominal_fitrah" wire:model="nominal_fitrah" name="nominal_fitrah"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                        placeholder="Enter fitrah nominal">
                    @error('nominal_fitrah')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="nisab" class="block text-sm font-medium text-gray-700">Nisab</label>
                    <input oninput="formatMoney(this)" type="text" id="nisab" wire:model="nisab" name="nisab"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                        placeholder="Enter nisab amount">
                    @error('nisab')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="nisab_kg" class="block text-sm font-medium text-gray-700">Nisab per KG</label>
                    <input type="number" id="nisab_kg" wire:model="nisab_kg" name="nisab_kg"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                        placeholder="Enter nisab per KG">
                    @error('nisab_kg')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="fidyah" class="block text-sm font-medium text-gray-700">Fidyah</label>
                    <input oninput="formatMoney(this)" type="text" id="fidyah" wire:model.lazy="fidyah" name="fidyah"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                        placeholder="Enter fidyah amount">
                    @error('fidyah')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300 ease-in-out">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function formatMoney(input) {
            let value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Add dots for thousands
            input.value = value;
        }
    </script>
</div>
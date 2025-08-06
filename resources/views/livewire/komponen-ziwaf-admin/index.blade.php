<div class="mx-5 shadow-2xl">
    <div class="flex flex-col items-center mx-4 mt-12 mb-16">
        <h1 class="w-full mb-4 text-2xl font-bold text-left">Komponen Ziswaf Table</h1>
        <div class="flex items-center">
            <form wire:submit="convert" class="p-4 border border-gray-500 rounded-lg w-[500px]">
                            <div class="mb-4">
                                <label for="harga_emas" class="block text-sm font-medium text-gray-700">Harga Emas per Gram</label>
                                <input oninput="formatMoney(this)" type="text" id="harga_emas" wire:model="harga_emas" name="harga_emas"
                                    class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                                @error('harga_emas')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="nominal_fitrah" class="block text-sm font-medium text-gray-700">Nominal Fitrah</label>
                                <input oninput="formatMoney(this)" type="text" id="nominal_fitrah" wire:model="nominal_fitrah" name="nominal_fitrah"
                                    class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                                @error('nominal_fitrah')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="nisab" class="block text-sm font-medium text-gray-700">Nisab</label>
                                <input oninput="formatMoney(this)" type="text" id="nisab" wire:model="nisab" name="nisab"
                                    class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                                @error('nisab')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="nisab_kg" class="block text-sm font-medium text-gray-700">Nisab per KG</label>
                                <input type="number" id="nisab_kg" wire:model="nisab_kg" name="nisab_kg"
                                    class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                                @error('nisab_kg')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="fidyah" class="block text-sm font-medium text-gray-700">Fidyah</label>
                                <input oninput="formatMoney(this)" type="text" id="fidyah" wire:model.lazy="fidyah" name="fidyah"
                                    class="block w-full py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                                @error('fidyah')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
        
                            <div class="flex justify-end p-4 bg-gray-200 rounded-b-lg">
                                <button type="submit"
                                    class="px-4 py-2 ml-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">Simpan</button>
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

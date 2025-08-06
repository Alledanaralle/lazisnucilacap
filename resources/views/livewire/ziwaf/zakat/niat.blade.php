<div x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
    <!-- Button to open the modal -->
    <span @click="isOpen=true" class="text-green-500 cursor-pointer hover:underline">Baca Niat Zakat</span>

    <!-- Modal Background -->
    <div x-show="isOpen" class="fixed inset-0 z-50 flex items-end justify-center bg-gray-600 bg-opacity-75">
        <!-- Modal Content -->
        <div class="w-full mx-2 bg-white rounded-t-lg shadow-lg md:w-[414px]">
            <!-- Modal Header -->
            <div class="relative">
                <!-- Centered Top Border -->
                <div class="absolute inset-x-0 w-16 mx-auto border-t-4 border-gray-200 top-2"></div>
                <div class="flex items-center justify-between p-4 rounded-t-lg">
                    <h3 class="mt-4 text-lg font-semibold text-green-500">Niat Zakat Maal</h3>
                    <div @click="isOpen=false" class="px-3 rounded-sm cursor-pointer">
                        <button class="text-3xl text-green-500">&times;</button>
                    </div>
                </div>
                <div class="flex flex-col px-4 py-6">
                    <span class="pr-2 text-xl text-right">
                        نویت أن أخرج زكاة مالى فرضا تعالى
                    </span>
                    <span class="pt-2 text-sm text-gray-700">
                        Arab latin: "Nawaitu an ukhrija zakatal maali fardhan lillahi ta'ala"
                    </span>
                    <span class="pt-2 text-sm text-gray-700">
                        Artinya: “Aku niat mengeluarkan zakat hartaku, fardhu karna Allah Ta’ala”
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

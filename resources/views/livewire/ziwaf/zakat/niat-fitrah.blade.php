<div x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
    <!-- Button to open the modal -->
    <span @click="isOpen=true" class="text-green-500 cursor-pointer hover:underline">Baca Niat Zakat Fitrah</span>

    <!-- Modal Background -->
    <div x-show="isOpen" class="fixed inset-0 z-50 flex items-end justify-center bg-gray-600 bg-opacity-75">
        <!-- Modal Content -->
        <div class="w-[414px] bg-white rounded-t-lg shadow-lg">
            <!-- Modal Header -->
            <div class="relative">
                <!-- Centered Top Border -->
                <div class="absolute inset-x-0 w-16 mx-auto border-t-4 border-gray-200 top-2"></div>
                <div class="flex items-center justify-between p-4 rounded-t-lg">
                    <h3 class="mt-2 text-lg font-semibold text-green-500">Niat Zakat Fitrah</h3>
                    <div @click="isOpen=false" class="px-3 rounded-sm cursor-pointer">
                        <button class="text-3xl text-green-500">&times;</button>
                    </div>
                </div>
                <div class="flex flex-col px-4 py-4">
                    <div class="flex flex-col mb-4">
                        <span class="font-semibold text-green-500">
                            Niat Zakat Fitrah untuk Diri Sendiri
                        </span>
                        <span class="pt-2 text-xl text-right">
                            نَوَيْتُ أَن أُخْرِج زكاة الفِطْرِ عَنْ نَفْسِي فَرْضًا لِلَّهِ تَعَالَى
                        </span>
                        <span class="pt-2 text-sm text-gray-700">
                            Arab latin: Nawaitu an ukhrija zakaatal fithri 'an nafsii fardhan lillaahi ta'aalaa.
                        </span>
                        <span class="pt-2 text-sm text-gray-700">
                            Artinya: "Aku niat mengeluarkan zakat fitrah untuk diriku sendiri, fardu karena Allah Taʻâlâ."
                        </span>
                    </div>
                    <div class="flex flex-col mb-4">
                        <span class="font-semibold text-green-500">
                            Niat Zakat Fitrah untuk Diri Sendiri
                        </span>
                        <span class="pt-2 text-xl text-right">
                            نَوَيْتُ أَن أُخْرِج زكاة الفِطْرِ عَنْ نَفْسِي فَرْضًا لِلَّهِ تَعَالَى
                        </span>
                        <span class="pt-2 text-sm text-gray-700">
                            Arab latin: Nawaitu an ukhrija zakaatal fithri 'an nafsii fardhan lillaahi ta'aalaa.
                        </span>
                        <span class="pt-2 text-sm text-gray-700">
                            Artinya: "Aku niat mengeluarkan zakat fitrah untuk diriku sendiri, fardu karena Allah Taʻâlâ."
                        </span>
                    </div>
                    <div class="flex flex-col mb-4">
                        <span class="font-semibold text-green-500">
                            Niat Zakat Fitrah untuk Diri Sendiri
                        </span>
                        <span class="pt-2 text-xl text-right">
                            نَوَيْتُ أَن أُخْرِج زكاة الفِطْرِ عَنْ نَفْسِي فَرْضًا لِلَّهِ تَعَالَى
                        </span>
                        <span class="pt-2 text-sm text-gray-700">
                            Arab latin: Nawaitu an ukhrija zakaatal fithri 'an nafsii fardhan lillaahi ta'aalaa.
                        </span>
                        <span class="pt-2 text-sm text-gray-700">
                            Artinya: "Aku niat mengeluarkan zakat fitrah untuk diriku sendiri, fardu karena Allah Taʻâlâ."
                        </span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-semibold text-green-500">
                            Niat Zakat Fitrah untuk Diri Sendiri
                        </span>
                        <span class="pt-2 text-xl text-right">
                            نَوَيْتُ أَن أُخْرِج زكاة الفِطْرِ عَنْ نَفْسِي فَرْضًا لِلَّهِ تَعَالَى
                        </span>
                        <span class="pt-2 text-sm text-gray-700">
                            Arab latin: Nawaitu an ukhrija zakaatal fithri 'an nafsii fardhan lillaahi ta'aalaa.
                        </span>
                        <span class="pt-2 text-sm text-gray-700">
                            Artinya: "Aku niat mengeluarkan zakat fitrah untuk diriku sendiri, fardu karena Allah Taʻâlâ."
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
    <!-- Button to open the modal -->
    <span @click="isOpen = true" class="text-green-500 cursor-pointer hover:underline">Baca Selengkapnya...</span>

    <!-- Modal Background -->
    <div x-show="isOpen" class="fixed inset-0 z-50 flex items-center justify-center transition-opacity duration-300 bg-gray-800 bg-opacity-75">
        <!-- Modal Content -->
        <div @click.away="isOpen = false" class="w-[414px] md:w-full mx-4 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 bg-gray-200 rounded-t-lg">
                <h3 class="text-xl font-semibold text-green-500">Sekilas NU-Care Lazisnu Cilacap</h3>
                <button @click="isOpen = false" class="text-gray-900 hover:text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 text-gray-700">
                <p class="mb-4 text-sm leading-relaxed">
                    NU Care-LAZISNU adalah rebranding dari Lembaga Amil Zakat, Infak, dan Sedekah Nahdlatul Ulama (LAZISNU) milik perkumpulan Nahdlatul Ulama (NU).
                </p>
                <p class="mb-4 text-sm leading-relaxed">
                    NU Care-LAZISNU bertujuan agar masyarakat global mengenal Lembaga Amil Zakat, Infak, dan Sedekah Nahdlatul Ulama sebagai lembaga filantropi NU. Lembaga ini dikukuhkan oleh SK Menteri Agama RI No. 65/2005 dan terbaru melalui Keputusan Menteri Agama no.89 tahun 2022.
                </p>
                <p class="text-sm leading-relaxed">
                    NU Care-LAZISNU Cilacap merupakan lembaga nirlaba milik Pengurus Cabang Nahdlatul Ulama Cilacap yang bertujuan untuk membantu kesejahteraan umat melalui ZIS dan dana sosial-keagamaan lainnya. Lembaga ini telah mendapatkan izin operasional dari LAZISNU PBNU.
                </p>
            </div>
        </div>
    </div>
</div>

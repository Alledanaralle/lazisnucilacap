<div x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
    <!-- Button to open the modal -->
    <span @click="isOpen=true" class="text-sm text-green-500 cursor-pointer hover:underline">Baca Selengkapnya...</span>

    <!-- Modal Background -->
    <div x-show="isOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-600 bg-opacity-75">
        <!-- Modal Content -->
        <div class="w-1/2 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 bg-gray-200 rounded-t-lg">
                <h3 class="text-xl font-semibold text-green-500">Sekilas Penghargaan NU-Care Lazisnu Cilacap</h3>
                <div @click="isOpen=false" class="px-3 rounded-sm shadow hover:bg-red-500">
                    <button class="text-gray-900">&times;</button>
                </div>
            </div>
            <div class="p-4">
                <ol class="mt-2 text-sm list-decimal list-inside">
                    <li class="mb-2">Penghargaan dari Kantor Kementerian Agama Kab. Cilacap sebagai LAZ terbaik dan responsif terhadap kebutuhan layanan ambulan untuk umat</li>
                    <li class="mb-2">Penghargaan dari Kepala Dinas Kesehatan Kabupaten Cilacap sebagai LAZ dengan program layanan ambulan rujukan teraktif</li>
                    <li class="mb-2">Penghargaan dari Kantor Kementerian Agama Kabupaten Cilacap sebagai LAZ progresif dan dinamis Kabupaten Cilacap</li>
                    <li class="mb-2">Penghargaan dari Dinas Kesehatan Kabupaten Cilacap sebagai LAZ teraktif dalam pencegahan dan penanganan pandemi Covid-19 di Kabupaten Cilacap</li>
                    <li class="mb-2">Penghargaan dari Kodim 0703 Cilacap sebagai LAZ Mitra TNI</li>
                    <li class="mb-2">Penghargaan dari BPBD Kabupaten Cilacap sebagai LAZ dengan intensitas, konsistensi, dan inovasi terbaik dalam penanggulangan bencana di wilayah kabupaten Cilacap</li>
                    <li class="mb-2">Penghargaan dari BPBD Kabupaten Cilacap sebagai LAZ dengan kinerja dan sinergitas terbaik dalam mewujudkan ketangguhan masyarakat dalam menghadapi bencana di wilayah kabupaten Cilacap</li>
                    <li class="mb-2">Penghargaan dari Baznas Kabupaten Cilacap sebagai LAZ dengan pengumpulan ZIS terbanyak tahun 2023</li>
                    <li class="mb-2">Penghargaan dari Bupati Cilacap atas partisipasi pada peningkatan kesejahteraan di bidang ekonomi dan sosial di kabupaten Cilacap</li>
                    <li class="mb-2">Penghargaan dari LAZISNU Jawa Tengah sebagai LAZISNU dengan manajemen paling modern, akuntabel, transparan, amanah, dan profesional nomor 1 di Provinsi Jawa Tengah</li>
                    <li class="mb-2">Penghargaan dari Pengurus Pusat LAZISNU sebagai inisiator digitalisasi pengelolaan koin NU melalui aplikasi gerakan koin NU</li>
                    <li class="mb-2">Penghargaan dari Polres Cilacap sebagai Mitra Polres Cilacap dalam rangka program vaksinasi guna penanggulangan pencegahan Covid-19 di Kabupaten Cilacap</li>
                </ol>
            </div>
        </div>
    </div>
</div>

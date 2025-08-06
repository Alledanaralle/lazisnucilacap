<div>
    <x-navbar></x-navbar>
    <div class="flex items-center justify-center px-2 md:px-6 py-12 lg:px-8">
        <div class="p-2 md:p-8 md:mx-5 space-y-8 bg-white rounded-lg shadow-md"
            style="background-image: url('{{ asset('images/bg_campaign.png') }}'); background-repeat: no-repeat; background-position: bottom right; height: 1689px; width: 1449px;">
            <div class="flex items-center justify-between">
                <p class="text-3xl font-bold text-green-600">
                    Wujudkan Perubahan Sekarang!
                </p>
                <div class="relative flex items-center mx-5 border rounded-lg group">
                    <x-nav-link title="Pilih Kategori" url="#" :links="[
                ['href' => '#', 'text' => 'Ramadhan'],
                ['href' => '#', 'text' => 'Ekonomi'],
                ['href' => '#', 'text' => 'Sosial & Keagamaan'],
                ['href' => '#', 'text' => 'Kesehatan'],
                ['href' => '#', 'text' => 'Pendidikan'],
            ]" isDropdown="true" />
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 pt-1 mx-10 sm:grid-cols-2 lg:grid-cols-3">
                <x-campaign-card/>
                <div>
                    <x-campaign-card/>
                </div>
                <div>
                    <x-campaign-card/>
                </div>
                <div>
                    <x-campaign-card/>
                </div>
                <div>
                    <x-campaign-card/>
                </div>
                <div>
                    <x-campaign-card/>
                </div>
                <div>
                    <x-campaign-card/>
                </div>
                <div>
                    <x-campaign-card/>
                </div>
                <div>
                    <x-campaign-card/>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="flex items-center space-x-2">
                <button class="flex items-center justify-center w-10 h-10 text-gray-700 bg-gray-200 rounded-full hover:bg-gray-300 disabled:opacity-50" disabled>
                    &lt;
                </button>
                
                <button class="flex items-center justify-center w-10 h-10 text-white bg-green-600 rounded-full">1</button>
                <button class="flex items-center justify-center w-10 h-10 text-gray-700 bg-gray-200 rounded-full hover:bg-gray-300">2</button>
                
                <button class="flex items-center justify-center w-10 h-10 text-gray-700 bg-gray-200 rounded-full hover:bg-gray-300">
                    &gt;
                </button>
            </div>
            </div>
        </div>
    </div>    

</div>
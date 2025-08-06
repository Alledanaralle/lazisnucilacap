<div x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
    <!-- Button to open the modal -->
    <button @click="isOpen=true"
        class="px-3 py-1 font-bold text-white bg-green-500 rounded hover:bg-blue-700">View</button>

    <!-- Modal Background -->
    <div x-show="isOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-600 bg-opacity-75">
        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-3/4 max-h-[100vh] overflow-y-auto">

            <div class="sticky top-0 flex items-center justify-between p-4 bg-gray-200 rounded-t-lg">
                <h3 class="text-xl font-semibold">View Detail</h3>
                <div @click="isOpen=false" class="px-3 rounded-sm shadow hover:bg-red-500">
                    <button class="text-gray-900">&times;</button>
                </div>
            </div>
            <div class="p-4 mx-16 shadow-lg">
                <p class="w-full text-center">{{$berita->picture}}</p>
                        <img src="{{ asset('storage/' . $berita->picture) }}" alt="Main Picture" class="block mx-auto mt-2 mb-2 h-96">
                        <div class="mt-5">
                            <h1 class="text-2xl font-bold">{{ $berita->title_berita }}</h1>
                        </div>
                        <div class="flex items-center mt-5">
                            <img src="{{ asset('images/Calendar.png') }}" alt="pinpoint" class="w-3 h-3 mt-2 mr-2">  
                            <p class="mt-2">{{ \Carbon\Carbon::parse($berita->tanggal)->locale('id')->translatedFormat('d F Y') }}</p>
                        </div>
            </div>
                    <div class="p-4 mx-16 mt-10 shadow-lg">
                        <p>{!! nl2br(e($berita->description)) !!}</p>
                    </div>
        </div>
    </div>
</div>

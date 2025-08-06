<div x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
    <!-- Button to open the modal -->
    <button @click="isOpen=true"
        class="inline-block px-3 py-1 text-white text-center bg-green-500 rounded hover:bg-green-700">View</button>

    <!-- Modal Background -->
    <div x-show="isOpen" class="fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center z-50">
        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-8/10 max-h-[100vh] overflow-y-auto">

            <div class="flex justify-between items-center bg-gray-200 p-4 rounded-t-lg sticky top-0">
                <h3 class="text-xl font-semibold">View Detail</h3>
                <button @click="isOpen=false" class="text-gray-600 hover:text-gray-900">&times;</button>
            </div>
            <div class="p-4">
                <h1 class="text-2xl font-bold ">{{ $update_campaign->title }}</h1>
                <img src="{{ asset('storage/images/update_campaign/' . $update_campaign->picture) }}" alt="main picture"
                    class="h-96 mb-2 mt-2 mx-auto block">
                {{-- <p>{{ $campaign->description }}</p> --}}
                <div class="flex flex-col items-center justify-center px-2 md:px-6 py-12 lg:px-8">
                    <p wire:key="campaign-{{ $update_campaign->id_update_campaign }}">{!! $processedDesc !!}</p>
                    <p class="mt-2">id campaign: {{ $update_campaign->id_campaign }}</p>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Mitra LAZISNU Cilacap" backUrl="{{ route('landing') }}"/>
    <div class="flex flex-col w-full min-h-screen px-4 py-4 mb-8 bg-gray-100 shadow-md md:w-[414px]">
        <h2 class="pb-5 font-semibold text-green-500">Mitra Kami</h2>
        <div class="w-full p-4 mb-16 border-4 border-green-500 rounded-xl">
            <div class="grid grid-cols-3 gap-4"> <!-- Adjust grid to 3 columns for better fit -->
                @foreach ($mitras as $mitra)
                    <div class="flex items-center justify-center">
                        <div class="px-2 py-2">
                            <img src="{{ asset('storage/' . $mitra->logo) }}" alt="Main Picture" class="block w-24 mx-auto mt-2 mb-2">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

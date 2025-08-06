<div  x-data="{ isOpen: false }" @modal-closed.window="isOpen = false">
    <!-- Button to open the modal -->
    <span @click="isOpen=true" class="text-green-500 cursor-pointer hover:underline">Baca Selengkapnya...</span>

    <!-- Modal Background -->
    <div x-show="isOpen" class="fixed inset-0 z-50 flex items-center justify-center px-4 bg-gray-600 bg-opacity-75">
        <!-- Modal Content -->
        <div class="w-[414px] md:w-full px-4 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 bg-gray-200 rounded-t-lg">
                <h3 class="text-xl font-semibold text-green-500">Sekilas NU-Care Lazisnu Cilacap</h3>
                <div @click="isOpen=false" class="px-3 rounded-sm shadow hover:bg-red-500">
                    <button class="text-gray-900">&times;</button>
                </div>
            </div>
            <div class="p-4 max-h-[500px] overflow-y-auto">
                <div class="flex flex-col items-start mt-4">
                    <h2 class="w-full font-semibold text-left text-green-500">Visi</h2>
                    @foreach($visis as $visi)
                        <p> {!! nl2br(e($visi->visi)) !!} </p>
                    @endforeach
                    <h2 class="w-full mt-4 font-semibold text-left text-green-500">Misi</h2>
                    @php
                        $index = 1;
                    @endphp

                    @foreach ($misis as $Misi)
                        <div class="flex mt-4">
                            <h1 class="pr-2 text-sm">{{ $index }}.</h1>
                            <p class="text-sm">
                                {!! nl2br(e($Misi->misi)) !!}
                            </p>
                        </div>
                        @php
                            $index++;
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

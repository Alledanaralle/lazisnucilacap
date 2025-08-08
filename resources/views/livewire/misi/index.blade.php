<div class="mx-5">
    <div class="flex justify-between mx-4 mt-12">
        <h1 class="text-2xl font-bold ">Misi Table</h1>
        <div>
        </div>
        <!-- Modal Form -->
        <livewire:misi.create />
    </div>

        <div class="overflow-x-auto w-full">
            <table class="w-full mt-4 bg-white border border-gray-200 datatable shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="px-6 py-3 text-left font-semibold">Misi</th>
                    <th class="px-4 py-2 text-center">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($misis as $Misi)
                    <tr class="flex justify-between border-t" wire:key="visi-{{ $Misi->id_misi }}">
                        <td class="flex px-4 py-2 ">
                            <div class="flex-row flex justify-between">
                                <a wire:click="moveUp({{ $Misi->id_misi }})" class="{{ $Misi->order == 1 ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}" wire:key="up-{{ $Misi->id_misi }}">
                                    🔼
                                </a>
                                <a wire:click="moveDown({{ $Misi->id_misi }})" class="{{ $Misi->order == $maxOrder ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}"wire:key="down-{{ $Misi->id_misi }}">
                                    🔽
                                </a>
                                
                            </div>
                            <p class="w-full break-loose">{!! nl2br(e($Misi->misi)) !!}</p>
                        </td>
                        <td class="flex justify-center px-4 py-2 space-x-1">
                            <livewire:misi.edit :id_misi="$Misi->id_misi" wire:key="edit-{{ $Misi->id_misi }}" />
            
                            <button class="inline-block px-3 py-1 text-white bg-red-500 rounded hover:bg-red-700" 
                                onclick="confirmDelete({{ $Misi->id_misi }})">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
        </div>
    </div>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Trigger Livewire destroy method
                    @this.call('destroy', id);
                }
            })
        }
    </script>
</div>

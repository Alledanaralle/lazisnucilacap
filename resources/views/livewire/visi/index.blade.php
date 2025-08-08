<div class="mx-5">
    <div class="flex justify-between mx-4 mt-12">
        <h1 class="text-2xl font-bold ">Visi Table</h1>
        <div>
        </div>
        <!-- Modal Form -->
        <livewire:visi.create />
    </div>

        <div class="overflow-x-auto w-full">
            <table class="min-w-full mt-4 bg-white border border-gray-200 datatable shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="px-6 py-3 text-left font-semibold">Visi</th>
                    <th class="px-6 py-3 text-left font-semibold">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($visis as $Visi)
                    <tr class="border-t" wire:key="visi-{{ $Visi->id_visi }}">
                        <td class="px-4 py-2">
                            <div class="flex-col justify-between">
                                <a wire:click="moveUp({{ $Visi->id_visi }})" class="{{ $Visi->order == 1 ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}" wire:key="up-{{ $Visi->visi }}">
                                    🔼
                                </a>
                                <a wire:click="moveDown({{ $Visi->id_visi }})" class="{{ $Visi->order == $maxOrder ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}"wire:key="down-{{ $Visi->visi }}">
                                    🔽
                                </a>
                                
                            </div>
                            <p>{!! nl2br(e($Visi->visi)) !!}</p>
                        </td>
                        <td class="flex justify-center px-4 py-2 space-x-1">
        <livewire:visi.edit :id_visi="$Visi->id_visi" wire:key="edit-{{ $Visi->id_visi }}" />

                            <button class="inline-block px-3 py-1 text-white bg-red-500 rounded hover:bg-red-700" 
                                onclick="confirmDelete({{ $Visi->id_visi }})">
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

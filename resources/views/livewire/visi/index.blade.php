<div class="mx-5 shadow-2xl">
    <div class="flex justify-between mx-4 mt-12">
        <h1 class="text-2xl font-bold ">Visi Table</h1>
        <div>
            @if (session()->has('message'))
                <div id="flash-message"
                    class="flex items-center justify-between p-4 mx-12 mt-8 mb-4 text-white bg-green-500 rounded">
                    <span>{{ session('message') }}</span>
                    <button class="p-1"  onclick="document.getElementById('flash-message').style.display='none'"
                        class="font-bold text-white">
                        &times;
                    </button>
                </div>
            @endif
        </div>
        <!-- Modal Form -->
        <livewire:visi.create />
    </div>

        <table class="min-w-full mt-4 bg-white border border-gray-200">
            <thead>
                <tr class="items-center w-full text-white align-middle bg-gray-800">
                    <th class="px-4 py-2 text-center">Visi</th>
                    <th class="px-4 py-2 text-center">Action</th>

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

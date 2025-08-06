<div class="mx-5 shadow-2xl">
    <div class="flex justify-between mx-4 mt-12">
        <h1 class="text-2xl font-bold ">Misi Table</h1>
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
        <livewire:misi.create />
    </div>

        <table class="w-full mt-4 bg-white border border-gray-200">
            <thead>
                <tr class="items-center w-full text-white align-middle bg-gray-800">
                    <th class="px-4 py-2 text-center">Misi</th>
                    <th class="px-4 py-2 text-center">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($misis as $Misi)
                    <tr class="flex justify-between border-t" wire:key="visi-{{ $Misi->id_misi }}">
                        <td class="flex px-4 py-2 ">
                            <div class="flex-col justify-between">
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

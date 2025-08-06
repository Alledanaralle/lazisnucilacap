<div class="mx-5 shadow-2xl">
    <div class="flex justify-between mx-4 mt-12">
        <h1 class="text-2xl font-bold ">Gambar Landing Table</h1>
        <div>
            @if (session()->has('message'))
                <div id="flash-message"
                    class="flex items-center justify-between p-4 mx-12 mt-8 mb-4 text-white bg-green-500 rounded">
                    <span>{{ session('message') }}</span>
                    <button class="p-1" onclick="document.getElementById('flash-message').style.display='none'"
                        class="font-bold text-white">
                        &times;
                    </button>
                </div>
            @endif
        </div>
        <!-- Modal Form -->
        <livewire:gambar-landing.create />
    </div>
    <table class="min-w-full mt-4 bg-white border border-gray-200 ">
        <thead>
            <tr class="items-center w-full text-white align-middle bg-gray-800">
                <th class="px-4 py-2">Gambar</th>
                <th class="px-4 py-2">Link</th>
                <th class="px-16 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($landings as $landing)
                <tr class="border-t" wire:key="landing-{{ $landing->id_gambar }}">
                    <td class="flex px-4 py-2">
                        <div class="flex flex-col justify-center">
                            <a wire:click="moveUp({{ $landing->id_gambar }})" class="{{ $landing->position == 1 ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}" wire:key="up-{{ $landing->id_gambar }}">
                                🔼
                            </a>
                            <a wire:click="moveDown({{ $landing->id_gambar }})" class="{{ $landing->position == $maxPosition ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}"wire:key="down-{{ $landing->id_gambar }}">
                                🔽
                            </a>
                        </div>
                        <img src="{{ asset('storage/' . $landing->gambar) }}" alt="Main Picture"
                            class="block w-1/2 mx-auto mt-2 mb-2">
                    </td>
                    <td class="px-4 py-2">
                        <p>{{$landing->link}}</p>
                    </td>
                    <td class="px-4 py-2">
                        <div class="flex items-center gap-2">
                            <livewire:gambar-landing.edit :id_gambar="$landing->id_gambar" wire:key="edit-{{ $landing->id_gambar }}"/>
                            <button class="inline-block px-3 py-1 text-white bg-red-500 rounded hover:bg-red-700" 
                                onclick="confirmDelete({{ $landing->id_gambar }})">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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

<div class="mx-5 shadow-2xl">
    <div class="flex justify-between mx-4 mt-12">
        <h1 class="text-2xl font-bold ">Mitra Table</h1>
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
        <input type="text" wire:model.live="search" placeholder="   Search" class="ml-4 border border-gray-300 rounded-lg">
        <livewire:mitra.create />
    </div>

        <table class="min-w-full mt-4 bg-white border border-gray-200">
            <thead>
                <tr class="items-center w-full text-white align-middle bg-gray-800">
                    <th class="px-4 py-2 text-center">Nama</th>
                    <th class="px-4 py-2 text-center">Logo</th>
                    <th class="px-4 py-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mitras as $mitra)
                    <tr class="border-t" wire:key="mitra-{{ $mitra->id_partner }}">
                        <td class="flex justify-center px-4 py-2 break-words">{{ $mitra->partner_name }}</td>
                        <td class="px-4 py-2">
                            <img src="{{ asset('storage/' . $mitra->logo) }}" alt="Main Picture" class="block w-24 mx-auto mt-2 mb-2">
                        </td>
                        <td class="flex justify-center px-4 py-2 space-x-1">
                            <livewire:mitra.edit :id_partner="$mitra->id_partner" wire:key="edit-{{ $mitra->id_partner }}" />
                            <button class="inline-block px-3 py-1 text-white bg-red-500 rounded hover:bg-red-700" 
                                onclick="confirmDelete({{ $mitra->id_partner }})">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <!-- Pagination Controls -->
        <div class="py-8 mt-4 text-center">
            {{ $mitras->links('pagination::tailwind') }}
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

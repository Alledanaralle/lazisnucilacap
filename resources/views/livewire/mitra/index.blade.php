<div class="mx-5">
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
        <livewire:mitra.create />
    </div>

        <div class="overflow-x-auto w-full">
            <table class="min-w-full mt-4 bg-white border border-gray-200 datatable shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="px-6 py-3 text-left font-semibold">Nama</th>
                    <th class="px-6 py-3 text-left font-semibold">Logo</th>
                    <th class="px-6 py-3 text-left font-semibold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mitras as $mitra)
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50" wire:key="mitra-{{ $mitra->id_partner }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $mitra->partner_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <img src="{{ asset('storage/' . $mitra->logo) }}" alt="Main Picture" class="block w-24 mx-auto mt-2 mb-2">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-2">
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
        </div>
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

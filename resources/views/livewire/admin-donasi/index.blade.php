<div class="mx-5">
    <div class="flex justify-between mx-4 mt-12">
        <h1 class="text-2xl font-bold ">Donasi Table</h1>
        <div>
        </div>
        <!-- Modal Form -->
        <livewire:admin-donasi.create />
    </div>

    <div class="overflow-x-auto w-full">
        <table class="min-w-full bg-white border border-gray-300 datatable shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="w-full text-white bg-gray-800">
                <th scope="col" class="px-6 py-3 border-b border-gray-300 text-left font-semibold">#</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300 text-left font-semibold">Id_user</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300 text-left font-semibold">Name</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300 text-left font-semibold">Telp</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300 text-left font-semibold">Jumlah Donasi</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300 text-left font-semibold">Id Campaign</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300 text-left font-semibold">Created At</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300 text-left font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($donasis as $donasi)
                    <tr wire:key="donasi-{{ $donasi->id_donasi }}" class="bg-white border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->index + $donasis->firstItem() }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $donasi->id_user }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $donasi->username }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $donasi->no_telp }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $donasi->jumlah_donasi }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $donasi->id_campaign }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $donasi->created_at->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-2">
                            <livewire:admin-donasi.edit :id_donasi="$donasi->id_donasi" wire:key="donasi-{{ $donasi->id_donasi }}"/>
                            <button class="inline-block px-3 py-1 text-white bg-red-500 rounded hover:bg-red-700" 
                                onclick="confirmDelete({{ $donasi->id_donasi }})">
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
        {{ $donasis->links('pagination::tailwind') }}
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

<div class="mx-5 shadow-2xl">
    <div class="flex justify-between mx-4 mt-12">
        <h1 class="text-2xl font-bold ">Donasi Table</h1>
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
        <livewire:admin-donasi.create />
    </div>

    <table class="min-w-full mx-2 mt-8 bg-white border border-gray-300">
        <thead>
            <tr class="w-full text-white bg-gray-800">
                <th scope="col" class="px-6 py-3 border-b border-gray-300">#</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300">Id_user</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300">Name</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300">Telp</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300">Jumlah Donasi</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300">Id Campaign</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300">Created At</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($donasis as $donasi)
                    <tr wire:key="donasi-{{ $donasi->id_donasi }}" class="bg-gray-100 even:bg-gray-200">
                        <td class="px-6 py-4 border-b border-gray-300">{{ $loop->index + $donasis->firstItem() }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $donasi->id_user }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $donasi->username }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $donasi->no_telp }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $donasi->jumlah_donasi }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $donasi->id_campaign }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $donasi->created_at->format('d/m/Y') }}</td>
                        <td class="flex px-6 py-4 space-x-2 border-b border-gray-300">
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

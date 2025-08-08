<div class="mx-5">
    <div class="flex justify-between mx-4 mt-12">
        <h1 class="text-2xl font-bold ">Petugas Table</h1>
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
        <livewire:petugas.create />
    </div>

        <div class="overflow-x-auto w-full">
            <table class="min-w-full mt-4 bg-white border border-gray-200 datatable shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="px-6 py-3 text-left font-semibold">Nama</th>
                    <th class="px-6 py-3 text-left font-semibold">No Telepon</th>
                    <th class="px-6 py-3 text-left font-semibold">Bagian</th>
                    <th class="px-6 py-3 text-left font-semibold">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($petugases as $petugas)
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50" wire:key="petugas-{{ $petugas->id_petugas }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $petugas->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $petugas->no }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $petugas->bagian }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-2">
                                <livewire:petugas.edit :id_petugas="$petugas->id_petugas" wire:key="edit-{{ $petugas->id_petugas }}" />
                                <button class="inline-block px-3 py-1 text-white bg-red-500 rounded hover:bg-red-700" 
                                onclick="confirmDelete({{ $petugas->id_petugas }})">
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

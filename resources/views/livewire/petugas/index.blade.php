<div class="mx-5 shadow-2xl">
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

        <table class="min-w-full mt-4 bg-white border border-gray-200">
            <thead>
                <tr class="items-center w-full text-white align-middle bg-gray-800">
                    <th class="px-4 py-2 text-center">Nama</th>
                    <th class="px-4 py-2 text-center">No Telepon</th>
                    <th class="px-4 py-2 text-center">Bagian</th>
                    <th class="px-4 py-2 text-center">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($petugases as $petugas)
                    <tr class="text-center border-t" wire:key="petugas-{{ $petugas->id_petugas }}">
                        <td class="px-4 py-2">{{ $petugas->nama }}</td>
                        <td class="px-4 py-2">{{ $petugas->no }}</td>
                        <td class="px-4 py-2">{{ $petugas->bagian }}</td>
                        <td class="flex justify-center px-4 py-2 space-x-1">
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

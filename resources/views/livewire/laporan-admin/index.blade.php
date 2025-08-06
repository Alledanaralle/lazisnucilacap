<div class="mx-5 shadow-2xl">
    <div class="flex justify-between mx-4 mt-12">
        <h1 class="text-2xl font-bold ">File Laporan Table</h1>
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
        <livewire:laporan-admin.create />
    </div>
    <table class="min-w-full mt-4 bg-white border border-gray-200 ">
        <thead>
            <tr class="items-center w-full text-white align-middle bg-gray-800">
                <th class="px-4 py-2">Nama File</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $laporan)
                <tr class="text-center border-t" wire:key="laporan-{{ $laporan->id }}">
                    <td class="px-4 py-2">
                        <p>{{$laporan->nama}}</p>
                    </td>
                    <td class="px-4 py-2">
                        <div class="flex items-center justify-center gap-2">
                            <livewire:laporan-admin.edit :id="$laporan->id" wire:key="edit-{{ $laporan->id }}"/>
                            <button class="inline-block px-3 py-1 text-white bg-red-500 rounded hover:bg-red-700" 
                                onclick="confirmDelete({{ $laporan->id }})">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination Controls -->
    <div class="py-8 mt-4 text-center">
        {{ $laporans->links('pagination::tailwind') }}
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

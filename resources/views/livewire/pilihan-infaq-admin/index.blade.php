<div class="mx-5 shadow-2xl">
    <div class="flex justify-between mx-4 mt-12">
        <h1 class="text-2xl font-bold ">Pilihan infaq Table</h1>
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
        <livewire:pilihan-infaq-admin.create />
    </div>
    <table class="min-w-full mt-4 bg-white border border-gray-200">
        <thead>
            <tr class="items-center w-full text-white align-middle bg-gray-800">
                <th class="px-4 py-2 text-center">Pilihan infaq</th>
                <th class="px-4 py-2 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pilihan_infaqs as $pilihan_infaq)
                <tr class="border-t" wire:key="pilihan_infaq-{{ $pilihan_infaq->id }}">
                    <td class="max-w-xs px-4 py-2 text-center">{{ $pilihan_infaq->pil_infaq }}</td>
                    <td class="px-4 py-2">
                        <div class="flex items-center justify-center gap-3">
                            <div class="flex space-x-2">
                                <livewire:pilihan-infaq-admin.edit :id="$pilihan_infaq->id" wire:key="edit-{{ $pilihan_infaq->id }}" />
                            </div>
                            <button class="inline-block px-3 py-1 text-white bg-red-500 rounded hover:bg-red-700" 
                                onclick="confirmDelete({{ $pilihan_infaq->id }})">
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
        {{ $pilihan_infaqs->links('pagination::tailwind') }}
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

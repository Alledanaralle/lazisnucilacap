<div class="mx-5">
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
        <livewire:pilihan-infaq-admin.create />
    </div>
    <div class="overflow-x-auto w-full">
        <table class="min-w-full mt-4 bg-white border border-gray-200 datatable shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-800 text-white">
                <th class="px-6 py-3 text-left font-semibold">Pilihan infaq</th>
                <th class="px-6 py-3 text-left font-semibold">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pilihan_infaqs as $pilihan_infaq)
                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50" wire:key="pilihan_infaq-{{ $pilihan_infaq->id }}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $pilihan_infaq->pil_infaq }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-2">
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
    </div>
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

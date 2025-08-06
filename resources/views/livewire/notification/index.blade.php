<div class="mx-5 shadow-2xl">
    <div class="flex justify-between mx-4 mt-12">
        <div class="flex justify-between w-full">
            <div>
                <h1 class="text-2xl font-bold ">Notification Table</h1>
            </div>
            <div wire:loading>
                <div class="spinner mr-8"></div>
            </div>
        </div>
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
    </div>
    <table class="min-w-full mt-4 bg-white border border-gray-200">
        <thead>
            <tr class="items-center w-full text-white align-middle bg-gray-800">
                <th class="px-4 py-2 text-center">Username</th>
                <th class="px-4 py-2 text-center">Status</th>
                <th class="px-4 py-2 text-center">No Telp</th>
                <th class="px-4 py-2 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notifications as $notification)
                <tr class="items-center w-full align-middle" wire:key="notification-{{ $notification->id }}">
                    <td class="px-4 py-2 text-center break-words">{{ $notification->transaction->username }}</td>
                    <td class="px-4 py-2 text-center break-words">{{ $notification->response }}</td>
                    <td class="px-4 py-2 text-center break-words">{{ $notification->no_telp }}</td>
                    @if ($notification->response != 'success')
                        <td class="px-4 py-2 text-center space-x-1">
                            <button class="inline-block px-3 py-1 text-white bg-blue-500 rounded hover:bg-blue-700"
                                wire:click="send({{ $notification->id }})"
                                wire:key="send-{{ $notification->id }}">Send</button>
                            {{-- <button class="inline-block px-3 py-1 text-white bg-red-500 rounded hover:bg-red-700"
                        onclick="confirmDelete({{ $notification->id }})">
                        Delete
                    </button> --}}
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Controls -->
    <div class="py-8 mt-4 text-center">
        {{ $notifications->links('pagination::tailwind') }}
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

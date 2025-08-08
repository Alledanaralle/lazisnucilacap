<div class="mx-5">
    <div class="flex justify-between mx-4 mt-12">
        <h1 class="text-2xl font-bold ">User Table</h1>
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
        <livewire:user.create />
    </div>

    <div class="overflow-x-auto w-full">
        <table class="min-w-full mx-2 mt-8 bg-white border border-gray-300 datatable shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="w-full text-white bg-gray-800">
                <th scope="col" class="px-6 py-3 text-left font-semibold">#</th>
                <th scope="col" class="px-6 py-3 text-left font-semibold">Name</th>
                <th scope="col" class="px-6 py-3 text-left font-semibold">Role</th>
                <th scope="col" class="px-6 py-3 text-left font-semibold">No Telp</th>
                <th scope="col" class="px-6 py-3 text-left font-semibold">Created At</th>
                <th scope="col" class="px-6 py-3 text-left font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody>
            
            
                @foreach ($users as $user)
                    <tr wire:key="user-{{ $user->id_user }}" class="bg-white border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->index + $users->firstItem() }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->username }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->role }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->no_telp }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->created_at->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-2">
                            <livewire:user.edit :id_user="$user->id_user" wire:key="user-{{ $user->id_user }}"/>
                            <button class="inline-block px-3 py-1 text-white bg-red-500 rounded hover:bg-red-700" 
                                onclick="confirmDelete({{ $user->id_user }})">
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
        {{ $users->links('pagination::tailwind') }}
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

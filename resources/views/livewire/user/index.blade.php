<div class="mx-5 shadow-2xl">
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

    <table class="min-w-full mx-2 mt-8 bg-white border border-gray-300">
        <thead>
            <tr class="w-full text-white bg-gray-800">
                <th scope="col" class="px-6 py-3 border-b border-gray-300">#</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300">Name</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300">Role</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300">No Telp</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300">Created At</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody>
            
            
                @foreach ($users as $user)
                    <tr wire:key="user-{{ $user->id_user }}" class="bg-gray-100 even:bg-gray-200">
                        <td class="px-6 py-4 border-b border-gray-300">{{ $loop->index + $users->firstItem() }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $user->username }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $user->role }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $user->no_telp }}</td>
                        <td class="px-6 py-4 border-b border-gray-300">{{ $user->created_at->format('d/m/Y') }}</td>
                        <td class="flex px-6 py-4 space-x-2 border-b border-gray-300">
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

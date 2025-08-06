<div class="flex flex-col justify-between mx-4 mt-12">

    <div class="mt-4">
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

        <livewire:admin-campaign.create />

        <table class="min-w-full mt-4 bg-white border border-gray-200">
            <thead class="bg-gray-200">
                <tr class="w-full text-white bg-gray-800">
                    <th class="px-4 py-2 text-left">Title</th>
                    {{-- <th class="px-4 py-2 text-left">Description</th> --}}
                    <th class="px-4 py-2 text-left border-b border-gray-300">Goal</th>
                    <th class="px-4 py-2 text-left border-b border-gray-300">Raised</th>
                    <th class="px-4 py-2 text-left border-b border-gray-300">Start Date</th>
                    <th class="px-4 py-2 text-left border-b border-gray-300">End Date</th>
                    <th class="px-4 py-2 text-left border-b border-gray-300">Min Donation</th>
                    <th class="px-4 py-2 text-left border-b border-gray-300">Lokasi</th>
                    <th class="px-4 py-2 text-left border-b border-gray-300">Kategori</th>
                    <th class="px-4 py-2 text-left border-b border-gray-300">Main Picture</th>
                    <th class="px-4 py-2 text-left border-b border-gray-300">Action</th>
                    {{-- <th class="px-4 py-2 text-left">Last Picture</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($campaigns as $campaign)
                    <tr class="border-t" wire:key="row-{{ $campaign->id_campaign }}">
                        <td class="px-4 py-2">{{ \Illuminate\Support\Str::limit($campaign->title, 10, '...') }}</td>
                        <td class="px-4 py-2">{{ $campaign->goal }}</td>
                        <td class="px-4 py-2">{{ $campaign->raised }}</td>
                        <td class="px-4 py-2">{{ $campaign->start_date }}</td>
                        <td class="px-4 py-2">{{ $campaign->end_date }}</td>
                        <td class="px-4 py-2">{{ $campaign->min_donation }}</td>
                        <td class="px-4 py-2">{{ $campaign->lokasi }}</td>
                        <td class="px-4 py-2">{{ $campaign->kategori->nama_kategori ?? 'No Kategori' }}</td>
                        <td class="px-4 py-2">
                            <img src="{{ asset('storage/images/campaign/' . $campaign->main_picture) }}"
                                alt="Main Picture" class="object-cover w-16 h-16">
                        </td>
                        <td class="flex px-4 py-2 space-x-1">
                            <livewire:admin-campaign.edit :campaign="$campaign" wire:key="edit-{{ rand().$campaign->id_campaign }}" />
                            <livewire:admin-campaign.show :id_campaign="$campaign->id_campaign" wire:key="show-{{ rand().$campaign->id_campaign }}" />
                            <button class="inline-block px-3 py-1 text-white bg-red-500 rounded hover:bg-red-700" 
                                onclick="confirmDelete({{ $campaign->id_campaign }})">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination Controls -->
        <div class="py-8 mt-4 text-center">
            {{ $campaigns->links('pagination::tailwind') }}
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

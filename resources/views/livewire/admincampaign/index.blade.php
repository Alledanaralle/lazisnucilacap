<div class="flex flex-col justify-between mx-4 mt-12">

    <div class="mt-4">
        <div>
        </div>

        <livewire:admin-campaign.create />

        <div class="overflow-x-auto w-full">
            <table class="min-w-full mt-4 bg-white border border-gray-200 datatable shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr class="w-full text-white bg-gray-800">
                    <th class="px-6 py-3 text-left font-semibold">Title</th>
                    {{-- <th class="px-4 py-2 text-left">Description</th> --}}
                    <th class="px-6 py-3 text-left font-semibold">Goal</th>
                    <th class="px-6 py-3 text-left font-semibold">Raised</th>
                    <th class="px-6 py-3 text-left font-semibold">Start Date</th>
                    <th class="px-6 py-3 text-left font-semibold">End Date</th>
                    <th class="px-6 py-3 text-left font-semibold">Min Donation</th>
                    <th class="px-6 py-3 text-left font-semibold">Lokasi</th>
                    <th class="px-6 py-3 text-left font-semibold">Kategori</th>
                    <th class="px-6 py-3 text-left font-semibold">Main Picture</th>
                    <th class="px-6 py-3 text-left font-semibold">Action</th>
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
        </div>
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

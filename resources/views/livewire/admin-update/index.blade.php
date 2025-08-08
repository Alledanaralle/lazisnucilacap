<div class="mt-12 mx-4 flex flex-col justify-between">

    <div class="mt-4">
        <div>
        </div>

        <livewire:admin-update.create />

        <div class="overflow-x-auto w-full">
            <table class="min-w-full bg-white border border-gray-200 mt-4 datatable shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr class="w-full text-white bg-gray-800">
                    <th class="px-6 py-3 text-left font-semibold">Desc</th>
                    <th class="px-6 py-3 text-left font-semibold">Id Campaign</th>
                    <th class="px-6 py-3 text-left font-semibold">Picture</th>
                    <th class="px-6 py-3 text-left font-semibold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($update_campaigns as $update_campaign)
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50" wire:key="row-{{ $update_campaign->id_update_campaign }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ \Illuminate\Support\Str::limit($update_campaign->description, 20, '...') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $update_campaign->id_campaign }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <img src="{{ asset('storage/images/update_campaign/' . $update_campaign->picture) }}"
                                alt="Main Picture" class="w-20 h-20 object-cover">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-2">
                            <livewire:admin-update.edit :update_campaign="$update_campaign"
                                wire:key="edit-{{ rand() . $update_campaign->id_update_campaign }}" />
                            <livewire:admin-update.show :id_update_campaign="$update_campaign->id_update_campaign"
                                wire:key="show-{{ rand() . $update_campaign->id_update_campaign }}" />
                            <button
                                class="inline-block px-3 py-1 text-white text-center bg-red-500 rounded hover:bg-red-700"
                                wire:click="destroy({{ $update_campaign->id_update_campaign }})"
                                wire:confirm="Are you sure?">Delete</button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <!-- Pagination Controls -->
        <div class="mt-4 text-center py-8">
            {{ $update_campaigns->links('pagination::tailwind') }}
        </div>
    </div>

</div>

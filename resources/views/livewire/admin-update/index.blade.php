<div class="mt-12 mx-4 flex flex-col justify-between">

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

        <livewire:admin-update.create />

        <table class="min-w-full bg-white border border-gray-200 mt-4">
            <thead class="bg-gray-200">
                <tr class="w-full text-white bg-gray-800">
                    <th class="px-4 py-2 border-b border-gray-300 text-left">Desc</th>
                    <th class="px-4 py-2 border-b border-gray-300 text-left">Id Campaign</th>
                    <th class="px-4 py-2 border-b border-gray-300 text-left">Picture</th>
                    <th class="px-4 py-2 border-b border-gray-300 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($update_campaigns as $update_campaign)
                    <tr class="border-t" wire:key="row-{{ $update_campaign->id_update_campaign }}">
                        <td class="px-4 py-2">
                            {{ \Illuminate\Support\Str::limit($update_campaign->description, 20, '...') }}
                        </td>
                        <td class="px-4 py-2">{{ $update_campaign->id_campaign }}</td>
                        <td class="px-4 py-2">
                            <img src="{{ asset('storage/images/update_campaign/' . $update_campaign->picture) }}"
                                alt="Main Picture" class="w-20 h-20 object-cover">
                        </td>
                        <td class="flex px-4 py-2 space-x-1">
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
        <!-- Pagination Controls -->
        <div class="mt-4 text-center py-8">
            {{ $update_campaigns->links('pagination::tailwind') }}
        </div>
    </div>

</div>

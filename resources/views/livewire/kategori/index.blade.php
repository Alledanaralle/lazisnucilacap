<div class="mx-5 shadow-2xl">
    <div class="flex justify-between mx-4 mt-12">
        <h1 class="text-2xl font-bold ">kategori Table</h1>
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
        <livewire:kategori.create />
    </div>
    <div class="overflow-x-auto w-full">
        <table class="min-w-full mt-4 bg-white border border-gray-200 datatable shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="w-full text-white bg-gray-800">
                <th class="px-6 py-3 text-left font-semibold">Image</th>
                <th class="px-6 py-3 text-left font-semibold">Kategori</th>
                <th class="px-6 py-3 text-left font-semibold">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $kategori)
                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50" wire:key="kategori-{{ $kategori->id }}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <img src="{{ asset('storage/images/kategori/' . $kategori->image) }}" alt="Main Picture"
                            class="block w-1/2 mx-auto mt-2 mb-2">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <p>{{$kategori->nama_kategori}}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-2">
                        <div class="flex items-center">
                            <livewire:kategori.edit :id="$kategori->id" wire:key="edit-{{ $kategori->id }}"/>
                            <button
                                class="inline-block px-3 py-2 mx-auto text-white bg-red-500 rounded hover:bg-red-700"
                                wire:click="destroy({{ $kategori->id }})"
                                wire:confirm="Are you sure?">Delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <!-- Pagination Controls -->
    <div class="py-8 mt-4 text-center">
        {{ $kategoris->links('pagination::tailwind') }}
    </div>
</div>

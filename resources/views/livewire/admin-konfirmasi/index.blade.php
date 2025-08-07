<div class="mx-5 shadow-2xl">
    <div class="flex justify-between mx-4 mt-12">
        <h1 class="text-2xl font-bold ">Konfirmasi Table</h1>
    </div>

    <div class="overflow-x-auto w-full">
        <table class="min-w-full bg-white border border-gray-200 datatable shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="w-full text-white bg-gray-800">
                <th class="px-6 py-3 text-left font-semibold">Nama</th>
                <th class="px-6 py-3 text-left font-semibold">No Telepon</th>
                <th class="px-6 py-3 text-left font-semibold">Email</th>
                <th class="px-6 py-3 text-left font-semibold">Program</th>
                <th class="px-6 py-3 text-left font-semibold">Bukti</th>
                <th class="px-6 py-3 text-left font-semibold">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($konfirmasis as $konfirmasi)
                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50" wire:key="konfirmasi-{{ $konfirmasi->id_konfirmasi }}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $konfirmasi->nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $konfirmasi->no_telp }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $konfirmasi->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $konfirmasi->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <img src="{{ asset('storage/' . $konfirmasi->bukti) }}" alt="Bukti Transfer"
                            class="block w-24 h-auto mx-auto">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-2">
                        <button class="inline-block px-3 py-1 text-white bg-red-500 rounded hover:bg-red-700"
                            wire:click="destroy({{ $konfirmasi->id_konfirmasi }})">Delete</button>
                            <livewire:adminKonfirmasi.show :id_konfirmasi="$konfirmasi->id_konfirmasi" wire:key="show-{{ rand().$konfirmasi->id_konfirmasi }}" />

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="mt-4">
        {{ $konfirmasis->links() }}
    </div>
</div>

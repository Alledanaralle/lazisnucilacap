<div class="mx-5 shadow-2xl">
    <div class="flex justify-between mx-4 mt-12">
        <h1 class="text-2xl font-bold ">Konfirmasi Table</h1>
        <input type="text" wire:model.live="search" placeholder="   Search"
            class="ml-4 border border-gray-300 rounded-lg ">
    </div>

    <table class="min-w-full mt-4 bg-white border border-gray-200">
        <thead>
            <tr class="items-center w-full text-white align-middle bg-gray-800">
                <th class="px-4 py-2 text-center">Nama</th>
                <th class="px-4 py-2 text-center">No Telepon</th>
                <th class="px-4 py-2 text-center">Email</th>
                <th class="px-4 py-2 text-center">Program</th>
                <th class="px-4 py-2 text-center">Bukti</th>
                <th class="px-4 py-2 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($konfirmasis as $konfirmasi)
                <tr class="border-t" wire:key="konfirmasi-{{ $konfirmasi->id_konfirmasi }}">
                    <td class="px-4 py-2 text-center break-words">{{ $konfirmasi->nama }}</td>
                    <td class="px-4 py-2 text-center break-words">{{ $konfirmasi->no_telp }}</td>
                    <td class="px-4 py-2 text-center break-words">{{ $konfirmasi->email }}</td>
                    <td class="px-4 py-2 text-center break-words">{{ $konfirmasi->title }}</td>
                    <td class="px-4 py-2 text-center">
                        <img src="{{ asset('storage/' . $konfirmasi->bukti) }}" alt="Bukti Transfer"
                            class="block w-24 h-auto mx-auto">
                    </td>
                    <td class="px-4 py-2 text-center">
                        <button class="inline-block px-3 py-1 text-white bg-red-500 rounded hover:bg-red-700"
                            wire:click="destroy({{ $konfirmasi->id_konfirmasi }})">Delete</button>
                            <livewire:adminKonfirmasi.show :id_konfirmasi="$konfirmasi->id_konfirmasi" wire:key="show-{{ rand().$konfirmasi->id_konfirmasi }}" />

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $konfirmasis->links() }}
    </div>
</div>

<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Riwayat" />
    <div class="flex flex-col w-full min-h-screen bg-white shadow-md md:w-[414px]">
        <div class="flex flex-col items-center w-full">
            @if ($transactions->isEmpty())
                <p class="text-center ">Pengguna ini belum bertransaksi</p>
                <a href="{{ route('campaign') }}" class="text-center text-green-500 ">Donasi Sekarang</a>
            @else
                <div class="w-full bg-white">
                    <ul>
                        @foreach ($transactions as $transaction)
                            <li class="w-full px-4 my-2 bg-white" wire:key="{{ $transaction->id_transaction }}">
                                @if ($transaction->title)
                                    <div class="text-left">
                                        <span class="text-[12px] text-gray-800">Donasi Untuk Campaign</span>
                                        <span class="text-[12px] text-gray-800 font-bold">{{ $transaction->title }}</span>
                                    </div>
                                @else
                                <div class="text-left">
                                    <span class="text-[12px] text-gray-800">Pembayaran Untuk </span>
                                    <span class="text-[12px] text-gray-800 font-bold">{{ $transaction->jenis }}</span>
                                </div>                                
                                @endif
                                <div class="flex flex-grow w-full py-2 z-5">
                                    <div class="flex flex-col items-start w-full">
                                        <div class="flex items-center space-x-4 ">
                                            <div class="flex flex-col space-y-2">
                                                <p class="text-[11px] text-gray-800">
                                                    Atas Nama
                                                </p>
                                                <p class="text-[11px] text-gray-800">
                                                    Bertransaksi Sebesar
                                                </p>
                                                <p class="text-[11px] text-gray-800">
                                                    Tanggal
                                                </p>
                                                <p class="text-[11px] text-gray-800">
                                                    Status
                                                </p>
                                            </div>
                                            <div class="flex flex-col space-y-2">
                                                <div class="flex items-center flex-grow">
                                                    <p class="text-[11px]">: &nbsp</p>
                                                    <p class="text-[11px] text-black">
                                                        {{ $transaction->username }}
                                                    </p>
                                                </div>
                                                <div class="flex items-center flex-grow">
                                                    <p class="text-[11px]">: &nbsp</p>
                                                    <p class="text-[11px] text-green-500">
                                                        Rp. {{ $transaction->nominal }}
                                                    </p>
                                                </div>
                                                <div class="flex items-center flex-grow">
                                                    <p class="text-[11px]">: &nbsp</p>
                                                    <p class="text-[11px] ">
                                                        {{ $transaction->created_at }}
                                                    </p>
                                                </div>
                                                @if ($transaction->status == 'pending')
                                                    <div class="flex items-center flex-grow">
                                                        <p class="text-[11px]">: &nbsp</p>
                                                        <p
                                                            class="text-[11px] bg-[#FFB61D33] bg-opacity-20 text-[#FFB61D] px-2 py-1 rounded-md">
                                                            {{ $transaction->status }}
                                                        </p>
                                                    </div>
                                                @elseif($transaction->status == 'success')
                                                    <div class="flex items-center flex-grow">
                                                        <p class="text-[11px]">: &nbsp</p>
                                                        <p
                                                            class="text-[11px] bg-[#05E90033] bg-opacity-20 text-[#04B300] px-2 py-1 rounded-md">
                                                            Berhasil
                                                        </p>
                                                    </div>
                                                @else
                                                <div class="flex items-center flex-grow">
                                                    <p class="text-[11px]">: &nbsp</p>
                                                    <p
                                                        class="text-[11px] bg-[#FF646A33] bg-opacity-20 text-red-600 px-2 py-1 rounded-md">
                                                        Gagal
                                                    </p>
                                                </div>
                                                @endif
                                                


                                            </div>
                                        </div>
                                        @if ($transaction->status == 'pending')
                                            <a class="w-full px-2 py-1 mt-4 text-white bg-green-500 rounded-md"
                                                href="https://app.sandbox.midtrans.com/snap/v2/vtweb/{{ $transaction->snap_token }}">
                                                <p class="text-[11px] text-white text-center">
                                                    Bayar
                                                </p>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <div class="h-[4px] w-full bg-gray-200">
                            </div>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div style="height: 67px "></div>

        </div>
    </div>
</div>

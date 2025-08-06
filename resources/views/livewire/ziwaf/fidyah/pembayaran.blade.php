<div class="flex flex-col items-center justify-center ">
    <x-nav-mobile2 title="Pembayaran Fidyah LAZISNU Cilacap" backUrl="{{ route('fidyah.index') }}"/>
    <div class=" w-full max-w-[414px] mx-auto bg-gray-100 py-4">
        <div class="w-full ">
            <div class="mx-4 mt-4">
                <div class="flex-col items-center w-full space-y-4">

                    <div class="flex-col items-center w-full space-y-2">
                        <h2 class="text-[12px] text-gray-500 mb-4">Anda Akan Melakukan Pembayaran Untuk Fidyah</h2>

                        <div class="flex flex-col mt-2">
                    <span class="mb-2">
                        Detail Fidyah
                    </span>
                <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">Atas Nama</div>
                    <div class="w-4 text-gray-500text-center">:</div>
                    <div>{{ $atasNama }}</div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="w-40 text-gray-500">hari</div>
                    <div class="w-4 text-gray-500text-center">:</div>
                    <div>{{ $hari }}</div>
                </div>
                </div>
                <label class="font-semibold">Nominal Fidyah</label>
                <div class="relative flex flex-col mb-3">
                    <div class="flex items-center justify-center">
                        <span class="absolute inset-y-0 left-0 flex items-center px-3 text-green-500 bg-gray-300 border border-black rounded h-9">Rp. </span>
                            <input 
                                type="text" 
                                value="{{ number_format($nominal, 0, ',', '.') }}" 
                                class="w-full py-1 pr-2 text-green-500 bg-gray-300 border border-black rounded pl-14 h-9" 
                                placeholder="Rp. 0" 
                                readonly 
                            />
                    </div>
                </div>
            </div>
        </div>
        <div class="shadow">
            <div class="mx-5 mt-4">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-semibold text-green-500">Data Diri</span>
                    <span wire:click="back" class="flex items-center text-sm font-semibold text-green-500 cursor-pointer">
                        Edit
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 18l6-6-6-6" />
                        </svg>
                    </span>
                </div>
                <div class="mt-2">
                        <div class="flex flex-col">
                            <div class="flex items-center mb-2">
                                <span class="w-24 text-sm font-semibold text-gray-600">Nama</span>
                                <span class="w-4 text-sm font-semibold text-center">:</span>
                                <span class="text-sm font-semibold">{{ $username }}</span>
                            </div>
                            
                            <div class="flex items-center mb-2">
                                <span class="w-24 text-sm font-semibold text-gray-600">Telepon</span>
                                <span class="w-4 text-sm font-semibold text-center">:</span>
                                <span class="text-sm font-semibold">{{ $no_telp }}</span>
                            </div>
                            
                            <div class="flex items-center mb-2">
                                <span class="w-24 text-sm font-semibold text-gray-600">Email</span>
                                <span class="w-4 text-sm font-semibold text-center">:</span>
                                <span class="text-sm font-semibold">{{ $email }}</span>
                            </div>
                        </div>
                </div>
                        </div>
                    </div>

                    <div class="flex-col items-center w-full mt-4 space-y-2">
                        <div>
                            <p class="text-[14px] font-semibold text-black">
                                Rincian Pembayaran
                            </p>
                        </div>
                        <div class="flex items-center w-full">
                            <p class="text-[12px] text-black">
                                Total
                            </p>
                            <p class="ml-7 text-[12px] text-black">
                                : {{ $this->nominal }}
                            </p>
                        </div>
                    </div>
                    <div class="w-full mt-5">
                        <h2 class="font-semibold">
                            Metode Pembayaran
                        </h2>
                    </div>
                    <div id="snap-container" class="w-full"></div>
                    
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.onload = function() {
            window.snap.embed('{{ $this->token }}', {
                embedId: 'snap-container'
            });
        };
    </script>

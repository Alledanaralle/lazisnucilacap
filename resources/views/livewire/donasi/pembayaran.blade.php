<div class="flex flex-col items-center justify-center ">
    <x-nav-mobile2 title="Pembayaran" :backUrl="route('donasi.index', $campaign->title)" />
    <div class=" w-full max-w-[414px] mx-auto bg-gray-100 py-4">
        <div class="w-full ">
            <!-- Kategori and Filter Buttons -->
            <div class="flex items-center justify-between">
                <!-- Campaign Cards -->
                <div class="flex grid items-center justify-center w-full h-auto grid-cols-1" wire:loading.remove>
                    <div class="z-5 flex flex-grow h-[100px] px-4 ">
                        <div
                            class="z-0 relative group flex justify-center items-center w-[220px] h-full overflow-hidden">
                            <img src="{{ asset('storage/images/campaign/' . $campaign->main_picture) }}" alt="Picture"
                                class="object-cover w-full h-full hover:cursor-pointer">
                            <div
                                class="hover:cursor-pointer absolute inset-0 flex items-center justify-center bg-green-600 bg-opacity-80 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="text-white text-lg text-center">View Campaign</p>
                            </div>
                        </div>
                        <div class="px-3  w-4/5 ">
                            <p class="text-[12px] text-gray-400">
                                Anda akan berdonasi untuk campaign
                            </p>
                            <p class="text-[14px] font-semibold text-gray-800">
                                {{ \Illuminate\Support\Str::limit($campaign->title, 40, '...') }}
                            </p>
                            <div class="flex items-center mt-1">
                                <img src="{{ asset('images/icon_location.png') }}" alt="pinpoint" class="w-3 h-3">
                                <p class="pl-1 text-[10px]  text-gray-600">{{ $campaign->lokasi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-4 mt-4">
                <div class="w-full flex-col items-center space-y-4">
                    <div class="w-full flex-col items-center space-y-2">

                        <div>
                            <p class="text-[14px] font-semibold text-black">
                                Data Donatur
                            </p>
                        </div>
                        <div class="flex items-center w-full justify-start space-x-3">
                            <div class="flex-col items-center space-y-1">
                                <p class="text-[12px]  text-black">
                                    Nama
                                </p>

                                <p class="text-[12px]  text-black">
                                    No Telp
                                </p>

                                <p class="text-[12px]  text-black">
                                    Email
                                </p>
                            </div>
                            <div class="flex-col items-center space-y-1">
                                <p class="text-[12px]  text-black">
                                    : {{ $this->username }}
                                </p>
                                <p class="text-[12px]  text-black">
                                    : {{ $this->no_telp }}
                                </p>
                                @if ($this->email)
                                    <p class="text-[12px]  text-black">
                                        : {{ $this->email }}
                                    </p>
                                @else
                                    : -
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="flex-col items-center w-full space-y-2">
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
                                : {{ number_format($this->nominal, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 w-full">
                        <h2 class="font-semibold">
                            Metode Pembayaran
                        </h2>
                    </div>
                    <div id="snap-container" class="w-full"></div>
                    <div class="flex items-center w-full">
                        <form class="flex items-center w-full">
                            <input type="hidden" wire:model="nominal">
                            <input type="hidden" wire:model="username">
                            <input type="hidden" wire:model="no_telp">
                            <input type="hidden" wire:model="email">
                            <input type="hidden" wire:model="doa">
                            {{-- <button id="pay-button"
                                class="text-[12px] bg-green-600 w-full py-2 items-center text-white rounded-lg">
                                Donasi Sekarang
                            </button> --}}
                        </form>
                    </div>
                </div>
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

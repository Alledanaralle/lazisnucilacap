<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Form konfirmasi Donasi" backUrl="{{ route('landing') }}"/>
    <div class="flex flex-col h-full min-h-screen bg-white shadow-md md:w-[414px] w-screen">
        <div class="flex flex-col py-4 px-[24px]">
            <div>
                @if (session()->has('message'))
                    <div id="flash-message"
                        class="flex items-center justify-between p-4 mx-12 mt-8 mb-4 text-white bg-green-500 rounded">
                        <span>{{ session('message') }}</span>
                        <button class="p-1"  onclick="document.getElementById('flash-message').style.display='none'"
                            class="font-bold text-white">
                            &times;
                        </button>
                    </div>
                @endif
            </div>
            <h1 class="font-semibold text-green-500 ">
                Formulir Konfirmasi Donasi
            </h1>
            <form wire:submit="save">
                <div class="flex flex-col pt-2">
                    <h1 class="py-2 text-sm font-semibold">
                        Nama Anda *
                    </h1>
                    <input 
                        type="text" 
                        id="nama" 
                        wire:model.lazy="nama" 
                        wire:input="nama" 
                        class="w-full px-2 py-1 border border-gray-300 rounded" 
                        placeholder="Isikan nama anda" 
                    />
                    @error('nama')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <h1 class="py-2 text-sm font-semibold">
                        No Telepon *
                    </h1>
                    <input 
                        type="text" 
                        id="no_telp" 
                        wire:model.lazy="no_telp" 
                        wire:input="no_telp" 
                        class="w-full px-2 py-1 border border-gray-300 rounded" 
                        placeholder="Isikan No Telepon anda" 
                    />
                    @error('no_telp')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <h1 class="py-2 text-sm font-semibold">
                        Email
                    </h1>
                    <input 
                        type="text" 
                        id="email" 
                        wire:model.lazy="email" 
                        wire:input="email" 
                        class="w-full px-2 py-1 border border-gray-300 rounded" 
                        placeholder="Isikan Email anda" 
                    />
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col pt-2">
                    <div class="relative">
                        <select id="campaign" wire:model="campaign" name="campaign"
                            class="block w-full py-2 pl-3 pr-10 mt-1 text-gray-900 bg-white border border-gray-300 rounded focus:border-indigo-500 focus:ring focus:ring-indigo-500 sm:text-sm">
                            <option value="" disabled selected>Program *</option>
                            @foreach ($campaigns as $campaign)
                                <option value="{{$campaign->title}}"> {{$campaign->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('campaign')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col pt-2">
                    <h1 class="py-2 text-sm font-semibold">
                        Bukti Transfer *
                    </h1>
                    <input 
                        type="file" 
                        id="bukti" 
                        wire:model.lazy="bukti" 
                        wire:input="bukti" 
                        class="w-full px-2 py-1 border border-gray-300 rounded" 
                        placeholder="Isikan No Telepon anda" 
                    />
                    @error('bukti')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <h1 class="py-2 mt-3 text-sm font-semibold">
                        * Wajib diisi
                    </h1>
                </div>
                <div class="py-4">
                    <button type="submit" class="px-4 py-2 ml-64 font-bold text-white bg-green-500 rounded hover:bg-green-700">
                        Submit
                    </button>
                </div>
            </form>    
        </div>
    </div>
</div>

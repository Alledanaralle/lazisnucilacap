<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Daftar" />
    <div class="flex flex-col w-full h-full min-h-screen bg-white shadow-md md:w-[414px] p-4">
            <div class="text-center">
                <h2 class="mt-3 text-2xl font-bold leading-9 tracking-tight text-center text-gray-900">Daftar</h2>
                <p class="text-xl font-bold leading-9 tracking-tight text-center text-gray-900">Silahkan lengkapi data di
                    bawah</p>
            </div>

            <div class="py-1 mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form wire:submit.prevent='simpan'>
                    <div class="space-y-6">
                        <div>
                            <label for="username"
                                class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                            <div class="mt-2">
                                <input wire:model="username" id="username" name="username" type="text"
                                    autocomplete="username" required
                                    class="block pl-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('username')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="email"
                                class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2">
                                <input wire:model="email" id="email" name="email" type="text"
                                    class="block pl-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('email')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">Nama
                                Depan</label>
                            <div class="mt-2">
                                <input wire:model="first_name" id="first_name" name="first_name" type="text"
                                    autocomplete="first_name" required
                                    class="block pl-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('first_name')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Nama
                                Belakang</label>
                            <div class="mt-2">
                                <input wire:model="last_name" id="last_name" name="last_name" type="text"
                                    autocomplete="last_name" 
                                    class="block pl-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('last_name')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="no_telp" class="block text-sm font-medium leading-6 text-gray-900">No
                                Telp</label>
                            <div class="mt-2">
                                <input wire:model="no_telp" id="no_telp" name="no_telp" type="text"
                                    autocomplete="no_telp" required
                                    class="block pl-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('no_telp')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                            <textarea wire:model="alamat" rows="2"
                                class="border border-gray-300 rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                                ></textarea>
                            @error('alamat')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="mt-2">
                                <input wire:model="password" id="password" name="password" type="password"
                                    autocomplete="password" required
                                    class="block pl-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('password')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="flex w-full justify-center rounded-md bg-green-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-500">Daftar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div style="height: 67px "></div>
    </div>
</div>
<script>
    document.getElementById('no_telp').addEventListener('input', function (e) {
    let value = e.target.value;
    value = value.replace(/[^0-9+]/g, '');
    e.target.value = value;
});
</script>
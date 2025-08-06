<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Profil" />
    <div class="flex flex-col w-full min-h-screen bg-white shadow-md md:w-[414px]">
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
        <div class="flex flex-col items-center justify-center mt-4">
            <H2 class="mb-8 font-semibold">Ubah Data Akun</H2>
        </div>
        <form class="mx-4" wire:submit="update">
                    <input type="text" hidden wire:model="id_user">
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" id="username" wire:model="username" name="username"
                            class="block w-full px-2 py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                        @error('username')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="text" id="email" wire:model="email" name="email"
                            class="block w-full px-2 py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                        @error('email')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Nama
                            Depan</label>
                        <input type="text" id="first_name" wire:model="first_name" name="first_name"
                            class="block w-full px-2 py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                        @error('first_name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Nama
                            Belakang</label>
                        <input type="text" id="last_name" wire:model="last_name" name="last_name"
                            class="block w-full px-2 py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                        @error('last_name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="no_telp" class="block text-sm font-medium text-gray-700">No Telp</label>
                        <input type="text" id="no_telp" wire:model="no_telp" name="no_telp"
                            class="block w-full px-2 py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                        @error('no_telp')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Ganti Password</label>
                        <input type="password" id="password" wire:model="password" name="password" placeholder="Masukkan Password Baru"
                            class="block w-full px-2 py-1 mt-1 bg-gray-200 border-gray-700 rounded-md shadow-2xl focus:border-indigo-500 sm:text-sm">
                        @error('password')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button inside the form -->
                    <div class="flex justify-center mt-6 rounded-b-lg">
                        <button type="submit"
                            class="w-full py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">Simpan</button>
                    </div>
                </form>
    </div>
</div>

<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Login" />
    <div class="flex flex-col w-full h-full min-h-screen bg-white shadow-md md:w-[414px] p-4">
            <div class="text-center">
                <img class="w-auto h-24 mx-auto" src="{{ asset('images/logo_lazisnu.png') }}" alt="Your Company">
                {{-- <h2 class="mt-3 text-2xl font-bold leading-9 tracking-tight text-gray-900">MASUK</h2> --}}
                <p class="mt-12 text-xl font-bold leading-9 tracking-tight text-gray-900">Belum memiliki akun?
                    <a href="/daftar" class="text-green-500">Daftar</a>
                </p>
            </div>

            <form wire:submit="login">
                <div class="space-y-6 ">
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input
                                class="block w-full rounded-md border-0 py-1.5 px-2  text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                wire:model='email' type="text" name="email" id="email">
                            @error('email')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div class="">
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        </div>
                        <div class="mt-1">
                            <input
                                class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                wire:model='password' type="password" name="password" id="password">
                            @error('password')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mt-1 text-sm">
                            <a href="{{route('ForgotPassword')}}" class="font-semibold text-green-500 hover:text-green-600">Forgot
                                password?</a>
                        </div>
                    </div>
                    <div wire:loading>
                        <div class="mt-2 w-full flex flex-row items-center space-x-2">
                            <div class="spinner"></div>
                            <div class="spinner-text">Memproses Permintaan...</div>
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-green-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-500">Masuk</button>
                    </div>
                </div>
            </form>
    </div>
</div>

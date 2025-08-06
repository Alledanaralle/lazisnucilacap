<div class="flex flex-col items-center justify-center min-h-screen bg-white shadow-md">
    <x-nav-mobile2 title="Reset Password" />

    @if ($tokenExpired)
        <!-- If token is expired, show only the logo and the expiration message -->
        <div class="flex flex-col items-center justify-center h-full text-center">
            <img class="w-auto h-24 mb-6 -mt-20" src="{{ asset('images/logo_lazisnu.png') }}" alt="Your Company">
            <p class="text-lg text-red-500 font-bold">Link Password reset sudah kedaluarsa.</p>
            <a href="{{ route('ForgotPassword') }}" class="mt-2 text-sm text-blue-600 hover:text-blue-800 underline">
                <p class="underline">
                    Silakan minta tautan pengaturan ulang kata sandi baru
            </a>
            </p>
        </div>
    @elseif($tokenInvalid)
        <div class="flex flex-col items-center justify-center h-full text-center">
            <img class="w-auto h-24 mb-6 -mt-20" src="{{ asset('images/logo_lazisnu.png') }}" alt="Your Company">
            <p class="text-lg text-red-500 font-bold">Token Password reset invalid.</p>
            <a href="{{ route('ForgotPassword') }}" class="mt-2 text-sm text-blue-600 hover:text-blue-800 underline">
                <p class="underline">
                    Silakan minta tautan pengaturan ulang kata sandi baru
            </a>
            </p>
        </div>
    @else
        <!-- If token is valid, show the reset password form -->
        <div class="flex flex-col w-full h-full md:w-[414px]">
            @if (Session::has('error'))
                <div id="flash-message"
                    class="flex items-center justify-between mx-4 p-4  mt-8 mb-4 text-white bg-red-500 rounded">
                    <span>{{ session('error') }}</span>
                    <button class="p-1" onclick="document.getElementById('flash-message').style.display='none'"
                        class="font-bold text-white">
                        &times;
                    </button>
                </div>
            @endif
            <form wire:submit.prevent="resetPassword" class="mx-2 mt-4">
                <div class="mb-4">
                    <label for="email" class="block mb-2 font-semibold">Email</label>
                    <input type="email" id="email" class="border p-2 w-full rounded-md" wire:model="email"
                        readonly>
                </div>

                <div class="mb-4">
                    <label for="password" class="block mb-2 font-semibold">Password Baru</label>
                    <input type="password" id="password" class="border p-2 w-full rounded-md" wire:model="password">
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block mb-2 font-semibold">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" class="border p-2 w-full rounded-md"
                        wire:model="password_confirmation">
                    @error('password_confirmation')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 rounded-md text-white p-3 w-full">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>

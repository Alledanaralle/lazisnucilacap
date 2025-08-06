<div class="flex flex-col items-center justify-center">
    <div
        class="flex flex-col items-center justify-center w-full max-w-[414px] mx-auto px-2 bg-gray-100 bg-white py-4 min-h-screen">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="text-center">
            <!-- Icon or Image -->
            <svg class="w-16 h-16 text-green-500 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <p class="text-gray-600">Pengajuan Berhasil Terkirim</p>
        </div>
        <a href="{{ route('landing') }}" class="w-full  text-center py-2 px-1 mt-2 text-white bg-green-600 rounded-lg">
            OK
        </a>
    </div>
</div>

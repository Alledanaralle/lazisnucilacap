<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Profil" />
    <div class="flex flex-col w-full min-h-screen bg-white shadow-md md:w-[414px]">
        <div class="flex items-center justify-center mt-5">
            <img src="{{ asset('images/Mask Group.png') }}" alt="pinpoint" class="w-36">
        </div>
        <div class="flex justify-center">
            <h2 class="mr-2 font-semibold">{{ $users->first_name }}</h2>
            <h2 class="font-semibold">{{ $users->last_name }}</h2>
        </div>
        <div class="flex justify-center mt-2 mb-8 text-green-500">
            <h2>{{ $users->username }}</h2>
        </div>
        <div class="mx-2 mb-4 border border-gray-200 rounded-lg shadow-lg">
            <a href="{{route('profile.account')}}" class="flex items-center justify-between px-4 py-3 text-gray-900">
                <span>Akun Saya</span>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        <div class="mx-2 mb-4 border border-gray-200 rounded-lg shadow-lg">
            <a href="{{route('profile.history')}}" class="flex items-center justify-between px-4 py-3 text-gray-900">
                <span>Riwayat Donasi</span>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        <div class="mx-2 mb-4 border border-gray-200 rounded-lg shadow-lg">
            <a href="transaction" class="flex items-center justify-between px-4 py-3 text-gray-900">
                <span>Riwayat Transaksi</span>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        <div class="mx-2 border border-gray-200 rounded-lg shadow-lg">
            <a href="#" 
            @click.prevent="confirmLogout()"
            class="flex items-center justify-between px-4 py-3 text-gray-900 cursor-pointer">
                <span>Keluar</span>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Apakah Anda yakin ingin keluar?',
                text: "Anda akan keluar dari sesi ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#22c55e',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Keluar',
                customClass: {
                    popup: 'small-swal',  // Custom class untuk ukuran kecil
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('logout');
                }
            });
        }
    </script>

    <!-- Custom CSS untuk memperkecil ukuran modal -->
    <style>
        .small-swal {
            font-size: 0.8rem; /* Ukuran font lebih kecil */
            padding: 1.5rem;   /* Mengurangi padding modal */
            width: 300px;      /* Mengurangi lebar modal */
        }
    </style>
</div>

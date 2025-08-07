<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- kirim title lewat class, default app name di env --}}
    <title>{{ str_replace('_', ' ', $title ?? config('app.name')) }}</title>
    <link rel="icon" type="image/png" href="images\25636001732.png">
    
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        textarea {
            padding-left: 10px;
            padding-right: 10px;
        }

        input {
            padding-left: 10px;
            padding-right: 10px;
        }

        .spinner-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80px;
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }

        .spinner {
            border: 5px solid rgba(0, 0, 0, 0.2);
            border-radius: 50%;
            border-top: 5px solid #3498db;
            width: 42px;
            height: 42px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .spinner-text {
            margin-top: 15px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background-color: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            z-index: 1001;
        }

        .sidebar.open {
            transform: translateX(250px);
        }

        .sidebar ul {
            list-style: none;
            padding: 20px;
        }

        .sidebar ul li {
            padding: 10px 0;
        }

        .sidebar ul li a {
            color: #333;
            text-decoration: none;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .sidebar {
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            /* Firefox */
        }

        .sidebar::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, and Opera */
        }

        .overlay.show {
            display: block;
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @livewireStyles
</head>

<body class="flex flex-col h-screen">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        function initializeDataTables() {
            // Destroy existing DataTable instances before re-initializing
            // Check if the table is already a DataTable instance
            if ($.fn.DataTable.isDataTable('.datatable')) {
                $('.datatable').DataTable().destroy();
            }
            $('.datatable').DataTable();
        }

        // Initialize DataTables on initial page load and Livewire navigation
        document.addEventListener('livewire:navigated', () => {
            initializeDataTables();
        });

        document.addEventListener('livewire:initialized', () => {
            initializeDataTables();
        });

        // Listen for a custom event from Livewire components to re-initialize DataTables
        document.addEventListener('table-updated', () => {
            initializeDataTables();
        });
    </script>
    <!-- Sidebar -->
    <div id="sidebar" class="overflow-y-auto sidebar">
        <ul>
            <li>
                <a href="/admin">
                    <p class="{{ Request::is('admin') ? 'text-green-500' : 'text-gray-600' }}">Home</p>
                </a>
            </li>
            <li>
                <a href="/user">
                    <p class="{{ Request::is('user') ? 'text-green-500' : 'text-gray-600' }}">User</p>
                </a>
            </li>
            <li>
                <a href="/admin-donasi">
                    <p class="{{ Request::is('admin-donasi') ? 'text-green-500' : 'text-gray-600' }}">Donasi</p>
                </a>
            </li>
            <li>
                <a href="/admin-campaign">
                    <p class="{{ Request::is('admin-campaign') ? 'text-green-500' : 'text-gray-600' }}">Campaign</p>
                </a>
            </li>
            <li>
                <a href="/admin-konfirmasi">
                    <p class="{{ Request::is('admin-konfirmasi') ? 'text-green-500' : 'text-gray-600' }}">Konfirmasi</p>
                </a>
            </li>
            <li>
                <a href="/admin-berita">
                    <p class="{{ Request::is('admin-berita') ? 'text-green-500' : 'text-gray-600' }}">Berita</p>
                </a>
            </li>
            <li>
                <a href="/admin-mitra">
                    <p class="{{ Request::is('admin-mitra') ? 'text-green-500' : 'text-gray-600' }}">Mitra</p>
                </a>
            </li>
            <li>
                <a href="/gambar_landing">
                    <p class="{{ Request::is('gambar_landing') ? 'text-green-500' : 'text-gray-600' }}">Gambar Landing</p>
                </a>
            </li>
            <li>
                <a href="/misi">
                    <p class="{{ Request::is('misi') ? 'text-green-500' : 'text-gray-600' }}">Misi</p>
                </a>
            </li>
            <li>
                <a href="/visi">
                    <p class="{{ Request::is('visi') ? 'text-green-500' : 'text-gray-600' }}">Visi</p>
                </a>
            </li>
            <li>
                <a href="/update-campaign">
                    <p class="{{ Request::is('update-campaign') ? 'text-green-500' : 'text-gray-600' }}">Update</p>
                </a>
            </li>
            <li>
                <a href="/kategori">
                    <p class="{{ Request::is('kategori') ? 'text-green-500' : 'text-gray-600' }}">Kategori</p>
                </a>
            </li>
            <li>
                <a href="/pilihan-wakaf">
                    <p class="{{ Request::is('pilihan-wakaf') ? 'text-green-500' : 'text-gray-600' }}">Pilihan Wakaf</p>
                </a>
            </li>
            <li>
                <a href="/pilihan-infaq">
                    <p class="{{ Request::is('pilihan-infaq') ? 'text-green-500' : 'text-gray-600' }}">Pilihan infaq</p>
                </a>
            </li>
            <li>
                <a href="/pilihan-qurban">
                    <p class="{{ Request::is('pilihan-qurban') ? 'text-green-500' : 'text-gray-600' }}">Pilihan qurban</p>
                </a>
            </li>
            <li>
                <a href="/komponen_ziwaf">
                    <p class="{{ Request::is('komponen_ziwaf') ? 'text-green-500' : 'text-gray-600' }}">Komponen Ziswaf</p>
                </a>
            </li>
            <li>
                <a href="/pilar-Program">
                    <p class="{{ Request::is('pilar-Program') ? 'text-green-500' : 'text-gray-600' }}">Pilar & Program</p>
                </a>
            </li>
            <li>
                <a href="/laporan-admin">
                    <p class="{{ Request::is('laporan-admin') ? 'text-green-500' : 'text-gray-600' }}">Laporan</p>
                </a>
            </li>
            <li>
                <a href="/petugas">
                    <p class="{{ Request::is('petugas') ? 'text-green-500' : 'text-gray-600' }}">Petugas</p>
                </a>
            </li>
            <li>
                <a href="/notification">
                    <p class="{{ Request::is('notification') ? 'text-green-500' : 'text-gray-600' }}">Notification</p>
                </a>
            </li>
            
            <li>
                <form action="{{ route('logout') }}" method="POST" x-data>
                    @csrf
                    <button @click.prevent="confirmLogout" class="px-4 py-2 text-white bg-red-500 rounded">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="overlay"></div>

    <!-- Navbar -->
    <nav class="z-10 flex items-center justify-between p-4 shadow-xl bg-white-800">
        <button id="menu-toggle" class="text-black focus:outline-none">
            <!-- Hamburger Icon -->
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
        <div>
            <a href="/">
                <img src="{{ asset('images/cooler_logo_lazisnu.png') }}" alt="" class="w-30">
            </a>
        </div>
    </nav>

    <main class="flex flex-col h-screen">
        {{ $slot }}
    </main>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        menuToggle.addEventListener('click', () => {
            sidebar.style.transform = 'translateX(250px)';
            overlay.classList.add('show');
        });

        overlay.addEventListener('click', () => {
            sidebar.style.transform = 'translateX(-250px)';
            overlay.classList.remove('show');
        });

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
                    popup: 'small-swal', // Custom class untuk modal kecil
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form jika konfirmasi diterima
                    document.querySelector('form').submit();
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom CSS untuk memperkecil ukuran modal -->
    <style>
        .small-swal {
            font-size: 0.8rem;
            /* Ukuran font lebih kecil */
            padding: 1.5rem;
            /* Mengurangi padding modal */
            width: 300px;
            /* Mengurangi lebar modal */
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.addEventListener('updated', event => {
                Swal.fire({
                    title: 'Success!',
                    text: event.detail[0].message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Dispatch the modal-closed event to close the modal
                    window.dispatchEvent(new CustomEvent('modal-closed'));
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            window.addEventListener('created', event => {
                Swal.fire({
                    title: 'Success!',
                    text: event.detail[0].message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Dispatch the modal-closed event to close the modal
                    window.dispatchEvent(new CustomEvent('modal-closed'));
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            window.addEventListener('destroyed', event => {
                Swal.fire({
                    title: 'Warning!',
                    text: event.detail[0].message,
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Dispatch the modal-closed event to close the modal
                    window.dispatchEvent(new CustomEvent('modal-closed'));
                });
            });
        });
    </script>

    @livewireScripts
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            setTimeout(() => {
                flashMessage.style.display = 'none';
            }, 3000); // 3000 milidetik = 3 detik
        }
    });
</script>

</html>

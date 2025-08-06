<div>
    <nav class="z-10 p-4 bg-green-400 shadow-2xl">
        <div class="container flex items-center justify-end mx-auto">
            <div class="hidden space-x-4 md:flex">
                <x-navlink title="Home" url="/" class="px-4 py-2 rounded-lg sm:hover:text-white" />
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-black rounded-lg hover:text-green-500">Logout</button>
                </form>
            </div>
        </div>
        <button id="menu-toggle" class="text-white md:hidden focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </nav>

    <!-- Sidebar and Main Content -->
    <div class="z-0 flex">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 flex flex-col w-40 text-white transition-transform duration-200 transform -translate-x-full bg-green-400 shadow-2xl md:translate-x-0">
            <div class="flex items-center justify-between p-4">
                <img src="{{ asset('images/cooler_logo_lazisnu.png') }}" alt="" class="mt-8 ml-4 shadow-2xl w-45">
                <button id="close-sidebar" class="text-white  focus:outline-none">
                    <svg class="w-6 h-6 bg-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 mt-8">
                <ul class="mt-4">
                    <x-navlink title="User" url="/user" class="px-4 py-2 rounded-lg sm:hover:text-white" />
                    <x-navlink title="Donasi" url="/" class="px-4 py-2 rounded-lg sm:hover:text-white" />
                    <x-navlink title="Campaign" url="/" class="px-4 py-2 rounded-lg sm:hover:text-white" />
                    <x-navlink title="Berita" url="/" class="px-4 py-2 rounded-lg sm:hover:text-white" />
                    <x-navlink title="Mitra" url="/" class="px-4 py-2 rounded-lg sm:hover:text-white" />
                    <x-navlink title="Misi" url="/" class="px-4 py-2 rounded-lg sm:hover:text-white" />
                    <x-navlink title="Visi" url="/" class="px-4 py-2 rounded-lg sm:hover:text-white" />
                </ul>
            </div>
        </aside>
    </div>
</div>


<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    });

    document.getElementById('close-sidebar').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.add('-translate-x-full');
    });
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- kirim title lewat class, default app name di env --}}
    <title>{{ str_replace('_', ' ', $title ?? config('app.name')) }}</title>
    <link rel="icon" type="image/png" img src="{{ asset('images/25636001732.png') }}">

    @vite('resources/css/app.css')
    <style>
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .sidebar-open {
            transform: translateX(0);
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        nav {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
        }

            .spinner {
                border: 5px solid rgba(0, 0, 0, 0.2);
                /* Light border for background */
                border-radius: 50%;
                border-top: 5px solid #3498db;
                /* Blue border for spinner */
                width: 42px;
                /* Increased size for visibility */
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

       
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="flex flex-col h-screen">
    {{ $slot }}
    @livewireScripts
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
</body>
<footer class="hidden py-8 text-white bg-gray-200 md:block">
    <div class="px-4 mx-auto max-w-7xl">
        <div class="flex flex-wrap ">
            <!-- Column 1 -->
            <div class="w-5/12 mb-4 md:mb-0">
                <img src="{{ asset('images/cooler_logo_lazisnu.png') }}" alt="" class="w-auto h-12">
                <p class="pt-4 mb-8 text-sm text-gray-700">
                    Lazisnucilacap.com adalah situs resmi Lembaga Amil Zakat, Infaq
                    dan Shadaqah Nahdlatul Ulama (LAZISNU) Kabupaten Cilacap.
                    <br>Saran dan kritik: 
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=nucarelazisnukabupatencilacap@gmail.com&su=Saran%20dan%20Kritik&body=Assalamualaikum%20tim%20Lazisnu%20Cilacap" 
                        target="_blank" 
                        class="text-blue-500 hover:underline">
                        nucarelazisnukabupatencilacap@gmail.com
                    </a>
                </p>


                <ul class="flex space-x-8">
                    <li><a href="/" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('images/whatsapp.png') }}" alt="" class="hover:scale-125">
                        </a>
                    </li>
                    <li><a href="https://www.youtube.com/@LazisnuCilacap" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('images/youtube.png') }}" alt="" class="hover:scale-125">
                        </a>
                    </li>
                    <li><a href="/" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('images/facebook.png') }}" alt="" class="hover:scale-125">
                        </a>
                    </li>
                    <li><a href="/" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('images/instagram.png') }}" alt="" class="hover:scale-125">
                        </a>
                    </li>
                </ul>
            </div>
            {{-- <!-- Column 2 -->
            <div class="w-2/12 mb-4 md:mb-0">
                <h2 class="mb-4 text-xl font-semibold text-gray-800 ">Informasi</h2>
                <ul class="space-y-4 text-sm">
                <x-navlink class="font-semibold text-gray-800" title="Ziswaf" url="/zakat" />
                <x-navlink class="font-semibold text-gray-800" title="Campaign" url="/campaigns" />
                <x-navlink class="font-semibold text-gray-800" title="Berita" url="/berita" />
                </ul>
            </div> --}}
            <!-- Column 3 -->
            <div class="w-3/12 mb-4 md:mb-0">
                <h2 class="mb-4 text-lg font-semibold text-gray-800">Alamat</h2>
                <p class="mb-4 text-sm text-gray-700">Jl. Masjid No. 09 Sidanegara
                    <br>
                    Cilacap Tengah-Cilacap
                    <br>
                    Kode pos : 53223
                    <br>
                    Telp : (0282) 539 5195
                    <br>
                    Hp/WA : 081228221010
                </p>


            </div>
            <!-- Column 4 -->
            <div class="w-4/12 mb-4 md:mb-0">
                <h2 class="mb-4 text-lg font-semibold text-gray-800">NU Care-LAZISNU Cilacap</h2>
                <div class="h-auto bg-white rounded-lg w-75">
                    <a href="https://maps.app.goo.gl/3ZVUjzq2MxBruu318" target="_blank">
                        <img src="{{ asset('images/map2.png') }}" alt="map">
                    </a>
                </div>
            </div>
            <div class="w-full h-px mt-8 bg-gray-300 ">
            </div>
            <div class="w-full mt-4 mb-20 md:mb-0">
                <h2 class="text-sm text-center text-gray-600">Copyright © 2024 - NU Care LAZISNU     Cilacap</h2>
            </div>

        </div>
    </div>
</footer>

</html>

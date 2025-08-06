<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- kirim title lewat class, default app name di env --}}
    
    @php
        // Ambil segment kedua dari URL (slug berita)
        $slug = Request::segment(2);

        // Cari data berita berdasarkan slug
        $berita = null;
        $campaign = null;
        if ($slug) {
            $berita = \App\Models\Berita::where('title_berita', $slug)->first();
            $campaign = \App\Models\Campaign::where('title', $slug)->first();
        }
        
    @endphp
    
    @if (Request::segment(1) == '')
        <meta property="og:title" content="NU-CARE LAZISNU CILACAP" />
        <meta name="description" content="NU Care-LAZISNU adalah rebranding dari Lembaga Amil Zakat, Infak, dan Sedekah Nahdlatul Ulama (LAZISNU) milik perkumpulan Nadhlatul Ulama (NU)." />
        <meta property="og:url" content="https://lazisnucilacap.com/" />
        <meta property="og:description" content="NU-CARE LAZISNU CILACAP" />
        <meta property="og:image" content="{{ asset('images/lazisnu2.png') }}" />
        <meta property="og:type" content="article" />
        <title>{{ str_replace('_', ' ', $title ?? config('app.name')) }}</title>
        
    @elseif (Request::segment(1) == 'berita')
        @if (Request::segment(2))
            <meta property="og:title" content="{{ $berita->title_berita }}" />
            <meta name="description" content="{{ $berita->title_berita }}" />
            <meta property="og:url" content="https://lazisnucilacap.com/berita/{{ $berita->title_berita }}" />
            <meta property="og:description" content="NU-CARE LAZISNU CILACAP" />
            @if ($berita->picture)
                <meta property="og:image" content="{{ asset('storage/' . $berita->picture) }}" />
            @else
                <meta property="og:image" content="{{ asset('images/lazisnu2.png') }}" />
            @endif
            <meta property="og:type" content="article" />
            <title>{{ str_replace('_', ' ', $title ?? config('app.name')) }}</title>
        @else    
            <meta property="og:title" content="Berita NU-CARE LAZISNU CILACAP" />
            <meta name="description" content="Berita NU-CARE LAZISNU CILACAP" />
            <title>{{ str_replace('_', ' ', $title ?? config('app.name')) }}</title>
        @endif
        
    @elseif (Request::segment(1) == 'zakat')
        <meta property="og:title" content="Kalkulator Zakat NU-CARE LAZISNU CILACAP" />
        <meta name="description" content="Kalkulator Zakat NU-CARE LAZISNU CILACAP" />
        <meta property="og:url" content="https://lazisnucilacap.com/zakat" />
        <meta property="og:description" content="NU-CARE LAZISNU CILACAP" />
        <meta property="og:type" content="article" />
        <title>{{ str_replace('_', ' ', $title ?? config('app.name')) }}</title
        
    @elseif (Request::segment(1) == 'infaq')
        <meta property="og:title" content="infaq NU-CARE LAZISNU CILACAP" />
        <meta name="description" content="infaq NU-CARE LAZISNU CILACAP" />
        <meta property="og:url" content="https://lazisnucilacap.com/infaq" />
        <meta property="og:description" content="NU-CARE LAZISNU CILACAP" />
        <meta property="og:type" content="article" />
        <title>{{ str_replace('_', ' ', $title ?? config('app.name')) }}</title>

    @elseif (Request::segment(1) == 'wakaf')
        <meta property="og:title" content="wakaf NU-CARE LAZISNU CILACAP" />
        <meta name="description" content="wakaf NU-CARE LAZISNU CILACAP" />
        <meta property="og:url" content="https://lazisnucilacap.com/wakaf" />
        <meta property="og:description" content="NU-CARE LAZISNU CILACAP" />
        <meta property="og:type" content="article" />
        <title>{{ str_replace('_', ' ', $title ?? config('app.name')) }}</title>

    @elseif (Request::segment(1) == 'fidyah')
        <meta property="og:title" content="fidyah NU-CARE LAZISNU CILACAP" />
        <meta name="description" content="fidyah NU-CARE LAZISNU CILACAP" />
        <meta property="og:url" content="https://lazisnucilacap.com/fidyah" />
        <meta property="og:description" content="NU-CARE LAZISNU CILACAP" />
        <meta property="og:type" content="article" />
        <title>{{ str_replace('_', ' ', $title ?? config('app.name')) }}</title>

    @elseif (Request::segment(1) == 'qurban')
        <meta property="og:title" content="Zakat NU-CARE LAZISNU CILACAP" />
        <meta name="description" content="Zakat NU-CARE LAZISNU CILACAP" />
        <meta property="og:url" content="https://lazisnucilacap.com/zakat" />
        <meta property="og:description" content="NU-CARE LAZISNU CILACAP" />
        <meta property="og:type" content="article" />
        <title>{{ str_replace('_', ' ', $title ?? config('app.name')) }}</title>
        
    @endif

    <link rel="icon" type="image/png" img src="{{ asset('images/25636001732.png') }}">

    @vite('resources/css/app.css')
    <style>
        .floating-link {
            position: fixed;
            bottom: 90px; /* Distance from the bottom of the viewport */
            /* right: 20px; Distance from the right of the viewport */
            background-color: #f0fff4; /* Light green background */
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Optional shadow */
            z-index: 1000; /* Ensures it stays on top of other elements */
            transition: background-color 0.3s;
        }
        
        .floating-link:hover {
            background-color: #e6ffe8; /* Slightly darker on hover */
        }
        
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


        /* Custom radio button */
        input[type="radio"] {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 1rem; /* Custom size */
            height: 1rem; /* Custom size */
            border: 2px solid #d1d5db; /* Default border color */
            border-radius: 50%;
            display: inline-block;
            position: relative;
            outline: none;
        }

        input[type="radio"]:checked {
            border-color: #22c55e; /* Green border when checked */
        }

        input[type="radio"]:checked::before {
            content: '';
            width: 0.50rem;
            height: 0.50rem;
            border-radius: 50%;
            background-color: #22c55e; /* Green inner circle */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
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
       
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="flex flex-col h-screen bg-gray-200">
    
    {{ $slot }}
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        document.getElementById('no_telp').addEventListener('input', function (e) {
        let value = e.target.value;
        value = value.replace(/[^0-9+]/g, '');
        e.target.value = value;
    });
    </script>
    @livewireScripts
</body>
<footer>
    <div class="fixed bottom-0 left-0 right-0 z-40 flex justify-center">
        <div class="flex items-center justify-center w-full px-4 py-2 space-x-8 bg-white md:w-[414px]" style="height: 70px; box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1), 0 -2px 4px -2px rgba(0, 0, 0, 0.1);">
            <div class="items-center w-16 rounded-lg h-11">
                <a wire:navigate.hover href="{{ route('landing') }}">
                    <img class="w-full h-auto" src="{{ !Request::is('campaigns', 'berita', 'zakat', 'infaq', 'wakaf', 'qurban', 'fidyah', 'narasi/fitrah', 'narasi/maal', 'narasi/qurban', 'narasi/wakaf', 'narasi/infaq', 'narasi/fidyah', 'profile', 'account', 'history', 'transaction') && !request()->routeIs('user-berita.show') ? asset('images/Frame 1-active.png') : asset('images/Frame 1.png') }}" alt="">
                </a>
            </div>
            <div class="items-center w-16 rounded-lg h-11">
                <a wire:navigate.hover href="{{ route('campaign') }}">
                    <img class="w-full h-auto" src="{{ Request::is('campaigns') ? asset('images/Frame 2-active.png') : asset('images/Frame 2.png') }}" alt="">
                </a>
            </div>
            <div class="items-center w-16 rounded-lg h-11">
                <a wire:navigate.hover href="{{ route('berita') }}">
                    <img class="w-full h-auto" src="{{ request()->is('berita') || request()->routeIs('user-berita.show') ? asset('images/Frame 3-active.png') : asset('images/Frame 3.png') }}" alt="">
                </a>
            </div>
            <div class="items-center w-16 rounded-lg h-11">
                <a wire:navigate.hover href="{{ route('zakat') }}">
                    <img class="w-full h-auto" src="{{ request()->is('zakat') || request()->is('infaq') || request()->is('wakaf') || request()->is('qurban') || request()->is('fidyah') || request()->is('narasi/fitrah') || request()->is('narasi/maal') || request()->is('narasi/infaq') || request()->is('narasi/wakaf') || request()->is('narasi/qurban') || request()->is('narasi/fidyah') ? asset('images/Frame 5-active.png') : asset('images/Frame 5.png') }}" alt="">
                </a>
            </div> 
            <div class="items-center w-16 rounded-lg h-11">
                <a wire:navigate.hover href="{{ route('profile.index') }}">
                    <img class="w-full h-auto" src="{{ request()->is('profile') || request()->is('account') || request()->is('history') || request()->is('transaction') ? asset('images/Frame 4-active.png') : asset('images/Frame 4.png') }}" alt="">
                </a>
            </div>
        </div>
    </div>
</footer>
</html>

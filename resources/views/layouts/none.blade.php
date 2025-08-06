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
            $campaign = \App\Models\Campaign::where('slug', $slug)->first();
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
        
    @elseif (Request::segment(1) == 'campaigns')
        @if (Request::segment(2))
            <meta property="og:title" content="{{ $campaign->title }}" />
            <meta name="description" content="{{ $campaign->title }}" />
            <meta property="og:url" content="https://lazisnucilacap.com/campaigns/{{ $campaign->title }}" />
            <meta property="og:description" content="NU-CARE LAZISNU CILACAP" />
            @if ($campaign->main_picture)
                <meta property="og:image" content="{{ asset('storage/' . $campaign->main_picture) }}" />
            @else
                <meta property="og:image" content="{{ asset('images/lazisnu2.png') }}" />
            @endif
            <meta property="og:type" content="article" />
            <title>{{ str_replace('_', ' ', $title ?? config('app.name')) }}</title>
        @else    
            <meta property="og:title" content="Campaign NU-CARE LAZISNU CILACAP" />
            <meta name="description" content="Campaign NU-CARE LAZISNU CILACAP" />
            <title>{{ str_replace('_', ' ', $title ?? config('app.name')) }}</title>
        @endif
    @endif
    
    <link rel="icon" type="image/png" img src="{{ asset('images/25636001732.png') }}">
    
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        input:checked~.dot {
            transform: translateX(100%);
            background-color: #ffffff;
            /* Change the color when checked */
        }

        input:checked~.block {
            background-color: #4F46E5;
            /* Change the background color when checked */
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
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="env('MIDTRANS_CLIENT_KEY')"></script>
</head>

<body class="flex flex-col h-screen bg-gray-200">
    {{ $slot }}
    @livewireScripts
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
            function handleLike(doaId) {
        // Get elements
        const likeCountElem = document.getElementById(`like-count-${doaId}`);
        const likeButtonElem = document.getElementById(`like-button-${doaId}`);

        // Toggle like state and update UI immediately
        const liked = likeButtonElem.classList.toggle('text-rose-600');
        likeButtonElem.querySelector('svg').classList.toggle('text-red-400');

        // Update the like count
        let likeCount = parseInt(likeCountElem.textContent);
        likeCountElem.textContent = liked ? `${likeCount + 1} orang` : `${likeCount - 1} orang`;

        // Trigger Livewire like function
        // Livewire.dispatch('like', doaId);
    }
    document.getElementById('no_telp').addEventListener('input', function (e) {
        let value = e.target.value;
        value = value.replace(/[^0-9+]/g, '');
        e.target.value = value;
    });
    </script>

</body>

</html>

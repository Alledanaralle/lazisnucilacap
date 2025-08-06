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
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    @livewireStyles
</head>

<body class="flex flex-col h-screen bg-gray-200">
    {{ $slot }}
    @livewireScripts
    <script>
    function copyToClipboard() {
        // Create a temporary input element
        var tempInput = document.createElement("input");
        
        // Set the input value to the current URL
        tempInput.value = window.location.href;
        
        // Append the input to the body
        document.body.appendChild(tempInput);
        
        // Select the input value
        tempInput.select();
        
        // Copy the value to the clipboard
        document.execCommand("copy");
        
        // Remove the temporary input from the body
        document.body.removeChild(tempInput);
        
        // Optionally, you can show an alert or a message to the user
        alert("Link copied to clipboard!");
    }
    </script>
</body>
<footer>
    <div class="fixed bottom-0 left-0 right-0 z-50 flex justify-center">
        <div class="flex items-center justify-center px-4 py-4 space-x-4 bg-white"
            style="width: 414px; height: 67px; box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1), 0 -2px 4px -2px rgba(0, 0, 0, 0.1);">
            <livewire:campaigns.share />
            <a wire:navigate.hover href="{{ route('donasi.index', $campaign->id_campaign) }}"
                class="text-[12px] bg-green-600 px-16 py-2 items-center text-white rounded-lg">
                Donasi Sekarang
            </a>
        </div>
    </div>
</footer>

</html>

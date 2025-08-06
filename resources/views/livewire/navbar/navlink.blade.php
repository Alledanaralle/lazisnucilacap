<div class="relative flex items-center group navlink">
    <div class="w-full font-semibold text-gray-900">
        @if ($isDropdown == 'true')
            <a wire:navigate.hover
                class="flex items-center justify-between py-2 text-gray-900 rounded hover:text-green-500">
                {{ $title }}
                @if ($isDropdown == 'true')
                    <img src="{{ asset('images/arrow_down.png') }}" alt="arrow down" class="w-4 h-4 ml-1">
                @endif
            </a>
        @else
            <a wire:navigate.hover href="{{ $url }}"
                class="inline-flex items-center py-2 text-black rounded hover:text-green-500">
                {{ $title }}
            </a>

        @endif
    </div>

    @if ($isDropdown == true && !empty($links))
    <div
    class="absolute z-10 hidden text-xs text-black bg-white rounded shadow-lg md:text-lg md:bg-gray-100 group-hover:block top-1/4 right-full mr-6 md:mt-0 md:mr-0 md:left-0 w-[150px] md:w-[240px] border border-gray-300 md:top-full md:max-h-none max-h-[300px] overflow-y-auto">
    <ul class="space-y-1">
        @foreach ($links as $link)
            <li>
                <a wire:navigate.hover href="{{ $link['href'] }}"
                    class="block px-4 py-2 break-words hover:text-green-500">{{ $link['text'] }}</a>
            </li>
        @endforeach
    </ul>
</div>

    @endif
</div>

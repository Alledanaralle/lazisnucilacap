<div class="sticky inset-0 top-0 z-10 flex items-center md:w-[414px] h-16 bg-green-500 w-full">
    <div class="flex items-center pl-5">
        <a href="{{ $backUrl ?? 'javascript:history.back()' }}">
            <img src="{{ asset('images/backArrow.png') }}" alt="back button" class="w-6 h-auto">
        </a>
        <h2 class="pl-4 font-semibold text-white">
            {{ $title }}
        </h2>
    </div>
</div>

<div class="fixed mt-16 top-0 flex pt-4 bg-white w-full flex items-center justify-center shadow-md z-10 h-12 md:w-[414px]">
    <div
        class="pb-2 w-1/5 font-bold text-center border-b-4 {{ Request::is('zakat') ? 'border-b-green-500' : 'border-b-transparent' }}">
        <a wire:navigate.hover href="{{ route('zakat') }}">
            <p class="{{ Request::is('zakat') ? 'text-green-500' : 'text-gray-600' }} text-center text-[12px]">Zakat</p>
        </a>
    </div>
    <div class="pb-2 w-1/5 font-bold text-center border-b-4 {{ Request::is('infaq') ? 'border-b-green-500' : 'border-b-transparent' }}">
        <a wire:navigate.hover href="{{ route('infaq.index') }}">
            <p class="{{ Request::is('infaq') ? 'text-green-500' : 'text-gray-600' }} text-center text-[12px]">Infaq</p>
        </a>
    </div>
    <div class="pb-2 w-1/5 font-bold text-center border-b-4 {{ Request::is('wakaf') ? 'border-b-green-500' : 'border-b-transparent' }}">
        <a wire:navigate.hover href="{{ route('wakaf') }}">
            <p class="{{ Request::is('wakaf') ? 'text-green-500' : 'text-gray-600' }} text-center text-[12px]">Wakaf</p>
        </a>
    </div>
    <div class="pb-2 w-1/5 font-bold text-center border-b-4 {{ Request::is('fidyah') ? 'border-b-green-500' : 'border-b-transparent' }}">
        <a wire:navigate.hover href="{{ route('fidyah.index') }}">
            <p class="{{ Request::is('fidyah') ? 'text-green-500' : 'text-gray-600' }} text-center text-[12px]">Fidyah</p>
        </a>
    </div>
    <div class="pb-2 w-1/5 font-bold text-center border-b-4 {{ Request::is('qurban') ? 'border-b-green-500' : 'border-b-transparent' }}">
        <a wire:navigate.hover href="{{ route('qurban') }}">
            <p class="{{ Request::is('qurban') ? 'text-green-500' : 'text-gray-600' }} text-center text-[12px]">Qurban
            </p>
        </a>
    </div>
</div>

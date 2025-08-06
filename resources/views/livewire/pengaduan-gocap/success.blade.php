<div class="flex flex-col items-center justify-center min-h-screen">
    <x-nav-mobile2 title="Pengajuan Mobisnu" />
    <div class="flex flex-col items-center justify-center bg-white rounded-lg shadow-md" style="width: 414px; height: 736px" wire:init='redirectwithdelay'>
        <div wire:loading class="flex flex-col items-center justify-center w-full px-6 text-center">
            <p class="text-lg font-semibold text-green-500">Mengarahkan kamu untuk WhatsApp ke Admin</p>
            <div class="flex justify-center w-full">
                <div class="mt-4 spinner"></div>
            </div>
        </div>
    </div>
</div>
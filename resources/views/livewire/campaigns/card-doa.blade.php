<div id="doa-{{ $doa->id_doa }}" class="w-full flex-col items-center py-2 px-4 shadow-[0_4px_4px_rgba(0,0,0,0.1)]">
    <div class="flex flex-col text-left w-full">
        <p class="font-bold text-[12px]">{{ $doa->username }}</p>
        <p class="text-xs mt-1 text-[10px]">{{ $doa->created_at }} </p>
    </div>
    <div class="w-full bg-white mt-4 text-black flex flex-col">
        <p class="text-left text-[11px]/[24px] break-words">{{ $doa->doa }}</p>
        <div class="flex justify-start space-x-1">
            <p id="like-count-{{ $doa->id_doa }}" class="text-left font-bold text-[10px] mt-4">{{ $doa->jumlah_likes }} orang</p>
            <p class="text-left text-[10px] mt-4"> mengaminkan doa ini</p>
        </div>
    </div>
    <div class="w-full bg-white mt-2 text-black border-t">
        <a onclick="handleLike({{ $doa->id_doa }})" wire:click="like({{ $doa->id_doa }})" class="cursor-pointer flex justify-center py-2 w-full space-x-1 items-center text-xs font-medium {{ $liked ? 'text-rose-600' : 'text-black' }}" id="like-button-{{ $doa->id_doa }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current {{ $liked ? 'text-red-400' : '' }}" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            <p class="font-semibold text-xs">Aamin</p>
        </a>
    </div>
</div>

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
</script>

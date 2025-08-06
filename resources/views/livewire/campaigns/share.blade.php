<div class="w-1/4 ">
    <a id="openModal"
        class="flex items-center justify-center py-1 space-x-2 rounded-lg border border-gray-400 hover:cursor-pointer z-30">
        <img src="{{ asset('images/share.png') }}" alt="Share">
        <h1 class="text-base">Share</h1>
    </a>

    <!-- The Popup Modal -->
    <div id="modalOverlay" class="fixed inset-0 z-20 hidden bg-black bg-opacity-50 flex justify-center items-end">
        <!-- Modal Content -->
        <div id="categoryModal" class="w-full max-w-[414px] bg-white shadow-lg rounded-t-lg pb-[67px]">
            <div class="px-4 py-1 border-b border-gray-200">
                <div class="flex justify-end items-center">
                    <button type="button" id="closeModal" class="text-gray-400 font-extrabold hover:text-gray-500">
                        <!-- Close icon -->
                        X
                    </button>
                </div>
            </div>

            <!-- Modal content -->
            <div class="">
                <div class="p-4">
                    <div class="grid grid-cols-4 gap-4 mt-2">
                        <div class="flex flex-col items-center">
                            <a href="https://api.whatsapp.com/send?text=Ayo%20kita%20donasi%20{{ urlencode(url()->current()) }}"
                                target="_blank" class="flex flex-col items-center">
                                <div class="w-10 h-10 bg-green-500 rounded-full mb-2"></div>
                                <span class="text-sm font-semibold text-center">WhatsApp</span>
                            </a>
                        </div>
                        <div class="flex flex-col items-center">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                target="_blank" class="flex flex-col items-center">
                                <div class="w-10 h-10 bg-blue-500 rounded-full mb-2"></div>
                                <span class="text-sm font-semibold text-center">Facebook</span>
                            </a>
                        </div>
                        <div class="flex flex-col items-center">
                            <a href="https://www.instagram.com/" target="_blank" class="flex flex-col items-center">
                                <div class="w-10 h-10 bg-pink-500 rounded-full mb-2"></div>
                                <span class="text-sm font-semibold text-center">Instagram</span>
                            </a>

                        </div>
                        <div class="flex flex-col items-center">
                            <button onclick="copyLink()" class="flex flex-col items-center">
                                <div class="w-10 h-10 bg-gray-500 rounded-full mb-2 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7h8m0 0v8m-8-8l-8 8m0 0v-8m8 8h-8" />
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-center">Copy Link</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    function copyLink() {
        const link = "{{ url()->current() }}";
        navigator.clipboard.writeText(link).then(() => {
            alert('Link copied to clipboard!');
        }, (err) => {
            console.error('Failed to copy: ', err);
        });
    }
</script>

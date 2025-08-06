<div class="flex flex-col items-center justify-center min-w-fit">
    <x-nav-mobile2 title="Rekening LAZISNU Cilacap" backUrl="{{ route('landing') }}"/>
    <div class="flex flex-col w-full min-h-screen px-4 py-4 mb-8 bg-white shadow-md md:w-[414px]">
        <div>
            <div class="flex flex-col px-2 py-4">
                <label class="mb-2">Zakat</label>
                <div class="flex items-center w-full p-2 mb-2 border border-gray-500 rounded">
                    <img src="{{ asset('images/bsi.png') }}" alt="bsi"
                        class="w-1/6 md:w-18">
                    <p class="pl-4 rekening">7128 2288 82</p>
                    <button class="px-4 py-1 ml-auto text-white bg-green-500 rounded-lg copyButton">Salin</button>
                </div>
                <div class="flex items-center w-full p-2 mb-2 border border-gray-500 rounded">
                    <img src="{{ asset('images/jateng.png') }}" alt="jateng"
                        class="w-1/6 md:w-18">
                    <p class="pl-4 rekening">3012 1179 3</p>
                    <button class="px-4 py-1 ml-auto text-white bg-green-500 rounded-lg copyButton">Salin</button>
                </div>
                <div class="flex items-center w-full p-2 border border-gray-500 rounded">
                    <img src="{{ asset('images/mega.png') }}" alt="mega"
                        class="w-1/6 md:w-18">
                    <p class="pl-4 rekening">10000 1000 2529 21</p>
                    <button class="px-4 py-1 ml-auto text-white bg-green-500 rounded-lg copyButton">Salin</button>
                </div>
            </div>
        </div>
        <div>
            <div class="flex flex-col px-2 py-4">
                <label class="mb-2">Infaq Kemanusiaan</label>
                <div class="flex items-center w-full p-2 mb-2 border border-gray-500 rounded">
                    <img src="{{ asset('images/bsi.png') }}" alt="bsi"
                        class="w-1/6 md:w-18">
                    <p class="pl-4 rekening">7128 2288 82</p>
                    <button class="px-4 py-1 ml-auto text-white bg-green-500 rounded-lg copyButton">Salin</button>
                </div>
                <div class="flex items-center w-full p-2 border border-gray-500 rounded">
                    <img src="{{ asset('images/bri.png') }}" alt="bri"
                        class="w-1/6 md:w-18">
                    <p class="pl-4 rekening">0106 01 001298 565</p>
                    <button class="px-4 py-1 ml-auto text-white bg-green-500 rounded-lg copyButton">Salin</button>
                </div>
            </div>
        </div>
        <div>
            <div class="flex flex-col px-2 py-4">
                <label class="mb-2">Infaq Umum</label>
                <div class="flex items-center w-full p-2 mb-2 border border-gray-500 rounded">
                    <img src="{{ asset('images/bsi.png') }}" alt="bsi"
                        class="w-1/6 md:w-18">
                    <p class="pl-4 rekening">7128 2188 87</p>
                    <button class="px-4 py-1 ml-auto text-white bg-green-500 rounded-lg copyButton">Salin</button>
                </div>
                <div class="flex items-center w-full p-2 mb-2 border border-gray-500 rounded">
                    <img src="{{ asset('images/bni.png') }}" alt="bni"
                        class="w-1/6 md:w-20">
                    <p class="pl-4 rekening">8929 2488 8</p>
                    <button class="px-4 py-1 ml-auto text-white bg-green-500 rounded-lg copyButton">Salin</button>
                </div>
                <div class="flex items-center w-full p-2 mb-2 border border-gray-500 rounded">
                    <img src="{{ asset('images/mega.png') }}" alt="mega"
                        class="w-1/6 md:w-18">
                    <p class="pl-4 rekening">10000 1000 2529 13</p>
                    <button class="px-4 py-1 ml-auto text-white bg-green-500 rounded-lg copyButton">Salin</button>
                </div>
                <div class="flex items-center w-full p-2 border border-gray-500 rounded">
                    <img src="{{ asset('images/bri.png') }}" alt="bri"
                        class="w-1/6 md:w-18">
                    <p class="pl-4 rekening">0106 01 000667 567</p>
                    <button class="px-4 py-1 ml-auto text-white bg-green-500 rounded-lg copyButton">Salin</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Select all copy buttons
        document.querySelectorAll('.copyButton').forEach(function(button) {
            button.addEventListener('click', function() {
                // Get the text from the sibling <p> element with class 'rekening'
                var textToCopy = this.previousElementSibling.textContent;

                // Create a temporary input element
                var tempInput = document.createElement('input');
                tempInput.value = textToCopy;
                document.body.appendChild(tempInput);

                // Select and copy the text
                tempInput.select();
                document.execCommand('copy');

                // Remove the temporary input
                document.body.removeChild(tempInput);

                // Show an alert to confirm the text was copied
                alert('Nomor rekening berhasil disalin ke clipboard!');
            });
        });
    </script>

</div>

<style>
    .size-8 {
        width: 32px;
        height: 32px;
    }

    #filbanner {
        display: none;
    }

    #filprofile {
        display: none;
    }

    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .button {
        --fill0-color: white;
        /* Default color for .fill0 */
        --fill1-color: black;
        /* Default color for .fill1 */
    }
</style>
<div class="flex-grow max-w-full px-8 customizations">
    {{-- Link Profil --}}
    <div class="mx-auto mb-3">
        <div class="p-3 bg-white rounded-lg shadow-lg dark:bg-slate-800 min-h-16">
            <div class="items-center justify-between flex-none md:flex lg:flex">
                <h3 class="font-bold text-dark dark:text-white">Custom Link</h3>
                <div class="flex items-center my-auto mb-0 space-x-2 rounded-lg h-11">
                    <p class="font-bold text-dark dark:text-white">cdlink.id/</p>
                    <textarea
                        class="flex-grow w-full h-full max-h-full min-h-full p-2 bg-white border border-gray-300 rounded-lg text-dark dark:text-white dark:bg-slate-900 dark:border-orange-300"
                        id="slugInput" placeholder="linksaya">{{ $customizations->slug }}</textarea>
                </div>
            </div>
        </div>
    </div>
    {{-- Gambar --}}
    <div class="flex p-3 mb-3 space-x-6 bg-white rounded-lg shadow-lg dark:bg-slate-800 min-h-16">
        <div class="w-1/2">
            <h3 class="font-bold text-dark dark:text-white">Banner</h3>
            <div class="p-3">
                <div
                    class="flex flex-col justify-between mb-0 overflow-hidden border border-gray-300 rounded-lg dark:border-orange-300 h-14">
                    <div class="flex flex-col justify-end h-full p-2 space-y-2 mb" action="">
                        <div class="flex justify-center md:space-x-2 md:justify-end">
                            <p class="hidden mx-auto my-auto text-sm font-light text-center text-gray-400 md:block">
                                Ukuran
                                optimal 800 x 400px, 1:2</p>
                            <label for="bannerFileInput"
                                class="w-full p-2 text-center text-white rounded cursor-pointer bg-purple dark:bg-orange-500 md:w-auto">Upload</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold text-dark dark:text-white">Profile</h3>
            <div class="p-3">
                <div
                    class="flex flex-col justify-between mb-0 overflow-hidden border border-gray-300 rounded-lg dark:border-orange-300 h-14">
                    <div class="flex flex-col justify-end h-full p-2 space-y-2 mb" action="">
                        <div class="flex justify-center md:space-x-2 md:justify-end">
                            <p class="hidden mx-auto my-auto text-sm font-light text-center text-gray-400 md:block">
                                Ukuran
                                optimal 400 x 400px, 1:1</p>
                            <label for="profileFileInput"
                                class="w-full p-2 text-center text-white rounded cursor-pointer bg-purple dark:bg-orange-500 md:w-auto">Upload</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Judul --}}
    <div class="flex-grow p-3 mb-3 bg-white rounded-lg shadow-lg dark:bg-slate-800 min-h-16">
        <h3 class="font-bold text-dark dark:text-white">Title</h3>
        <div class="p-3">
            <div class="flex mb-0 space-x-2 h-11">
                <textarea maxlength="100"
                    class="flex-grow w-full h-full max-h-full min-h-full p-2 bg-white border border-gray-300 rounded-lg text-dark dark:text-white dark:bg-slate-900 dark:border-orange-300"
                    id="titleInput" placeholder="Masukkan Teks" oninput="updateTitle()">{{ $customizations->title }}</textarea>
            </div>
        </div>
    </div>
    {{-- Tentang --}}
    <div class="flex-grow p-3 mb-3 bg-white rounded-lg shadow-lg dark:bg-slate-800 min-h-16">
        <h3 class="font-bold text-dark dark:text-white">About</h3>
        <div class="p-3">
            <div class="flex mb-0 space-x-2 rounded-lg h-28">
                <textarea
                    class="flex-grow w-full h-full max-h-full min-h-full p-2 bg-transparent bg-white border border-gray-300 rounded-lg text-dark dark:text-white dark:bg-slate-900 dark:border-orange-300"
                    id="aboutInput" placeholder="Masukkan Teks" oninput="updateAbout()">{{ $customizations->about }}</textarea>
            </div>
        </div>
    </div>
    {{-- Link Medsos --}}
    <div class="flex-grow mb-3">
        <div class="p-3 bg-white rounded-lg shadow-lg dark:bg-slate-800">
            <button class="flex items-center justify-between w-[100%]" onclick="showhide('socialmediapropsdiv','socialmediapropsbtn')">
                <h3 class="font-bold text-dark dark:text-white">Social Media</h3>
                <p class="p-2 px-6 ml-1 transition-transform duration-300 ease-in-out transform dark:text-white bi bi-chevron-down"
                    id="socialmediapropsbtn">
                </p>
            </button>
            <div class="px-3">
                <div class="overflow-hidden">
                    <div id="socialmediapropsdiv"
                        class="h-0 mt-2 transition-transform duration-300 ease-in-out transform -translate-y-full opacity-0 -z-10">
                        <div class="grid grid-cols-6 mb-2 space-x-2 sm:grid-cols-10 lg:grid-cols-cb">
                            <input type="text" id="newLinkInput"
                                class="flex-grow h-full col-span-3 p-2 bg-transparent border border-gray-300 rounded-lg text-dark dark:text-white dark:border-orange-300 sm:col-span-5 lg:col-span-10"
                                placeholder="Enter Link">
                            <select id="newIconSelect"
                                class="flex-grow h-full col-span-2 p-2 bg-transparent border border-gray-300 rounded-lg text-dark dark:text-orange-500 dark:border-orange-300 dark:bg-slate-800 sm:col-span-4 lg:col-span-5">
                                <option value="" disabled selected>Select Icon</option>
                                <option value="bi-envelope-fill">Envelope</option>
                                <option value="bi-whatsapp">WhatsApp</option>
                                <option value="bi-linkedin">LinkedIn</option>
                                <option value="bi-instagram">Instagram</option>
                                <option value="bi-twitter-x">Twitter</option>
                                <option value="bi-youtube">YouTube</option>
                                <option value="bi-telegram">Telegram</option>
                                <option value="bi-facebook">Facebook</option>
                                <option value="bi-discord">Discord</option>
                                <option value="bi-link-45deg">Link</option>
                            </select>
                            <button onclick="generateLinkInput()">
                                <i
                                    class="block py-2 text-white rounded-lg bg-purple dark:bg-orange-500 bi bi-plus-lg"></i>
                            </button>
                        </div>
                        <div id="linkInputs" class="mt-2 space-y-2 text-dark dark:text-orange-500">
                            @foreach ($socialButtons as $index => $socialButton)
                                <div class="grid grid-cols-6 mb-2 space-x-2 sm:grid-cols-10 lg:grid-cols-cb link-input-item"
                                    data-id="{{ $index }}">
                                    <input type="text"
                                        class="flex-grow h-full col-span-3 p-2 bg-transparent bg-white border border-gray-300 rounded-lg dark:border-orange-300 sm:col-span-5 lg:col-span-10 dark:bg-slate-900"
                                        value="{{ $socialButton->url }}" data-icon="{{ $socialButton->icon }}"
                                        oninput="updateLink({{ $index }})">
                                    <?php
                                    // Extract data icon
                                    $iconClass = '';
                                    if (preg_match('/bi-[\w-]+/', $socialButton->icon, $matches)) {
                                        $iconClass = $matches[0];
                                    }
                                    ?>
                                    <select id="iconDropdown"
                                        class="flex-grow h-full col-span-2 p-2 bg-white border border-gray-300 rounded-lg text-dark dark:text-orange-500 dark:bg-slate-900 dark:border-orange-300 sm:col-span-4 lg:col-span-5 icon-select"
                                        onchange="updateLink({{ $index }})">
                                        <option value="bi-envelope-fill"
                                            {{ $iconClass === 'bi-envelope-fill' ? 'selected' : '' }}>
                                            Email</option>
                                        <option value="bi-whatsapp"
                                            {{ $iconClass === 'bi-whatsapp' ? 'selected' : '' }}>
                                            WhatsApp
                                        </option>
                                        <option value="bi-linkedin"
                                            {{ $iconClass === 'bi-linkedin' ? 'selected' : '' }}>
                                            LinkedIn
                                        </option>
                                        <option value="bi-instagram"
                                            {{ $iconClass === 'bi-instagram' ? 'selected' : '' }}>
                                            Instagram</option>
                                        <option value="bi-twitter-x"
                                            {{ $iconClass === 'bi-twitter-x' ? 'selected' : '' }}>
                                            Twitter
                                        </option>
                                        <option value="bi-youtube" {{ $iconClass === 'bi-youtube' ? 'selected' : '' }}>
                                            YouTube
                                        </option>
                                        <option value="bi-telegram"
                                            {{ $iconClass === 'bi-telegram' ? 'selected' : '' }}>
                                            Telegram
                                        </option>
                                        <option value="bi-facebook"
                                            {{ $iconClass === 'bi-facebook' ? 'selected' : '' }}>
                                            Facebook
                                        </option>
                                        <option value="bi-discord" {{ $iconClass === 'bi-discord' ? 'selected' : '' }}>
                                            Discord
                                        </option>
                                        <option value="bi-link-45deg"
                                            {{ $iconClass === 'bi-link-45deg' ? 'selected' : '' }}>Link
                                        </option>
                                    </select>
                                    <button onclick="removeLink(this, {{ $index }})">
                                        <i class="block py-2 text-white bg-red-500 rounded-lg bi bi-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Tombol Link  --}}
    <div class="mx-auto mb-3">
        <div class="p-3 bg-white rounded-lg shadow-lg dark:bg-slate-800 min-h-16">
            <button class="flex items-center justify-between w-[100%]" onclick="showhide('linkpropsdiv','linkpropsbtn')">
                <h3 class="font-bold text-dark dark:text-white">Button Link</h3>
                <p class="p-2 px-6 ml-1 transition-transform duration-300 ease-in-out transform dark:text-white bi bi-chevron-down"
                    id="linkpropsbtn">
                </p>
            </button>
            <div class="px-3">
                <div class="overflow-hidden">
                    <div id="linkpropsdiv"
                        class="h-0 mt-2 transition-transform duration-300 ease-in-out transform -translate-y-full opacity-0 -z-10">
                        <div class="grid grid-cols-6 mb-2 space-x-2 sm:grid-cols-10 lg:grid-cols-cb">
                            <input type="text"
                                class="flex-grow h-full col-span-2 p-2 bg-transparent border border-gray-300 rounded-lg text-dark dark:text-white dark:border-orange-300 sm:col-span-4 lg:col-span-7"
                                placeholder="Enter text" id="textInput">
                            <input type="text"
                                class="flex-grow h-full col-span-3 p-2 bg-transparent border border-gray-300 rounded-lg text-dark dark:text-white dark:border-orange-300 sm:col-span-5 lg:col-span-8"
                                placeholder="Enter link" id="urlInput">
                            <button class="items-center justify-center flex-grow col-span-1"
                                onclick="addLinkButton()">
                                <i
                                    class="block py-2 text-white rounded-lg bg-purple dark:bg-orange-500 bi bi-plus-lg"></i>
                            </button>
                        </div>
                        <div id="linkContainers" class="space-y-2 text-dark dark:text-orange-500">
                            @foreach ($linkButtons as $index => $linkButton)
                                <div class="grid grid-cols-6 space-x-2 sm:grid-cols-10 lg:grid-cols-cb link-input-item"
                                    data-id="{{ $index }}">
                                    <input type="text"
                                        class="flex-grow col-span-2 p-2 bg-white border border-gray-300 rounded-lg dark:border-orange-300 sm:col-span-4 lg:col-span-7 text-dark dark:text-orange-500 dark:bg-slate-900"
                                        value="{{ $linkButton->text }}" data-url="{{ $linkButton->url }}"
                                        oninput="updateLinkButton({{ $index }})">
                                    <input type="text"
                                        class="flex-grow col-span-3 p-2 bg-white border border-gray-300 rounded-lg dark:border-orange-300 sm:col-span-5 lg:col-span-8 text-dark dark:text-orange-500 dark:bg-slate-900"
                                        value="{{ $linkButton->url }}"
                                        oninput="updateLinkButton({{ $index }})">
                                    <button class="items-center justify-center flex-grow col-span-1"
                                        onclick="removeLinkButton(this, {{ $index }})">
                                        <i class="block py-2 text-white bg-red-500 rounded-lg bi bi-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Background --}}
    <div class="p-3 mx-auto mb-3 bg-white rounded-lg shadow-lg dark:bg-slate-800 min-h-16">
        <button class="flex items-center justify-between w-[100%]" onclick="showhide('bgpropsdiv','bgpropsbtn')">
            <h3 class="font-bold text-dark dark:text-white">Background</h3>
            <p class="p-2 px-6 ml-1 transition-transform duration-300 ease-in-out transform dark:text-white bi bi-chevron-down"
                id="bgpropsbtn">
            </p>
        </button>
        <div class="px-3">
            <div class="overflow-hidden">
                <div id="bgpropsdiv"
                    class="h-0 mt-2 transition-transform duration-300 ease-in-out transform -translate-y-full opacity-0 -z-10">
                    <div class="grid w-full grid-cols-3 mx-auto gap-x-2 md:grid-cols-6">
                        <x-button class="w-full py-2 bg-gradient-to-tr from-red-700 to-rose-500"
                            onclick="changeBackground('linear-gradient(to top right, #b91c1c, #f43f5e)'), changeFontBlack()">
                            Red-Rose </x-button>
                        <x-button class="w-full py-2 bg-gradient-to-tr from-green-700 to-lime-500"
                            onclick="changeBackground('linear-gradient(to top right, #1D4E1F, #84CC16'), changeFontBlack()">
                            Green-Lime </x-button>
                        <x-button class="w-full py-2 bg-gradient-to-tr from-blue-700 to-sky-500"
                            onclick="changeBackground('linear-gradient(to top right, #1C3D5A, #6FB1FC'), changeFontBlack()">
                            Blue-Sky </x-button>
                        <x-button class="w-full py-2 bg-gradient-to-tr from-yellow-500 to-orange-500"
                            onclick="changeBackground('linear-gradient(to top right, #eab308, #f97316'), changeFontWhite()">
                            Yellow-Orange </x-button>
                        <x-button class="w-full py-2 bg-gradient-to-tr from-gray-300 to-white"
                            onclick="changeBackground('linear-gradient(to top right, #CBD5E0, #FFFFFF'), changeFontBlack()">
                            Gray-White </x-button>
                        <x-button class="w-full py-2 text-white bg-gradient-to-tr from-gray-900 to-slate-700"
                            onclick="changeBackground('linear-gradient(to top right, #1F2937, #6B7280'), changeFontWhite()">
                            Black-Gray </x-button>
                        {{-- <x-button
                            class="w-full py-2 bg-gradient-to-tr from-purple to-purple dark:from-orange-500 dark:to-orange-500" id="custombgbtn"
                            onclick="openWarna()">Custom </x-button> --}}
                    </div>
                    <p class="text-dark dark:text-white">Atau</p>
                    <div id="modalWarna" class="items-center justify-center mt-6 bg-opacity-75">
                        <div class="justify-between flex-none md:flex lg:flex">
                            <div>
                                <label for="grad-1" class="font-semibold text-dark dark:text-white">Custom
                                    Gradient</label>
                                <div class="flex items-center gap-2">
                                    <div class="flex items-center space-x-2">
                                        <input class="h-12 bg-transparent w-28" type="color" id="grad-1"
                                            oninput="applyCustomBackground()">
                                        <p id="color1"
                                            class="text-sm md:text-base lg:text-base text-dark dark:text-white">#color1
                                        </p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <input class="h-12 bg-transparent w-28" type="color" id="grad-2"
                                            oninput="applyCustomBackground()">
                                        <p id="color2"
                                            class="text-sm md:text-base lg:text-base text-dark dark:text-white">#color2
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="gradient-direction"
                                    class="block mb-2 font-semibold text-dark dark:text-white">Gradient
                                    Direction</label>
                                <select id="gradient-direction"
                                    class="w-full p-2 border rounded text-dark dark:text-orange-500 bg-light dark:bg-slate-800"
                                    onchange="applyCustomBackground()">
                                    <option value="to top right">To Top Right</option>
                                    <option value="to bottom right">To Bottom Right</option>
                                    <option value="to bottom left">To Bottom Left</option>
                                    <option value="to top left">To Top Left</option>
                                    <option value="to top">To Top</option>
                                    <option value="to bottom">To Bottom</option>
                                    <option value="to left">To Left</option>
                                    <option value="to right">To Right</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Font --}}
    <div class="mx-auto mb-3">
        <div class="p-3 bg-white rounded-lg shadow-lg dark:bg-slate-800 min-h-16">
            <button class="flex items-center justify-between w-[100%]" onclick="showhide('fontpropsdiv','fontpropsbtn')">
                <h3 class="font-bold text-dark dark:text-white">Font</h3>
                <p class="p-2 px-6 ml-1 transition-transform duration-300 ease-in-out transform dark:text-white bi bi-chevron-down"
                    id="fontpropsbtn">
                </p>
            </button>
            <div class="px-3">
                <div class="overflow-hidden">
                    <div id="fontpropsdiv"
                        class="h-0 mt-2 transition-transform duration-300 ease-in-out transform -translate-y-full opacity-0 -z-10">
                        <div class="grid w-full grid-cols-2 mx-auto gap-x-2 sm:grid-cols-4 lg:grid-cols-5">
                            <x-button class="w-full font-montserrat"
                                onclick="changeFont('montserrat')">Montserrat</x-button>
                            <x-button class="w-full font-roboto" onclick="changeFont('roboto')">Roboto</x-button>
                            <x-button class="w-full font-baskervville"
                                onclick="changeFont('baskervville')">Baskervville</x-button>
                            <x-button class="w-full font-opensans" onclick="changeFont('opensans')">Open
                                Sans</x-button>
                            <x-button class="w-full font-lato" onclick="changeFont('lato')">Lato</x-button>
                            <x-button class="w-full font-lora" onclick="changeFont('lora')">Lora</x-button>
                            <x-button class="w-full font-inter" onclick="changeFont('inter')">Inter</x-button>
                            <x-button class="w-full font-ubuntu" onclick="changeFont('ubuntu')">Ubuntu</x-button>
                            <x-button class="w-full font-bebasneue" onclick="changeFont('bebasneue')">Bebas
                                Neue</x-button>
                            <x-button class="w-full font-rowdies" onclick="changeFont('rowdies')">Rowdies</x-button>
                            <x-button class="w-full font-abrilfatface" onclick="changeFont('abrilfatface')">Abril
                                Fatface</x-button>
                            <x-button class="w-full font-orbitron"
                                onclick="changeFont('orbitron')">Orbitron</x-button>
                            <x-button class="w-full font-poppins" onclick="changeFont('poppins')">Poppins</x-button>
                            <x-button class="w-full font-sourcecodepro" onclick="changeFont('sourcecodepro')">Source
                                Code</x-button>
                            <x-button class="w-full font-plusjakartasans" onclick="changeFont('plusjakartasans')">Plus
                                Jakarta Sans</x-button>
                            <x-button class="w-full font-merriweather"
                                onclick="changeFont('merriweather')">Merriweather</x-button>
                            <x-button class="w-full font-blackopsone" onclick="changeFont('blackopsone')">Black Ops
                                One</x-button>
                            <x-button class="w-full font-rubikmonoone" onclick="changeFont('rubikmonoone')">Rubik
                                Mono</x-button>
                            <x-button class="w-full font-merienda"
                                onclick="changeFont('merienda')">Merienda</x-button>
                            <x-button class="w-full font-kalam" onclick="changeFont('kalam')">Kalam</x-button>
                        </div>
                        <div class="mt-4">
                            <label for="font-c" class="font-semibold text-dark dark:text-white">Font Color</label>
                            <div class="flex items-center mt-2 space-x-2">
                                <input type="color" id="font-c" class="h-12 bg-transparent w-28">
                                <p id="font-color-hex" class="w-1/6 text-dark dark:text-white">#color</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Button --}}
    <div class="mx-auto mb-3">
        <div class="p-3 bg-white rounded-lg shadow-lg dark:bg-slate-800 min-h-16">
            <button class="flex items-center justify-between w-[100%]" onclick="showhide('btnpropsdiv','btnpropsbtn')">
                <h3 class="font-bold text-dark dark:text-white">Button Properties</h3>
                <p class="p-2 px-6 ml-1 transition-transform duration-300 ease-in-out transform dark:text-white bi bi-chevron-down"
                    id="btnpropsbtn">
                </p>
            </button>
            <div class="overflow-hidden">
                <div id="btnpropsdiv"
                    class="h-0 mt-2 transition-transform duration-300 ease-in-out transform -translate-y-full opacity-0 -z-10">
                    <div class="grid items-center grid-cols-1 p-4 mx-auto -gap-4 sm:grid-cols-2 lg:grid-cols-2">
                        <button class="w-full scale-75" onclick="changebtnstyle('box')">
                            <div class="w-full box" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                        <button class="w-full scale-75" onclick="changebtnstyle('boxb')">
                            <div class="w-full boxb" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                        <button class="w-full scale-75" onclick="changebtnstyle('boxc')">
                            <div class="w-full boxc" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                        <button class="w-full scale-75" onclick="changebtnstyle('boxcb')">
                            <div class="w-full boxcb" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                        <button class="w-full scale-75" onclick="changebtnstyle('box40')">
                            <div class="w-full box40" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                        <button class="w-full scale-75" onclick="changebtnstyle('box40b')">
                            <div class="w-full box40b" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                        <button class="w-full scale-75" onclick="changebtnstyle('box60')">
                            <div class="w-full box60" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                        <button class="w-full scale-75" onclick="changebtnstyle('box60b')">
                            <div class="w-full box60b" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                        <button class="w-full scale-75" onclick="changebtnstyle('box90')">
                            <div class="w-full box90" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                        <button class="w-full scale-75" onclick="changebtnstyle('box90b')">
                            <div class="w-full box90b" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                        <button class="w-full scale-75" onclick="changebtnstyle('box150')">
                            <div class="w-full box150" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                        <button class="w-full scale-75" onclick="changebtnstyle('box120b')">
                            <div class="w-full box120b" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                        <button class="w-full scale-75" onclick="changebtnstyle('box180')">
                            <div class="w-full box180" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                        <button class="w-full scale-75" onclick="changebtnstyle('box180b')">
                            <div class="w-full box180b" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                        <button class="w-full scale-75" onclick="changebtnstyle('boxri')">
                            <div class="w-full boxri" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                        <button class="w-full scale-75" onclick="changebtnstyle('boxro')">
                            <div class="w-full boxro" style="background: linear-gradient(90deg, #ababab, #dddddd)">
                            </div>
                        </button>
                    </div>
                    <div class="px-3 form-container">
                        <label for="grad-dir-btn" class="block mb-2 font-semibold text-dark dark:text-white">Button
                            Type:</label>
                        <div class="flex items-center">
                            <div>
                                <select id="grad-dir-btn"
                                    class="w-full p-2 border rounded text-dark dark:text-orange-500 bg-light dark:bg-slate-800"
                                    onchange="changebtnclr()">
                                    <option value="45deg">To Top Right</option>
                                    <option value="135deg">To Bottom Right</option>
                                    <option value="225deg">To Bottom Left</option>
                                    <option value="315deg">To Top Left</option>
                                    <option value="0deg">To Top</option>
                                    <option value="180deg">To Bottom</option>
                                    <option value="90deg">To Left</option>
                                    <option value="270deg">To Right</option>
                                </select>
                            </div>
                            <div>
                                <label for="btnf2">Fill Color 0:</label>
                                <input type="color" id="btnf2" value="#ffffff"
                                    class="h-12 bg-transparent w-28" oninput="changebtnclr()">
                            </div>
                            <div>
                                <label for="btnf1">Fill Color 1:</label>
                                <input type="color" id="btnf1" value="#ffffff"
                                    class="h-12 bg-transparent w-28" oninput="changebtnclr()">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto mb-3">
        {{ $slot }}
    </div>
</div>
@vite('resources/js/dropdown.js')
@vite('resources/js/header.js')

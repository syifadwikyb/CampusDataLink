<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>Home</title>
</head>
<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none; 
        scrollbar-width: none;
    }
</style>

<body class="bg-white dark:bg-slate-900 font-montserrat">
    <div class="header sticky h-auto top-0 z-50 w-auto bg-white transition-all duration-300">
        <div class="container mx-auto flex justify-between items-center p-8 dark:text-white">
            <div>
                <p>Logo</p>
            </div>
            <div class="flex items-center gap-5">
                @if ($customizations)
                <button onclick="window.location.href='{{ route('customization.edit') }}'" class="text-sm lg:text-base rounded-3xl ml-1 px-6 md:px-8 lg:px-10 py-3 font-bold text-light bg-purple dark:bg-orange-500 dark:text-white focus:outline-none">
                    Edit
                </button>
                @else
                <button onclick="window.location.href='{{ route('customization.edit') }}'" class="text-sm lg:text-base rounded-3xl ml-1 px-6 md:px-8 lg:px-10 py-3 font-bold text-light bg-purple dark:bg-orange-500 dark:text-white focus:outline-none">
                    Buat Sekarang!
                </button> 
                @endif                                  
                <div class="relative">
                    <button id="bars-icon" class="fas fa-user-circle text-4xl focus:outline-none"></button>
                    <div id="dropdown-menu" class="hidden absolute right-0 mt-8 w-48 bg-light dark:bg-slate-700 rounded-lg shadow-lg z-10">
                        <a href="#" class="flex rounded-lg py-2 w-full justify-center font-bold text-purple dark:text-white hover:text-white hover:bg-purple dark:hover:bg-orange-500">Profile</a>
                        <a href="{{ route('changepass') }}" class="flex rounded-lg py-2 w-full justify-center font-bold text-purple dark:text-white hover:text-white hover:bg-purple dark:hover:bg-orange-500">Change Password</a>                    
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="flex rounded-lg py-2 w-full justify-center font-bold text-purple dark:text-white hover:text-white hover:bg-purple dark:hover:bg-orange-500" type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    <!-- resources/views/home.blade.php -->
    <div class="container mx-auto">
        {{-- <h1>Welcome, {{ Auth::user()->name }}</h1> --}}
        <div class="h-[155vh]">
            @if ($customizations)
            <div
                class="mx-auto overflow-hidden rounded-3xl border-8 border-black bg-black w-[420px] xl:w-[420px] h-[900px] mt-6 xl:mt-0">
                <div class="{{ $customizations->display_preview_class }}"
                    style="{{ $customizations->display_preview_bg }} {{ $customizations->display_preview_fc }}"
                    id="displayPreview">
                    <div class="bg-gray-200">
                        @if ($customizations->banner)
                            <img class="object-cover h-[190px] w-full"
                                src="{{ asset('storage/' . $customizations->banner) }}" id="bannerPreview"
                                alt="Banner">
                        @endif
                    </div>
                    <div>
                        <div class="w-24 mx-auto bg-gray-600 rounded-full">
                            @if ($customizations->profile)
                                <img class="object-cover w-24 h-24 -mt-12 rounded-full"
                                    src="{{ asset('storage/' . $customizations->profile) }}" id="profilePreview"
                                    alt="Profile">
                            @endif
                        </div>
                        <h1 class="mb-2 text-xl font-bold text-center break-words whitespace-normal Title"
                            id="titlePreview">{{ $customizations->title }}</h1>
                        <p class="mb-4 text-center break-words whitespace-normal About" id="aboutPreview">
                            {{ $customizations->about }}</p>
                        <div id="linkContainer" class="flex flex-wrap justify-center p-2 mx-auto space-x-2 previewButtons">
                            @foreach ($socialButtons as $index => $socialButton)
                                <div class="mb-4 social-button-wrapper" data-id="{{ $index }}">
                                    <a class="{{ $socialButton->icon }}" href="{{ $socialButton->url }}"></a>
                                </div>
                            @endforeach
                        </div>
                        <div id="buttonContainer" class="justify-center w-full px-2 mt-4 text-center">
                            @foreach ($linkButtons as $index => $linkButton)
                                <div class="mb-2 link-button-wrapper" data-id="{{ $index }}">
                                    <div class="z-20 mx-auto w-[390px] h-[70px] flex items-center justify-center">
                                        <a class="z-20 text-center link-buttons"
                                            href="{{ $linkButton->url }}">{{ $linkButton->text }}</a>
                                    </div>
                                    <div class="{{ $customizations->display_btn_prop }}"
                                        style="background: {{ $customizations->display_btn_style }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @else
            <p class="text-dark dark:text-white">Anda Belum Memiliki Halaman</p>
        @endif
        </div>        
    </div>
    <x-footer></x-footer>
</body>
<x-darkmode></x-darkmode>
@vite('resources/js/dropdown.js')
@vite('resources/js/header.js')
</html>

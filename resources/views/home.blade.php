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
    <div class="sticky top-0 z-50 w-auto h-auto transition-all duration-300 bg-white header">
        <div class="container flex items-center justify-between p-8 mx-auto dark:text-white">
            <div>
                <p>Logo</p>
            </div>
            <div class="flex items-center gap-5">
                <div class="relative">
                    <button id="bars-icon" class="text-4xl fas fa-user-circle focus:outline-none"></button>
                    <div id="dropdown-menu"
                        class="absolute right-0 z-10 hidden w-48 mt-8 rounded-lg shadow-lg bg-light dark:bg-slate-700">
                        <a href="#"
                            class="flex justify-center w-full py-2 font-bold rounded-lg text-purple dark:text-white hover:text-white hover:bg-purple dark:hover:bg-orange-500">Profile</a>
                        <a href="{{ route('changepass') }}"
                            class="flex justify-center w-full py-2 font-bold rounded-lg text-purple dark:text-white hover:text-white hover:bg-purple dark:hover:bg-orange-500">Change
                            Password</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button
                                class="flex justify-center w-full py-2 font-bold rounded-lg text-purple dark:text-white hover:text-white hover:bg-purple dark:hover:bg-orange-500"
                                type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- resources/views/home.blade.php -->
    <div class="container mx-auto bg-inherit">
        {{-- <h1>Welcome, {{ Auth::user()->name }}</h1> --}}
        <div class="min-h-[57vh] p-6">
            @if ($customization)
                <div class="text-white ">
                    <p class="mb-5 ml-5 text-lg font-bold">Halaman anda:</p>
                    <div class="flex items-center p-5 rounded-[2rem] bg-gray-50 bg-opacity-5">
                        <p class="flex-grow "><strong>cdlink.id/</strong>{{ $customization->slug }}</p>
                        <button onclick="window.location.href='{{ route('customization.edit') }}'"
                            class="px-3 py-3 ml-2 text-sm font-bold lg:text-base rounded-2xl md:px-4 lg:px-5 text-light bg-purple dark:bg-orange-500 dark:text-white focus:outline-none">
                            Edit
                        </button>
                        <button
                            onclick="window.location.href='{{ route('customization.showContentBySlug', ['slug' => $customization->slug]) }}'"
                            class="px-3 py-3 ml-2 text-sm font-bold lg:text-base rounded-2xl md:px-4 lg:px-5 text-light bg-purple dark:bg-orange-500 dark:text-white focus:outline-none">
                            View
                        </button>
                        <!-- Assuming this is within the customization.edit view -->
                        <form action="{{ route('customization.destroy', $customization->id) }}" method="POST"
                            onsubmit="return confirm('Anda yakin akan menghapus halaman ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-3 ml-2 text-sm font-bold bg-red-400 lg:text-base rounded-2xl md:px-4 lg:px-5 text-light dark:bg-red-500 dark:text-white focus:outline-none">
                                Delete
                            </button>
                        </form>

                    </div>
                </div>
            @else
                <div class="text-white">
                    <p class="mb-5 ml-5 text-lg font-bold">Anda belum memiliki Halaman.</p>
                    <div class="flex items-center p-5 rounded-[2rem] bg-gray-50 bg-opacity-5">
                        <p class="flex-grow ">Buat halaman Anda!</p>
                        <button onclick="window.location.href='{{ route('customization.edit') }}'"
                            class="px-4 py-3 ml-1 text-sm font-bold lg:text-base rounded-3xl md:px-8 lg:px-10 text-light bg-purple dark:bg-orange-500 dark:text-white focus:outline-none">
                            Buat
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <x-footer></x-footer>
</body>
<x-darkmode></x-darkmode>
@vite('resources/js/dropdown.js')
@vite('resources/js/header.js')

</html>

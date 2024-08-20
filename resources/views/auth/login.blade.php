<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-white dark:bg-slate-900 font-montserrat">
    <div class="header sticky top-0 z-50 w-auto bg-white transition-all duration-300">
        <div class="container mx-auto flex justify-between items-center p-8">
            <div class="text-black dark:text-white">
                <p>Logo</p>
            </div>
            <div class="relative">
                <div class="hidden md:flex space-x-4">
                    <a href="/login"><button
                            class="rounded-lg font-bold px-12 shadow-xl py-3 bg-purple-700 dark:bg-orange-500 text-white">Login</button></a>
                    <a href="/register"><button
                            class="rounded-lg font-bold px-12 py-3 hover:shadow-xl hover:text-white hover:bg-purple-700 dark:hover:bg-orange-500 text-black">Register</button></a>
                </div>
                <div class="flex md:hidden md:space-x-4">
                    <button id="bars-icon"
                        class="fas fa-solid fa-bars text-2xl dark:text-white"></button>
                    <div id="dropdown-menu"
                        class="hidden absolute p-4 right-0 mt-10 w-48 bg-slate-100 dark:bg-slate-700 rounded-lg shadow-lg">
                        <a href="/login"><button
                                class="mb-1 flex rounded-lg py-2 w-full justify-center font-bold text-white bg-purple-700 dark:bg-orange-500 dark:text-white">Login</button></a>
                        <a href="/register"><button
                                class="flex rounded-lg py-2 w-full justify-center font-bold hover:text-white hover:bg-purple-700 dark:hover:bg-orange-500 dark:hover:text-white dark:text-white">Register</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center min-h-screen" data-aos="flip-right"
        data-aos-duration="1000">
        <form class="lg:p-16 md:p-10 p-10 shadow-2xl rounded-lg bg-customgradient3 dark:bg-customgradient1"
            method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="lg:text-5xl text-4xl font-bold font-montserrat leading-6 text-center text-white mb-5">Login
            </h1>
            <p class="lg:text-2xl md:text-xl sm:text-lg text-base font-bold leading-6 text-center text-white mb-5">
                Login Your Account</p>
            <div class="sm:col-span-4 mb-2">
                <label for="email" class="block lg:text-lg text-base font-bold leading-6 text-white">Email</label>
                <div class="mt-2">
                    <div class="flex shadow-sm">
                        <input type="email" name="email" id="email" autocomplete="email"
                            class="rounded-lg flex-1 bg-white py-3 px-5 text-black font-semibold placeholder:text-abu focus:outline-none sm:text-base sm:leading-6"
                            @if (@isset($_COOKIE['email'])) value="{{ $_COOKIE['email'] }}" @endif
                            placeholder="Masukkan email">
                    </div>
                </div>
                @error('email')
                    <small class="text-rose-500">{{ $message }}</small>
                @enderror
            </div>
            <div class="sm:col-span-4">
                <label for="password" class="block lg:text-lg text-base font-bold leading-6 text-white">Password</label>
                <div class="mt-2">
                    <div class="flex shadow-sm">
                        <input type="password" name="password" id="password" autocomplete="password"
                            class="rounded-l-xl flex-1 bg-white py-3 px-5 text-black font-semibold placeholder:text-abu focus:outline-none sm:text-base sm:leading-6"
                            @if (@isset($_COOKIE['password'])) value="{{ $_COOKIE['password'] }}" @endif
                            placeholder="Masukkan password">
                        <span
                            class="icon-eye cursor-pointer py-3 px-5 rounded-r-xl bg-white text-black dark:text-orange-500"
                            onclick="togglePasswordVisibility()">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                @error('password')
                    <small class="text-rose-500">{{ $message }}</small>
                @enderror
            </div>
            <button
                class=" font-bold text-center mt-10 py-3 px-5 w-full text-white rounded-lg bg-purple-900 hover:bg-purple-700 dark:bg-orange-500 dark:hover:bg-orange-700">
                Login
            </button>
        </form>
    </div>
</body>

<x-darkmode></x-darkmode>
@vite('resources/js/dropdown.js')
@vite('resources/js/eye.js')
@vite('resources/js/header.js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

@if ($message = Session::get('failed'))
    <script>
        Swal.fire("{{ $message }}");
    </script>
@endif

</html>

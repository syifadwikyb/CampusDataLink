<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="h-screen bg-white dark:bg-slate-900 font-montserrat">
    <div class="sticky top-0 z-50 w-auto h-auto transition-all duration-300 bg-white header">
        <div class="container flex items-center justify-between p-8 mx-auto">
            <div class="text-dark dark:text-white">
                <p>Logo</p>
            </div>
            <div class="relative">
                <div class="hidden space-x-4 md:flex">
                    <a href="/login"><button
                            class="px-12 py-3 font-bold rounded-3xl text-purple dark:text-white hover:bg-purple dark:hover:bg-orange-500 hover:shadow-xl hover:text-light">Login</button></a>
                    <a href="/register"><button
                            class="px-12 py-3 font-bold shadow-xl rounded-3xl bg-purple dark:bg-orange-500 text-light">Register</button></a>
                </div>
                <div class="flex md:hidden md:space-x-4">
                    <button id="bars-icon" class="text-2xl fas fa-solid fa-bars text-purple dark:text-white"></button>
                    <div id="dropdown-menu"
                        class="absolute right-0 hidden w-48 mt-10 rounded-lg shadow-lg bg-slate-100 dark:bg-slate-700">
                        <a href="/login"><button
                                class="flex justify-center w-full py-2 font-bold rounded-lg text-purple hover:text-white hover:bg-purple dark:hover:bg-orange-500 dark:hover:text-white dark:text-white">Login</button></a>
                        <a href="/register"><button
                                class="flex justify-center w-full py-2 font-bold rounded-lg text-purple hover:text-white hover:bg-purple dark:hover:bg-orange-500 dark:hover:text-white dark:text-white">Register</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-aos="flip-left" data-aos-duration="1000" class="container w-full mx-auto">
        <div class="flex items-center justify-center my-auto">
            <form class="p-5 shadow-2xl lg:p-16 md:p-10 sm:p-10 bg-customgradient3 dark:bg-customgradient1 rounded-xl"
                method="POST" action="{{ route('register') }}">
                @csrf
                <h1 class="mb-8 text-4xl font-bold leading-6 text-center text-white lg:text-5xl dark:text-white">
                    Register</h1>
                <div class="mb-2 sm:col-span-4">
                    <label for="name" class="block text-base font-bold leading-6 text-white dark:text-white">Full
                        Name</label>
                    <div class="mt-2">
                        <div class="flex shadow-sm">
                            <input type="text" name="name" id="name" value="{{ old('email') }}"
                                autocomplete="name"
                                class="flex-1 px-5 py-3 font-semibold rounded-xl bg-light text-dark placeholder:text-abu focus:outline-none sm:text-base sm:leading-6 dark:bg-white dark:text-dark"
                                placeholder="Masukkan nama lengkap">
                        </div>
                    </div>
                    @error('email')
                        <small class="text-white">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-2 sm:col-span-4">
                    <label for="username"
                        class="block text-base font-bold leading-6 text-white lg:text-lg dark:text-white">Username</label>
                    <div class="mt-2">
                        <div class="flex shadow-sm">
                            <input type="text" name="username" id="username" 
                                value="{{ old('username') }}"
                                class="flex-1 px-5 py-3 font-semibold form-control rounded-xl bg-light text-dark placeholder:text-abu focus:outline-none sm:text-base sm:leading-6 dark:bg-white dark:text-dark"
                                placeholder="Masukkan username">
                        </div>
                    </div>
                    @error('username')
                        <small class="text-white">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-2 sm:col-span-4">
                    <label for="email"
                        class="block text-base font-bold leading-6 text-white lg:text-lg dark:text-white">Email</label>
                    <div class="mt-2">
                        <div class="flex shadow-sm">
                            <input type="email" name="email" id="email" autocomplete="email"
                                value="{{ old('email') }}"
                                class="flex-1 px-5 py-3 font-semibold form-control rounded-xl bg-light text-dark placeholder:text-abu focus:outline-none sm:text-base sm:leading-6 dark:bg-white dark:text-dark"
                                placeholder="Masukkan email">
                        </div>
                    </div>
                    @error('email')
                        <small class="text-white">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-2 sm:col-span-4">
                    <label for="password"
                        class="block text-base font-bold leading-6 text-white lg:text-lg dark:text-white">Password</label>
                    <div class="mt-2">
                        <div class="flex shadow-sm">
                            <input id="password" type="password"
                                class="flex-1 px-5 py-3 font-semibold form-control rounded-l-xl bg-light text-dark placeholder:text-abu focus:outline-none sm:text-base sm:leading-6 dark:bg-white dark:text-dark"
                                name="password" required autocomplete="new-password" placeholder="Masukkan password">
                            <span
                                class="px-5 py-3 cursor-pointer icon-eye rounded-r-xl bg-light text-purple dark:text-orange-500 dark:bg-white">
                                <i class="fas fa-eye"></i>
                            </span>                            
                        </div>
                        @error('password')
                            <small class="text-white">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 sm:col-span-4">
                    <label
                        for="password-confirm"
                        class="block text-base font-bold leading-6 text-white lg:text-lg dark:text-white">Confirm
                        Password</label>
                    <div class="mt-2">
                        <div class="flex shadow-sm">
                            <input id="password-confirm" type="password"
                                class="flex-1 px-5 py-3 font-semibold form-control rounded-xl bg-light text-dark placeholder:text-abu focus:outline-none sm:text-base sm:leading-6 dark:bg-white dark:text-dark"
                                name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">                           
                        </div>
                        @error('password')
                            <small class="text-white">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <button
                    class="w-full px-5 py-3 mt-8 font-bold text-center bg-light rounded-xl hover:g-white text-purple dark:text-dark dark:hover:bg-orange-500">Register</button>
            </form>
        </div>
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

@if ($message = Session::get('success'))
    <script>
        Swal.fire("{{ $message }}");
    </script>
@endif

</html>

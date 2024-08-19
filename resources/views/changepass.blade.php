<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')
</head>

<body class="bg-white dark:bg-slate-900 font-montserrat">
    <div class="flex flex-col gap-5 px-3 md:px-16 lg:px-28 md:flex-row text-[#161931]">
        <aside class="py-4 md:w-1/3 lg:w-1/4">        
            <div class="flex justify-end items-center md:hidden">
                <button id="bars-icon" class="text-2xl focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>        
            <div id="dropdown-menu"
                class="hidden md:block md:sticky lg:flex flex-col gap-2 p-4 text-sm border-r border-indigo-100 top-12">
                <a href="#"
                    class="flex items-center px-3 py-2.5 font-bold bg-white text-dark border rounded-full">
                    Profile
                </a>
                <a href="#"
                    class="flex items-center text-dark dark:text-white px-3 py-2.5 font-semibold hover:border hover:rounded-full">
                    Change Password
                </a>
                <a href="#"
                    class="flex items-center text-dark dark:text-white px-3 py-2.5 font-semibold hover:border hover:rounded-full">
                    Logout
                </a>
            </div>
        </aside> 
        <div class="min-h-screen py-1 md:w-2/3 lg:w-3/4">
            <div class="p-2 md:p-4">
                <div class="px-6 pb-8 mt-8 sm:rounded-lg">
                    <h2 class="pl-6 text-2xl font-bold sm:text-xl">Public Profile</h2>
                    <form class="mt-8"
                        action="{{ route('changepass-proses') }}" method="post">
                        @csrf
                        <div class="sm:col-span-4 mb-2">
                            <label for="oldpassword" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Old
                                Password</label>
                            <div class="mt-2">
                                <div class="flex shadow-sm">
                                    <input type="password" name="oldpassword" id="oldpassword" autocomplete="oldpassword"
                                        class="bg-indigo-50 text-indigo-900 text-sm rounded-l-lg outline-none block w-full p-2.5"                            
                                        placeholder="Masukkan password">
                                    <span
                                        class="icon-eye cursor-pointer bg-indigo-50 text-indigo-900 text-sm rounded-r-lg outline-none block p-2.5" 
                                        onclick="togglePasswordVisibility('oldpassword')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                @error('oldpassword')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-4 mb-2">
                            <label for="newpassword" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">New
                                Password</label>
                            <div class="mt-2">
                                <div class="flex shadow-sm">
                                    <input type="password" name="newpassword" id="newpassword" autocomplete="newpassword"
                                        class="bg-indigo-50 text-indigo-900 text-sm rounded-l-lg outline-none block w-full p-2.5"                            
                                        placeholder="Masukkan password">
                                    <span
                                        class="icon-eye cursor-pointer bg-indigo-50 text-indigo-900 text-sm rounded-r-lg outline-none block p-2.5"
                                        onclick="togglePasswordVisibility('newpassword')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                @error('newpassword')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-4 mb-2">
                            <label for="confirmpassword"
                                class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Confirm Password</label>
                            <div class="mt-2">
                                <div class="flex shadow-sm">
                                    <input type="password" name="confirmpassword" id="confirmpassword"
                                        autocomplete="confirmpassword"
                                        class="bg-indigo-50 text-indigo-900 text-sm rounded-l-lg outline-none block w-full p-2.5"                            
                                        placeholder="Masukkan password">
                                    <span
                                        class="icon-eye cursor-pointer bg-indigo-50 text-indigo-900 text-sm rounded-r-lg outline-none block p-2.5"
                                        onclick="togglePasswordVisibility('confirmpassword')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                @error('confirmpassword')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button
                            class="mt-5 text-white bg-indigo-700  hover:bg-indigo-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700">Change
                            Password</button>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@vite('resources/js/dropdown.js')
</html>

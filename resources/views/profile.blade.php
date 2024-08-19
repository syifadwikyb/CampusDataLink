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
    <title>Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
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
        <main class="min-h-screen py-1 md:w-2/3 lg:w-3/4">
            <div class="p-2 md:p-4">
                <div class="px-6 pb-8 mt-8 sm:rounded-lg">
                    <h2 class="pl-6 text-2xl font-bold sm:text-xl">Public Profile</h2>

                    <div class="grid mx-auto mt-8">
                        <div class="flex flex-col items-center space-y-5 sm:flex-row sm:space-y-0">

                            <img class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500"
                                src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGZhY2V8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60"
                                alt="Bordered avatar">

                            <div class="flex flex-col space-y-5 sm:ml-8">
                                {{-- <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf --}}
                                    <button type="submit" class="py-3.5 px-7 text-base font-medium text-indigo-100 focus:outline-none bg-[#202142] rounded-lg border border-indigo-200 hover:bg-indigo-900 focus:ring-4 focus:ring-indigo-200">
                                        Change picture
                                    </button>
                                {{-- </form> --}}
                            
                                {{-- <form action="{{ route('profile.delete-picture') }}" method="POST">
                                    @csrf --}}
                                    <button type="submit"
                                        class="py-3.5 px-7 text-base font-medium text-indigo-900 focus:outline-none bg-white rounded-lg border border-indigo-200 hover:bg-indigo-100 hover:text-[#202142] focus:z-10 focus:ring-4 focus:ring-indigo-200 ">
                                        Delete picture
                                    </button>
                                {{-- </form> --}}
                            </div>
                        </div>

                        <div class="items-center mt-8 sm:mt-14 text-[#202142]">

                            {{-- <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf --}}
                                <div
                                    class="flex flex-col items-center mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                                    <div class="w-full">
                                        <label for="first_name"
                                            class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Your
                                            Full Name</label>
                                        <input type="text" id="first_name" name="name"
                                            {{-- value="{{ old('name', Auth::user()->name) }}" --}}
                                            class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 "
                                            placeholder="Your full name" required>
                                    </div>
                                </div>

                                <div class="mb-2 sm:mb-6">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Your
                                        email</label>
                                    <input type="email" id="email"
                                        {{-- value="{{ Auth::user()->email }}" --}}
                                        class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 "
                                        placeholder="your.email@mail.com" disabled>
                                </div>

                                <div class="mb-2 sm:mb-6">
                                    <label for="phone_number"
                                        class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Phone Number</label>
                                    <input type="text" id="phone_number" name="phone_number"
                                        {{-- value="{{ old('phone_number', Auth::user()->phone_number) }}" --}}
                                        class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 "
                                        placeholder="Your phone number">
                                </div>                            

                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="text-white bg-indigo-700  hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Save</button>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
@vite('resources/js/dropdown.js')
</html>

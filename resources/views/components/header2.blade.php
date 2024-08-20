<div class="sticky top-0 z-50 w-auto h-auto transition-all duration-300 bg-white header">
    <div class="container flex items-center justify-between p-8 mx-auto dark:text-white">
        <div>
            <p>Logo</p>
        </div>
        <div class="flex items-center justify-between">
            <div class="relative">
                <button id="bars-icon" class="text-2xl fas fa-solid fa-bars focus:outline-none"></button>
                <div id="dropdown-menu"
                    class="absolute p-4 right-0 z-10 hidden w-48 mt-8 rounded-lg shadow-lg bg-indigo-50 dark:bg-slate-800">
                    <a href="{{ route('profile.show') }}"
                        class="mb-1 flex justify-center w-full py-2 font-bold rounded-lg  dark:text-white hover:text-white hover:bg-purple-700 dark:hover:bg-orange-500">Profile</a>
                    {{-- <a href="{{ route('changepass') }}"
                        class="mb-1 flex justify-center w-full py-2 font-bold rounded-lg  dark:text-white hover:text-white hover:bg-purple-700 dark:hover:bg-orange-500">Change
                        Password</a> --}}
                    <a href="{{ route('tutorial') }}"
                        class="mb-1 flex justify-center w-full py-2 font-bold rounded-lg  dark:text-white hover:text-white hover:bg-purple-700 dark:hover:bg-orange-500">Tutorial</a>
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button
                            class="flex justify-center w-full py-2 font-bold rounded-lg  dark:text-white hover:text-white hover:bg-purple-700 dark:hover:bg-orange-500"
                            type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@vite('resources/js/dropdown.js')

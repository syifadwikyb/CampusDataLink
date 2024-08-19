<div class="sticky top-0 z-50 w-auto h-auto transition-all duration-300 bg-white header">
    <div class="container flex items-center justify-between p-8 mx-auto dark:text-white">
        <div>
            <p>Logo</p>
        </div>
        <div class="flex items-center justify-between">
            <div class="relative">
                <button id="bars-icon" class="text-4xl fas fa-solid fa-bars focus:outline-none"></button>
                <div id="dropdown-menu"
                    class="absolute right-0 z-10 hidden w-48 mt-8 rounded-lg shadow-lg bg-light dark:bg-slate-700">
                    <a href="#"
                        class="flex justify-center w-full py-2 font-bold rounded-lg text-purple dark:text-white hover:text-white hover:bg-purple dark:hover:bg-orange-500">Profile</a>
                    {{-- <a href="{{ route('changepass') }}"
                        class="flex justify-center w-full py-2 font-bold rounded-lg text-purple dark:text-white hover:text-white hover:bg-purple dark:hover:bg-orange-500">Change
                        Password</a> --}}
                    <a href="{{ route('tutorial') }}"
                        class="flex justify-center w-full py-2 font-bold rounded-lg text-purple dark:text-white hover:text-white hover:bg-purple dark:hover:bg-orange-500">Tutorial</a>
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
@vite('resources/js/dropdown.js')

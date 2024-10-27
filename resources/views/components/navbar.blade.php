<nav class="bg-gray-800 fixed top-0 left-0 w-full z-10">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center gap-x-4 h-16">
            <div class="flex-1 flex items-center gap-x-52">
                <div class="flex-shrink-0 flex items-center">
                    <img src="{{ asset('images/eCommerce-logo.jpg') }}" alt="E-Store Logo" class="h-8 mr-3 rounded-full">
                    <a href="/" class="text-white text-lg font-bold">E-Store</a>
                </div class="flex items-center justify-start">

                <form class="relative flex">
                    <input type="search" class="w-96 rounded-xl h-10 pl-10 pr-10 border border-gray-300"
                        placeholder="Search For Products">
                    <button type="submit"
                        class="absolute right-0 top-1/2 transform -translate-y-1/2 h-full rounded-r-xl w-10 bg-gray-400 border-none cursor-pointer flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#434343">
                            <path
                                d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                        </svg>
                    </button>
                </form>
                <div>
                    @if (Route::has('login'))
                        @auth
                            @include('layouts.user')
                        @else
                            <a href="{{ route('login') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-md">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-md">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>

<nav class="bg-gray-800 fixed top-0 left-0 w-full z-10">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-between">
                <div class="flex-shrink-0">
                    <a href="/" class="text-white text-lg font-bold">MyApp</a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="/"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="/about"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About</a>
                        <a href="/services"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Services</a>
                        <a href="/contact"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                    </div>
                </div>
                <div>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-md">Dashboard</a>
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

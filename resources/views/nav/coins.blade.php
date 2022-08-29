<div class="bg-white" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    {{-- mobile menu --}}
    <div class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true" x-show="open">
        <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true" x-show="open"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
        <div class=" relative max-w-xs w-full bg-white shadow-xl pb-12 flex flex-col overflow-y-auto" x-show="open"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full">
            <div class="px-4 py-3 flex">
                <button @click="open = ! open" type="button" class="bg-white p-2 rounded-md text-gray-400">
                    <span class="sr-only">Close menu</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                {{-- logo --}}
                <div class="ml-4 flex  lg:ml-0">
                    <a href="@if (Route::current() != null && Route::current()->getName() == 'news') {{ route('news.index') }} @else {{ route('index') }} @endif"
                        class="flex items-center">
                        <div>
                            <span class="sr-only">CryptoGainers</span>
                            <img class="h-10 w-auto" src="{{ asset('img/logo.png') }}" alt="CryptoGainers">
                        </div>
                        @if (Route::current() != null && Route::current()->getName() == 'coins')
                            <span class="text-gray-500 font-medium text-md">CryptoGainers Coins</span>
                        @elseif (Route::current() != null && Route::current()->getName() == 'news')
                            <span class="text-gray-500 font-medium text-md">CryptoGainers News</span>
                        @else
                            <span class="text-gray-500 font-medium text-md">CryptoGainers</span>
                        @endif
                    </a>
                </div>
            </div>
            {{-- nav --}}
            <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                @if (Route::current() != null && Route::current()->getName() == 'news')
                    <div class="flow-root">
                        <a href="{{ route('news.index') }}" class="-m-2 p-2 block font-medium text-gray-900">Home</a>
                    </div>
                @else
                    <div class="flow-root">
                        <a href="{{ route('index') }}" class="-m-2 p-2 block font-medium text-gray-900">Home</a>
                    </div>
                @endif

                <div class="flow-root">
                    <a href="{{ route('coins') }}" class="-m-2 p-2 block font-medium text-gray-900">
                        Coins</a>
                </div>
                <div class="flow-root">
                    <a href="{{ route('exchanges.index') }}" class="-m-2 p-2 block font-medium text-gray-900">
                        Exchanges</a>
                </div>
                <div class="flow-root">
                    <a href="{{ route('news.index') }}" class="-m-2 p-2 block font-medium text-gray-900">News</a>
                </div>
            </div>
            {{-- auth --}}
            @if (Route::current() != null && Route::current()->getName() != 'news')
                @if (Route::has('login'))
                    <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                        @auth
                            <div class="flow-root">
                                <a href="{{ url('/dashboard') }}"
                                    class="-m-2 p-2 block font-medium text-gray-900">Dashboard</a>
                            </div>
                        @else
                            <div class="flow-root">
                                <a href="{{ route('login') }}" class="-m-2 p-2 block font-medium text-gray-900">Sign
                                    in</a>
                            </div>
                            @if (Route::has('register'))
                                <div class="flow-root">
                                    <a href="{{ route('register') }}"
                                        class="-m-2 p-2 block font-medium text-gray-900">Create
                                        account</a>
                                </div>
                            @endif
                        @endauth
                    </div>
                @endif
            @endif
            {{-- search form --}}
            <div class="border-t border-gray-200 py-6 px-4">
                <form
                    @if (Route::current() != null && Route::current()->getName() == 'coins') action="{{ route('coins') }}/"
                                @elseif (Route::current() != null && Route::current()->getName() == 'news')
                                action="{{ route('news.index') }}/"
                                @elseif (Route::current() != null && Route::current()->getName() == 'exchange')
                                action="{{ route('exchange') }}/" @endif
                    method="GET" autocomplete="off" class="relative m-0 flex items-center justify-center text-gray-600">
                    <input
                        class="border-1 border-gray-300 bg-white h-10 px-2 w-full pr-10 rounded-lg text-sm focus:outline-none focus:border-primary-300"
                        type="text" name="search" placeholder="Search"
                        value="{{ isset($request['search']) ? $request['search'] : '' }}">
                    <button type="submit" class="absolute right-2">
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
    {{-- nav menu --}}
    <header class="relative bg-white border-b border-gray-200">
        <nav aria-label="Top" class="max-w-7xl mx-auto  xl:px-0  lg:px-8 sm:px-6 px-4 ">
            <div class="">
                <div class="h-16 flex items-center">
                    <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                    <button @click="open = ! open" type="button"
                        class="bg-white p-2 rounded-md text-gray-400 lg:hidden">
                        <span class="sr-only">Open menu</span>
                        <!-- Heroicon name: outline/menu -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    {{-- logo --}}
                    <div class="ml-4 flex  lg:ml-0">
                        <a href="@if (Route::current() != null && Route::current()->getName() == 'news') {{ route('news.index') }} @else {{ route('index') }} @endif"
                            class="flex items-center">
                            <div>
                                <span class="sr-only">CryptoGainers</span>
                                <img class="h-10 w-auto" src="{{ asset('img/logo.png') }}" alt="CryptoGainers">
                            </div>
                            @if (Route::current() != null && Route::current()->getName() == 'coins')
                                <span class="text-gray-500 font-medium text-md">CryptoGainers Coins</span>
                            @elseif (Route::current() != null && Route::current()->getName() == 'news')
                                <span class="text-gray-500 font-medium text-md">CryptoGainers News</span>
                            @else
                                <span class="text-gray-500 font-medium text-md">CryptoGainers</span>
                            @endif
                        </a>
                    </div>
                    {{-- nav menu --}}
                    <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                        <div class="h-full flex space-x-8">
                            @if (Route::current() != null && Route::current()->getName() == 'news')
                                <a href="{{ route('news.index') }}"
                                    class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">
                                    Home</a>
                            @else
                                <a href="{{ route('index') }}"
                                    class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">
                                    Home</a>
                            @endif
                            <a href="{{ route('coins') }}"
                                class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">
                                Coins</a>
                            <a href="{{ route('exchanges.index') }}"
                                class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">
                                Exchanges</a>
                            <a href="{{ route('news.index') }}"
                                class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">News</a>
                        </div>
                    </div>
                    {{-- auth --}}
                    <div class="ml-auto flex items-center">
                        @if (Route::current() != null && Route::current()->getName() != 'news')
                            @if (Route::has('login'))
                                <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                                    @auth
                                        <a href="{{ url('/dashboard') }}"
                                            class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="text-sm font-medium text-gray-700 hover:text-gray-800">Sign
                                            in</a>

                                        @if (Route::has('register'))
                                            <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                                            <a href="{{ route('register') }}"
                                                class="text-sm font-medium text-gray-700 hover:text-gray-800">Create
                                                account</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        @endif
                        {{-- search --}}
                        <div class="hidden lg:flex lg:ml-6 items-center">
                            <form
                                @if (Route::current() != null && Route::current()->getName() == 'coins') action="{{ route('coins') }}/"
                                @elseif (Route::current() != null && Route::current()->getName() == 'news')
                                action="{{ route('news.index') }}/"
                                @elseif (Route::current() != null && Route::current()->getName() == 'exchange')
                                action="{{ route('exchange') }}/" @endif
                                method="GET" autocomplete="off"
                                class="relative m-0 flex items-center justify-center text-gray-600">
                                <input
                                    class="border-1 border-gray-300 bg-white h-10 px-5 pr-10 rounded-lg text-sm focus:outline-none focus:border-primary-300"
                                    type="text" name="search" placeholder="Search"
                                    value="{{ isset($request['search']) ? $request['search'] : '' }}">
                                <button type="submit" class="absolute right-2">
                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>

@php
$navItems = [
    [
        'name' => 'Home',
        'link' => route('news.index'),
    ],
    [
        'name' => 'Bitcoin',
        'link' => route('news.index') . '?tag=bitcoin',
    ],
    // [
    //     'name' => 'Ethereum',
    //     'link' => route('news.index') . '?tag=ethereum',
    // ],
    // [
    //     'name' => 'Binance',
    //     'link' => route('news.index') . '?tag=binance',
    // ],
    [
        'name' => 'Solana',
        'link' => route('news.index') . '?tag=solana',
    ],
    [
        'name' => 'Babydoge',
        'link' => route('news.index') . '?tag=babydoge',
    ],
];
@endphp
<div class=" bg-white dark:bg-slate-900" x-data="{ open: false }" @click.outside="open = false"
    @close.stop="open = false">
    {{-- mobile menu --}}
    <div class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true" x-show="open">
        <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true" x-show="open"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
        <div class=" relative max-w-xs w-full bg-white dark:bg-slate-900 shadow-xl pb-12 flex flex-col overflow-y-auto"
            x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full">
            <div class="px-4 py-3 flex">
                <button @click="open = ! open" type="button"
                    class="bg-white dark:bg-slate-800 p-2 rounded-md text-gray-400">
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
                    <a href="{{ route('news.index') }}" class="flex items-center">
                        <div>
                            <span class="sr-only">CryptoGainers</span>
                            <img class="h-10 w-auto" src="{{ asset('img/logo.png') }}" alt="CryptoGainers">
                        </div>
                        <span class="text-gray-500 dark:text-gray-200 font-medium text-md">CryptoGainers</span>
                    </a>
                </div>
            </div>
            {{-- nav --}}
            <div class="border-t border-gray-200/70 dark:border-gray-200/10 py-6 px-4 space-y-6">
                @foreach ($navItems as $item)
                    <div class="flow-root">
                        <a href="{{ $item['link'] }}"
                            class="-m-2 p-2 block font-medium text-slate-900 dark:text-gray-400">
                            {{ $item['name'] }}</a>
                    </div>
                @endforeach
            </div>
            {{-- search form --}}
            <div class="border-t border-gray-200 py-6 px-4">
                <form action="{{ route('exchanges.index') }}/" method="GET" autocomplete="off"
                    class="relative m-0 flex items-center justify-center text-gray-600">
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
    <header class="relative  bg-white dark:bg-slate-900 border-b border-primary-200/70 dark:border-gray-800">
        <nav aria-label="Top" class="max-w-7xl mx-auto  xl:px-0  lg:px-8 sm:px-6 px-4 ">
            <div class="">
                <div class="h-16 flex items-center">
                    <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                    <button @click="open = ! open" type="button"
                        class="bg-white dark:bg-slate-800 p-2 rounded-md text-gray-400 lg:hidden">
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
                        <a href="{{ route('index') }}" class="flex items-center">
                            <div>
                                <span class="sr-only">CryptoGainers</span>
                                <img class="h-10 w-auto" src="{{ asset('img/logo.png') }}" alt="CryptoGainers">
                            </div>
                            <span class="text-gray-500 dark:text-gray-200 font-medium text-md">CryptoGainers</span>
                        </a>
                    </div>
                    {{-- nav menu --}}
                    <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                        <div class="h-full flex space-x-8">
                            @foreach ($navItems as $item)
                                <a href="{{ $item['link'] }}"
                                    class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800 dark:text-gray-200 hover:dark:text-gray-50 transition">
                                    {{ $item['name'] }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="ml-auto flex items-center">
                        {{-- search --}}
                        <div class="hidden lg:flex lg:ml-6 items-center">
                            <form action="{{ route('exchanges.index') }}/" method="GET" autocomplete="off"
                                class="relative m-0 flex items-center justify-center text-gray-600">
                                <input
                                    class="border-1 border-primary-300/60 bg-white dark:bg-slate-900 h-10 px-5 pr-10 rounded-lg text-sm focus:outline-none focus:border-primary-300/70 placeholder:text-gray-500 placeholder:dark:text-gray-50 text-gray-500 dark:text-gray-50 "
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
                    {{-- change theme --}}
                    <div class="relative">
                        <div class="flex items-center border-l border-slate-200 ml-6 pl-6 dark:border-slate-800">
                            <label class="sr-only" id="headlessui-listbox-label-3">Theme</label>
                            <button @click="darkMode = !darkMode" type="button" id="headlessui-listbox-button-4"
                                aria-haspopup="true" aria-expanded="false"
                                aria-labelledby="headlessui-listbox-label-3 headlessui-listbox-button-undefined"><span
                                    class="dark:hidden"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                        <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                            class="fill-sky-400/20 stroke-sky-500"></path>
                                        <path
                                            d="M12 4v1M17.66 6.344l-.828.828M20.005 12.004h-1M17.66 17.664l-.828-.828M12 20.01V19M6.34 17.664l.835-.836M3.995 12.004h1.01M6 6l.835.836"
                                            class="stroke-sky-500"></path>
                                    </svg>
                                </span>
                                <span class="hidden dark:inline"><svg viewBox="0 0 24 24" fill="none"
                                        class="w-6 h-6">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17.715 15.15A6.5 6.5 0 0 1 9 6.035C6.106 6.922 4 9.645 4 12.867c0 3.94 3.153 7.136 7.042 7.136 3.101 0 5.734-2.032 6.673-4.853Z"
                                            class="fill-sky-400/20"></path>
                                        <path
                                            d="m17.715 15.15.95.316a1 1 0 0 0-1.445-1.185l.495.869ZM9 6.035l.846.534a1 1 0 0 0-1.14-1.49L9 6.035Zm8.221 8.246a5.47 5.47 0 0 1-2.72.718v2a7.47 7.47 0 0 0 3.71-.98l-.99-1.738Zm-2.72.718A5.5 5.5 0 0 1 9 9.5H7a7.5 7.5 0 0 0 7.5 7.5v-2ZM9 9.5c0-1.079.31-2.082.845-2.93L8.153 5.5A7.47 7.47 0 0 0 7 9.5h2Zm-4 3.368C5 10.089 6.815 7.75 9.292 6.99L8.706 5.08C5.397 6.094 3 9.201 3 12.867h2Zm6.042 6.136C7.718 19.003 5 16.268 5 12.867H3c0 4.48 3.588 8.136 8.042 8.136v-2Zm5.725-4.17c-.81 2.433-3.074 4.17-5.725 4.17v2c3.552 0 6.553-2.327 7.622-5.537l-1.897-.632Z"
                                            class="fill-sky-500"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17 3a1 1 0 0 1 1 1 2 2 0 0 0 2 2 1 1 0 1 1 0 2 2 2 0 0 0-2 2 1 1 0 1 1-2 0 2 2 0 0 0-2-2 1 1 0 1 1 0-2 2 2 0 0 0 2-2 1 1 0 0 1 1-1Z"
                                            class="fill-sky-500"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>

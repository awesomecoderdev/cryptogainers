@php
$navItems = [
    [
        'name' => 'Home',
        'link' => route('index'),
    ],
    [
        'name' => 'Coins',
        'link' => route('coins.index'),
    ],
    [
        'name' => 'Exchanges',
        'link' => route('exchanges.index'),
    ],
    [
        'name' => 'News',
        'link' => route('news.index'),
    ],
];

$page = Route::current() != null ? Route::current()->getName() : 'admin.dashboard';
$inactive = 'font-medium text-slate-700 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-300';
$active = 'font-semibold text-sky-500 dark:text-sky-400';
@endphp

<div class="fixed w-full z-20 bg-white dark:bg-slate-900" x-data="{ open: false }" @click.outside="open = false"
    @close.stop="open = false">
    {{-- mobile menu --}}
    {{-- <div class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true" x-show="open">
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
                <div class="ml-4 flex  lg:ml-0">
                    <a href="{{ route('index') }}" class="flex items-center">
                        <div>
                            <span class="sr-only">CryptoGainers</span>
                            <img class="h-10 w-auto" src="{{ asset('img/logo.png') }}" alt="CryptoGainers">
                        </div>
                        <span class="text-gray-500 dark:text-gray-200 font-medium text-md">CryptoGainers </span>
                    </a>
                </div>
            </div>
            <div class="border-t border-gray-200/70 dark:border-gray-200/10 py-6 px-4 space-y-6">
                @foreach ($navItems as $item)
                    <div class="flow-root">
                        <a href="{{ $item['link'] }}"
                            class="-m-2 p-2 block font-medium text-slate-900 dark:text-gray-400">
                            {{ $item['name'] }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    {{-- nav menu --}}
    <header class="relative bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-gray-800 ">
        <div class="relative mx-3">
            <nav aria-label="Top" class="mx-auto xl:px-0 ">
                <div class="">
                    <div class="h-16 flex items-center">

                        {{-- logo --}}
                        <div class="flex  lg:ml-0">
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                                <div>
                                    <img class="h-10 w-auto" src="{{ asset('img/logo.png') }}" alt="CryptoGainers">
                                </div>
                                <span
                                    class="hidden sm:block text-gray-500 dark:text-gray-200 font-medium text-md">CryptoGainers
                                </span>
                            </a>
                        </div>

                        {{-- auth --}}
                        <div class="ml-auto flex items-center">
                        </div>

                        {{-- change theme --}}
                        <div class="relative">
                            <div class="flex items-center ">
                                <a href="{{ route('coins.index') }}" target="_blank"
                                    class="dark:bg-slate-400/10 group mr-3 text-gray-700 hover:text-gray-800 dark:text-gray-200 hover:dark:text-gray-50 rounded-md ring-1 ring-slate-900/5 shadow-sm ">
                                    <svg class=" h-5 w-5 m-1 text-pink-400 group-hover:text-pink-500/80 dark:group-hover:text-pink-300 dark:text-slate-400"
                                        fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            class="fill-pink-50 group-hover:fill-pink-100 dark:group-hover:fill-transparent dark:fill-transparent"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </a>
                                <a href="{{ route('exchanges.index') }}" target="_blank"
                                    class="dark:bg-slate-400/10 group mr-3 text-gray-700 hover:text-gray-800 dark:text-gray-200 hover:dark:text-gray-50 rounded-md ring-1 ring-slate-900/5 shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class=" h-5 w-5 m-1 text-indigo-400 group-hover:text-indigo-500/95 dark:text-slate-400 dark:group-hover:text-indigo-400 "
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            class="fill-indigo-100 group-hover:fill-indigo-200/80 dark:fill-transparent dark:group-hover:fill-transparent"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </a>
                                <a href="{{ route('news.index') }}" target="_blank"
                                    class="dark:bg-slate-400/10 group mr-2 text-gray-700 hover:text-gray-800 dark:text-gray-200 hover:dark:text-gray-50 rounded-md ring-1 ring-slate-900/5 shadow-sm">
                                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.5 7c1.093 0 2.117.27 3 .743V17a6.345 6.345 0 0 0-3-.743c-1.093 0-2.617.27-3.5.743V7.743C5.883 7.27 7.407 7 8.5 7Z"
                                            class="fill-sky-200 group-hover:fill-sky-500 dark:fill-sky-300 dark:group-hover:fill-sky-300">
                                        </path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.5 7c1.093 0 2.617.27 3.5.743V17c-.883-.473-2.407-.743-3.5-.743s-2.117.27-3 .743V7.743a6.344 6.344 0 0 1 3-.743Z"
                                            class="fill-sky-400 group-hover:fill-sky-500 dark:fill-sky-200 dark:group-hover:fill-sky-200">
                                        </path>
                                    </svg>
                                </a>
                                <div class="relative inline-block " x-data="{ dropdown: false }"
                                    @click.outside="dropdown = false" @close.stop="dropdown = false">
                                    <!-- Dropdown toggle button -->
                                    <button href="{{ route('wishlist') }}" @click="dropdown = ! dropdown"
                                        class="flex items-center mr-1 text-gray-700 hover:text-gray-800 dark:text-gray-200 hover:dark:text-gray-50 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                        </svg>
                                    </button>

                                    <!-- Dropdown menu -->
                                    <div class="absolute right-0 z-20 w-48 py-2 mt-2 bg-white border border-slate-900/10 rounded-md shadow-xl dark:bg-gray-800"
                                        x-show="dropdown" x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95">

                                        <a href="{{ route('admin.profile') }}"
                                            class="flex items-center px-3 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13C9.23858 13 7 10.7614 7 8ZM12 11C13.6569 11 15 9.65685 15 8C15 6.34315 13.6569 5 12 5C10.3431 5 9 6.34315 9 8C9 9.65685 10.3431 11 12 11Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M6.34315 16.3431C4.84285 17.8434 4 19.8783 4 22H6C6 20.4087 6.63214 18.8826 7.75736 17.7574C8.88258 16.6321 10.4087 16 12 16C13.5913 16 15.1174 16.6321 16.2426 17.7574C17.3679 18.8826 18 20.4087 18 22H20C20 19.8783 19.1571 17.8434 17.6569 16.3431C16.1566 14.8429 14.1217 14 12 14C9.87827 14 7.84344 14.8429 6.34315 16.3431Z"
                                                    fill="currentColor"></path>
                                            </svg>

                                            <span class="mx-1">
                                                Profile
                                            </span>
                                        </a>

                                        <a href="{{ route('admin.settings') }}"
                                            class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.8199 22H10.1799C9.71003 22 9.30347 21.673 9.20292 21.214L8.79592 19.33C8.25297 19.0921 7.73814 18.7946 7.26092 18.443L5.42392 19.028C4.97592 19.1709 4.48891 18.9823 4.25392 18.575L2.42992 15.424C2.19751 15.0165 2.27758 14.5025 2.62292 14.185L4.04792 12.885C3.98312 12.2961 3.98312 11.7019 4.04792 11.113L2.62292 9.816C2.27707 9.49837 2.19697 8.98372 2.42992 8.576L4.24992 5.423C4.48491 5.0157 4.97192 4.82714 5.41992 4.97L7.25692 5.555C7.50098 5.37416 7.75505 5.20722 8.01792 5.055C8.27026 4.91269 8.52995 4.78385 8.79592 4.669L9.20392 2.787C9.30399 2.32797 9.71011 2.00049 10.1799 2H13.8199C14.2897 2.00049 14.6958 2.32797 14.7959 2.787L15.2079 4.67C15.4887 4.79352 15.7622 4.93308 16.0269 5.088C16.2739 5.23081 16.5126 5.38739 16.7419 5.557L18.5799 4.972C19.0276 4.82967 19.514 5.01816 19.7489 5.425L21.5689 8.578C21.8013 8.98548 21.7213 9.49951 21.3759 9.817L19.9509 11.117C20.0157 11.7059 20.0157 12.3001 19.9509 12.889L21.3759 14.189C21.7213 14.5065 21.8013 15.0205 21.5689 15.428L19.7489 18.581C19.514 18.9878 19.0276 19.1763 18.5799 19.034L16.7419 18.449C16.5093 18.6203 16.2677 18.7789 16.0179 18.924C15.7557 19.0759 15.4853 19.2131 15.2079 19.335L14.7959 21.214C14.6954 21.6726 14.2894 21.9996 13.8199 22ZM7.61992 16.229L8.43992 16.829C8.62477 16.9652 8.81743 17.0904 9.01692 17.204C9.20462 17.3127 9.39788 17.4115 9.59592 17.5L10.5289 17.909L10.9859 20H13.0159L13.4729 17.908L14.4059 17.499C14.8132 17.3194 15.1998 17.0961 15.5589 16.833L16.3799 16.233L18.4209 16.883L19.4359 15.125L17.8529 13.682L17.9649 12.67C18.0141 12.2274 18.0141 11.7806 17.9649 11.338L17.8529 10.326L19.4369 8.88L18.4209 7.121L16.3799 7.771L15.5589 7.171C15.1997 6.90671 14.8132 6.68175 14.4059 6.5L13.4729 6.091L13.0159 4H10.9859L10.5269 6.092L9.59592 6.5C9.39772 6.58704 9.20444 6.68486 9.01692 6.793C8.81866 6.90633 8.62701 7.03086 8.44292 7.166L7.62192 7.766L5.58192 7.116L4.56492 8.88L6.14792 10.321L6.03592 11.334C5.98672 11.7766 5.98672 12.2234 6.03592 12.666L6.14792 13.678L4.56492 15.121L5.57992 16.879L7.61992 16.229ZM11.9959 16C9.78678 16 7.99592 14.2091 7.99592 12C7.99592 9.79086 9.78678 8 11.9959 8C14.2051 8 15.9959 9.79086 15.9959 12C15.9932 14.208 14.2039 15.9972 11.9959 16ZM11.9959 10C10.9033 10.0011 10.0138 10.8788 9.99815 11.9713C9.98249 13.0638 10.8465 13.9667 11.9386 13.9991C13.0307 14.0315 13.9468 13.1815 13.9959 12.09V12.49V12C13.9959 10.8954 13.1005 10 11.9959 10Z"
                                                    fill="currentColor"></path>
                                            </svg>

                                            <span class="mx-1">
                                                Settings
                                            </span>
                                        </a>

                                        <hr class="border-gray-200 dark:border-gray-700 ">

                                        @can('isSupperAdmin')
                                            <a href="{{ route('admin.admins') }}"
                                                class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18 22C15.8082 21.9947 14.0267 20.2306 14 18.039V16H9.99996V18.02C9.98892 20.2265 8.19321 22.0073 5.98669 22C3.78017 21.9926 1.99635 20.1999 2.00001 17.9934C2.00367 15.7868 3.79343 14 5.99996 14H7.99996V9.99999H5.99996C3.79343 9.99997 2.00367 8.21315 2.00001 6.00663C1.99635 3.8001 3.78017 2.00736 5.98669 1.99999C8.19321 1.99267 9.98892 3.77349 9.99996 5.97999V7.99999H14V5.99999C14 3.79085 15.7908 1.99999 18 1.99999C20.2091 1.99999 22 3.79085 22 5.99999C22 8.20913 20.2091 9.99999 18 9.99999H16V14H18C20.2091 14 22 15.7909 22 18C22 20.2091 20.2091 22 18 22ZM16 16V18C16 19.1046 16.8954 20 18 20C19.1045 20 20 19.1046 20 18C20 16.8954 19.1045 16 18 16H16ZM5.99996 16C4.89539 16 3.99996 16.8954 3.99996 18C3.99996 19.1046 4.89539 20 5.99996 20C6.53211 20.0057 7.04412 19.7968 7.42043 19.4205C7.79674 19.0442 8.00563 18.5321 7.99996 18V16H5.99996ZM9.99996 9.99999V14H14V9.99999H9.99996ZM18 3.99999C17.4678 3.99431 16.9558 4.2032 16.5795 4.57952C16.2032 4.95583 15.9943 5.46784 16 5.99999V7.99999H18C18.5321 8.00567 19.0441 7.79678 19.4204 7.42047C19.7967 7.04416 20.0056 6.53215 20 5.99999C20.0056 5.46784 19.7967 4.95583 19.4204 4.57952C19.0441 4.2032 18.5321 3.99431 18 3.99999ZM5.99996 3.99999C5.4678 3.99431 4.95579 4.2032 4.57948 4.57952C4.20317 4.95583 3.99428 5.46784 3.99996 5.99999C3.99428 6.53215 4.20317 7.04416 4.57948 7.42047C4.95579 7.79678 5.4678 8.00567 5.99996 7.99999H7.99996V5.99999C8.00563 5.46784 7.79674 4.95583 7.42043 4.57952C7.04412 4.2032 6.53211 3.99431 5.99996 3.99999Z"
                                                        fill="currentColor"></path>
                                                </svg>

                                                <span class="mx-1">
                                                    Admins
                                                </span>
                                            </a>

                                            <a href="{{ route('admin.users') }}"
                                                class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9 3C6.23858 3 4 5.23858 4 8C4 10.7614 6.23858 13 9 13C11.7614 13 14 10.7614 14 8C14 5.23858 11.7614 3 9 3ZM6 8C6 6.34315 7.34315 5 9 5C10.6569 5 12 6.34315 12 8C12 9.65685 10.6569 11 9 11C7.34315 11 6 9.65685 6 8Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M16.9084 8.21828C16.6271 8.07484 16.3158 8.00006 16 8.00006V6.00006C16.6316 6.00006 17.2542 6.14956 17.8169 6.43645C17.8789 6.46805 17.9399 6.50121 18 6.5359C18.4854 6.81614 18.9072 7.19569 19.2373 7.65055C19.6083 8.16172 19.8529 8.75347 19.9512 9.37737C20.0496 10.0013 19.9987 10.6396 19.8029 11.2401C19.6071 11.8405 19.2719 12.3861 18.8247 12.8321C18.3775 13.2782 17.8311 13.6119 17.2301 13.8062C16.6953 13.979 16.1308 14.037 15.5735 13.9772C15.5046 13.9698 15.4357 13.9606 15.367 13.9496C14.7438 13.8497 14.1531 13.6038 13.6431 13.2319L13.6421 13.2311L14.821 11.6156C15.0761 11.8017 15.3717 11.9248 15.6835 11.9747C15.9953 12.0247 16.3145 12.0001 16.615 11.903C16.9155 11.8059 17.1887 11.639 17.4123 11.416C17.6359 11.193 17.8035 10.9202 17.9014 10.62C17.9993 10.3198 18.0247 10.0006 17.9756 9.68869C17.9264 9.37675 17.8041 9.08089 17.6186 8.82531C17.4331 8.56974 17.1898 8.36172 16.9084 8.21828Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M19.9981 21C19.9981 20.475 19.8947 19.9551 19.6938 19.47C19.4928 18.9849 19.1983 18.5442 18.8271 18.1729C18.4558 17.8017 18.0151 17.5072 17.53 17.3062C17.0449 17.1053 16.525 17.0019 16 17.0019V15C16.6821 15 17.3584 15.1163 18 15.3431C18.0996 15.3783 18.1983 15.4162 18.2961 15.4567C19.0241 15.7583 19.6855 16.2002 20.2426 16.7574C20.7998 17.3145 21.2417 17.9759 21.5433 18.7039C21.5838 18.8017 21.6217 18.9004 21.6569 19C21.8837 19.6416 22 20.3179 22 21H19.9981Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M16 21H14C14 18.2386 11.7614 16 9 16C6.23858 16 4 18.2386 4 21H2C2 17.134 5.13401 14 9 14C12.866 14 16 17.134 16 21Z"
                                                        fill="currentColor"></path>
                                                </svg>

                                                <span class="mx-1">Users</span>
                                            </a>

                                            <a href="{{ route('admin.users.new') }}"
                                                class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4 19H2C2 15.6863 4.68629 13 8 13C11.3137 13 14 15.6863 14 19H12C12 16.7909 10.2091 15 8 15C5.79086 15 4 16.7909 4 19ZM19 16H17V13H14V11H17V8H19V11H22V13H19V16ZM8 12C5.79086 12 4 10.2091 4 8C4 5.79086 5.79086 4 8 4C10.2091 4 12 5.79086 12 8C11.9972 10.208 10.208 11.9972 8 12ZM8 6C6.9074 6.00111 6.01789 6.87885 6.00223 7.97134C5.98658 9.06383 6.85057 9.9667 7.94269 9.99912C9.03481 10.0315 9.95083 9.1815 10 8.09V8.49V8C10 6.89543 9.10457 6 8 6Z"
                                                        fill="currentColor"></path>
                                                </svg>

                                                <span class="mx-1">
                                                    Add New
                                                </span>
                                            </a>
                                        @endcan

                                        <hr class="border-gray-200 dark:border-gray-700 ">

                                        {{-- <a href="#"
                                            class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 22C6.47967 21.9939 2.00606 17.5203 2 12V11.8C2.10993 6.30452 6.63459 1.92794 12.1307 2.00087C17.6268 2.07379 22.0337 6.56887 21.9978 12.0653C21.9619 17.5618 17.4966 21.9989 12 22ZM11.984 20H12C16.4167 19.9956 19.9942 16.4127 19.992 11.996C19.9898 7.57928 16.4087 3.99999 11.992 3.99999C7.57528 3.99999 3.99421 7.57928 3.992 11.996C3.98979 16.4127 7.56729 19.9956 11.984 20ZM13 18H11V16H13V18ZM13 15H11C10.9684 13.6977 11.6461 12.4808 12.77 11.822C13.43 11.316 14 10.88 14 9.99999C14 8.89542 13.1046 7.99999 12 7.99999C10.8954 7.99999 10 8.89542 10 9.99999H8V9.90999C8.01608 8.48093 8.79333 7.16899 10.039 6.46839C11.2846 5.76778 12.8094 5.78493 14.039 6.51339C15.2685 7.24184 16.0161 8.57093 16 9.99999C15.9284 11.079 15.3497 12.0602 14.44 12.645C13.6177 13.1612 13.0847 14.0328 13 15Z"
                                                    fill="currentColor"></path>
                                            </svg>

                                            <span class="mx-1">
                                                Help
                                            </span>
                                        </a> --}}
                                        <a href="{{ route('logout') }}"
                                            class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19 21H10C8.89543 21 8 20.1046 8 19V15H10V19H19V5H10V9H8V5C8 3.89543 8.89543 3 10 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21ZM12 16V13H3V11H12V8L17 12L12 16Z"
                                                    fill="currentColor"></path>
                                            </svg>

                                            <span class="mx-1">
                                                Sign Out
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <button @click="darkMode = !darkMode" type="button"
                                    class="border-l ml-2 pl-2 border-slate-200 dark:border-slate-800">
                                    <span class="dark:hidden"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"
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
        </div>
    </header>
</div>

<div id="sidebar"
    class="fixed pt-16 z-10 shadow-sm border-r border-gray-600/10 rounde bg-white dark:bg-slate-900/95 min-h-screen h-auto">
    <aside class="lg:w-56 w-auto pl-2" aria-label="Sidebar">
        <div class="overflow-y-auto lg:py-4 py-2 lg:px-3 px-1 ">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="group flex items-center lg:text-sm lg:leading-6 mb-4 {{ $page == 'admin.dashboard' ? $active : $inactive }} ">
                        <div
                            class="lg:mr-4 mr-1 rounded-md ring-1 ring-slate-900/5 shadow-sm group-hover:shadow group-hover:ring-slate-900/10 dark:ring-0 dark:shadow-none dark:group-hover:shadow-none dark:group-hover:highlight-white/10 group-hover:shadow-sky-200 dark:group-hover:bg-sky-500 dark:bg-sky-500 dark:highlight-white/10">
                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
                                    class="fill-purple-400 group-hover:fill-purple-500 dark:group-hover:fill-purple-300 dark:fill-slate-600">
                                </path>
                                <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
                                    class="fill-purple-200 group-hover:fill-purple-300 dark:group-hover:fill-white dark:fill-slate-400">
                                </path>
                                <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
                                    class="fill-purple-400 group-hover:fill-purple-500 dark:group-hover:fill-purple-300 dark:fill-slate-600">
                                </path>
                            </svg>
                        </div>
                        <span class="lg:block hidden">Dashboard</span>

                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.news.index') }}"
                        class="group flex items-center lg:text-sm lg:leading-6 mb-4 {{ $page == 'admin.news.index' ? $active : $inactive }} ">
                        <div
                            class="lg:mr-4 mr-1 rounded-md ring-1 ring-slate-900/5 shadow-sm group-hover:shadow group-hover:ring-slate-900/10 dark:ring-0 dark:shadow-none dark:group-hover:shadow-none dark:group-hover:highlight-white/10 group-hover:shadow-purple-200 dark:group-hover:bg-purple-400 dark:bg-slate-800 dark:highlight-white/5">
                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.5 7c1.093 0 2.117.27 3 .743V17a6.345 6.345 0 0 0-3-.743c-1.093 0-2.617.27-3.5.743V7.743C5.883 7.27 7.407 7 8.5 7Z"
                                    class="fill-sky-200 group-hover:fill-sky-500 dark:fill-sky-300 dark:group-hover:fill-sky-300">
                                </path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.5 7c1.093 0 2.617.27 3.5.743V17c-.883-.473-2.407-.743-3.5-.743s-2.117.27-3 .743V7.743a6.344 6.344 0 0 1 3-.743Z"
                                    class="fill-sky-400 group-hover:fill-sky-500 dark:fill-sky-200 dark:group-hover:fill-sky-200">
                                </path>
                            </svg>
                        </div>
                        <span class="lg:block hidden">News</span>

                    </a>
                </li>
                {{-- @can('isSupperAdmin') --}}
                @can('isSupperAdmin')
                    <li>
                        <a href="{{ route('admin.exchanges') }}"
                            class="group flex items-center lg:text-sm lg:leading-6 mb-4 {{ $page == 'admin.exchanges' ? $active : $inactive }} ">
                            <div
                                class="lg:mr-4 mr-1 rounded-md ring-1 ring-slate-900/5 shadow-sm group-hover:shadow group-hover:ring-slate-900/10 dark:ring-0 dark:shadow-none dark:group-hover:shadow-none dark:group-hover:highlight-white/10 group-hover:shadow-indigo-200 dark:group-hover:bg-indigo-500 dark:bg-slate-800 dark:highlight-white/5">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class=" h-5 w-5 m-1 text-indigo-400 group-hover:text-indigo-500/95 dark:text-slate-400 dark:group-hover:text-indigo-400 "
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        class="fill-indigo-100 group-hover:fill-indigo-200/80 dark:fill-transparent dark:group-hover:fill-transparent"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <span class="lg:block hidden">Exchanges</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.coins') }}"
                            class="group flex items-center lg:text-sm lg:leading-6 mb-4 {{ $page == 'admin.coins' ? $active : $inactive }} ">
                            <div
                                class="lg:mr-4 mr-1 justify-center rounded-md ring-1 ring-slate-900/5 shadow-sm group-hover:shadow group-hover:ring-slate-900/10 dark:ring-0 dark:shadow-none dark:group-hover:shadow-none dark:group-hover:highlight-white/10 group-hover:shadow-pink-200 dark:group-hover:bg-pink-500 dark:bg-slate-800 dark:highlight-white/5">
                                <svg class="h-5 w-5 m-1 text-pink-400 group-hover:text-pink-500/80 dark:group-hover:text-pink-300 dark:text-slate-400"
                                    fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        class="fill-pink-50 group-hover:fill-pink-100 dark:group-hover:fill-transparent dark:fill-transparent"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="lg:block hidden">Coins</span>
                        </a>
                    </li>
                @endcan
                <li>
                    <a href="{{ route('admin.settings') }}"
                        class="group flex items-center lg:text-sm lg:leading-6 mb-4 {{ $page == 'admin.settings' ? $active : $inactive }} ">
                        <div
                            class="lg:mr-4 mr-1 rounded-md ring-1 ring-slate-900/5 shadow-sm group-hover:shadow group-hover:ring-slate-900/10 dark:ring-0 dark:shadow-none dark:group-hover:shadow-none dark:group-hover:highlight-white/10 group-hover:shadow-blue-200 dark:group-hover:bg-blue-500 dark:bg-slate-800 dark:highlight-white/5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 m-1 " fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <span class="lg:block hidden">Settings</span>

                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.community') }}"
                        class="group flex items-center lg:text-sm lg:leading-6 mb-8 {{ $page == 'admin.community' ? $active : $inactive }} ">
                        <div
                            class="lg:mr-4 mr-1 rounded-md ring-1 ring-slate-900/5 shadow-sm group-hover:shadow group-hover:ring-slate-900/10 dark:ring-0 dark:shadow-none dark:group-hover:shadow-none dark:group-hover:highlight-white/10 group-hover:shadow-violet-200 dark:group-hover:bg-violet-500 dark:bg-slate-800 dark:highlight-white/5">
                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11 5a6 6 0 0 0-4.687 9.746c.215.27.315.62.231.954l-.514 2.058a1 1 0 0 0 1.485 1.1l2.848-1.71c.174-.104.374-.15.576-.148H13a6 6 0 0 0 0-12h-2Z"
                                    class="fill-violet-400 group-hover:fill-violet-500 dark:group-hover:fill-violet-300 dark:fill-slate-600">
                                </path>
                                <circle cx="12" cy="11" r="1"
                                    class="fill-white dark:group-hover:fill-white dark:fill-slate-400"></circle>
                                <circle cx="9" cy="11" r="1"
                                    class="fill-violet-200 dark:group-hover:fill-white dark:fill-slate-400">
                                </circle>
                                <circle cx="15" cy="11" r="1"
                                    class="fill-violet-200 dark:fill-slate-400 dark:group-hover:fill-white">
                                </circle>
                            </svg>
                        </div>
                        <span class="lg:block hidden">Community</span>

                    </a>
                </li>
            </ul>
        </div>
    </aside>
</div>

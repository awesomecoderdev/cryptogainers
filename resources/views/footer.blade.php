{{-- scroll to top --}}
<div x-data="{scrollBackTop: false}" x-cloak>
    <button x-show="scrollBackTop" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95 translate-y-5"
        x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="transform opacity-0 scale-95 translate-y-5"
        x-on:scroll.window="scrollBackTop = (window.pageYOffset > window.outerHeight * 0.5) ? true : false"
        x-on:click="document.body.scrollTop = 0; document.documentElement.scrollTop = 0;" aria-label=" Back to top"
        class=" rounded-full fixed bottom-0 right-0 p-2 lg:m-10 m-5  text-white dark:text-primary-400 bg-primary-400/80 hover:bg-primary-400/95 dark:bg-slate-600/80 hover:dark:bg-slate-600/95 transition-all focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
    </button>
</div>
{{-- footer --}}
<footer
    class="bg-white dark:bg-gray-900 pb-2 text-sm leading-6 divide-y divide-gray-200 dark:divide-gray-800 border-t border-gray-200 dark:border-gray-800 pt-10">
    <div class="max-w-7xl mx-auto  divide-slate-200 px-4 sm:px-6 md:px-8 dark:divide-slate-700">
        <div class="flex">
            <div class="flex-none w-1/2 space-y-10 sm:space-y-8 lg:flex lg:space-y-0">
                <div class="lg:flex-none lg:w-1/2">
                    <h2 class="font-semibold text-gray-900 dark:text-gray-100">Getting Started</h2>
                    <ul class="mt-3 space-y-2">
                        <li><a class="hover:text-gray-900 dark:hover:text-gray-300"
                                href="/docs/installation">Installation</a></li>
                        <li><a class="hover:text-gray-900 dark:hover:text-gray-300" href="/docs/editor-setup">Editor
                                Setup</a></li>
                        <li><a class="hover:text-gray-900 dark:hover:text-gray-300" href="/docs/browser-support">Browser
                                Support</a></li>
                        <li><a class="hover:text-gray-900 dark:hover:text-gray-300" href="/docs/upgrade-guide">Upgrade
                                Guide</a></li>
                    </ul>
                </div>
                <div class="lg:flex-none lg:w-1/2">
                    <h2 class="font-semibold text-gray-900 dark:text-gray-100">Core Concepts</h2>
                    <ul class="mt-3 space-y-2">
                        <li><a class="hover:text-gray-900 dark:hover:text-gray-300" href="/docs/dark-mode">Dark
                                Mode</a></li>
                        <li><a class="hover:text-gray-900 dark:hover:text-gray-300" href="/docs/reusing-styles">Reusing
                                Styles</a></li>
                        <li><a class="hover:text-gray-900 dark:hover:text-gray-300"
                                href="/docs/adding-custom-styles">Adding Custom Styles</a></li>
                        <li><a class="hover:text-gray-900 dark:hover:text-gray-300"
                                href="/docs/functions-and-directives">Functions &amp; Directives</a></li>
                    </ul>
                </div>
            </div>
            <div class="flex-none w-1/2 space-y-10 sm:space-y-8 lg:flex lg:space-y-0">
                <div class="lg:flex-none lg:w-1/2">
                    <h2 class="font-semibold text-gray-900 dark:text-gray-100">Support</h2>
                    <ul class="mt-3 space-y-2">
                        <li>
                            <a href="{{ route('page.terms') }}" class="hover:text-gray-900 dark:hover:text-gray-300"
                                target="_blank">Terms
                                and Conditions</a>
                        </li>
                        <li>
                            <a href="{{ route('page.contact') }}" class="hover:text-gray-900 dark:hover:text-gray-300"
                                target="_blank">Contact Us</a>
                        </li>
                        <li>
                            <a href="{{ route('page.privacy') }}" class="hover:text-gray-900 dark:hover:text-gray-300"
                                target="_blank">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="{{ route('page.advertising') }}"
                                class="hover:text-gray-900 dark:hover:text-gray-300" target="_blank">Advertising</a>
                        </li>
                        {{-- <li>
                            <a class="hover:text-gray-900 dark:hover:text-gray-300" href="#">Forum</a>
                        </li> --}}
                        <li>
                            <a href="{{ route('page.faq') }}" class="hover:text-gray-900 dark:hover:text-gray-300"
                                target="_blank">FAQ</a>
                        </li>


                    </ul>
                </div>
                <div class="lg:flex-none lg:w-1/2">
                    <h2 class="font-semibold text-gray-900 dark:text-gray-100">Community</h2>
                    <ul class="mt-3 space-y-2">
                        <li>
                            <a class="hover:text-gray-900 dark:hover:text-gray-300"
                                href="https://facebook.com/CryptoGainersIO" target="_blank">Facebook</a>
                        </li>
                        <li>
                            <a class="hover:text-gray-900 dark:hover:text-gray-300"
                                href="https://twitter.com/CryptoGainersIO" target="_blank">Twitter</a>
                        </li>
                        <li>
                            <a class="hover:text-gray-900 dark:hover:text-gray-300"
                                href="https://www.instagram.com/cryptogainers.io/" target="_blank">Instagram</a>
                        </li>
                        <li>
                            <a class="hover:text-gray-900 dark:hover:text-gray-300"
                                href="https://www.pinterest.com/cryptogainersio" target="_blank">Pinterest</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>


    </div>

    <div class="mt-10 pt-2 bg-white dark:bg-gray-900">
        <div class="container flex justify-center items-center">
            <img src="{{ asset('img/logo.png') }}" class="w-10" alt=""><span
                class="text-gray-500 dark:text-gray-200">CryptoGainers</span>
        </div>
    </div>
</footer>
@include('scripts')
</body>

</html>

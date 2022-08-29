{{-- index file --}}
@extends('template.support')

{{-- title --}}
@section('title', 'Wishlist : CryptoGainers')

{{-- meta data --}}
@section('meta')
    <meta name="description"
        content="Leading news source for cryptocurrency, Bitcoin, Ethereum, Blockchain, DeFi, and more. Read the latest analysis and guides by CryptoGainers." />
    <meta property="og:title" content="Home" />
    <meta property="og:description"
        content="Leading news source for cryptocurrency, Bitcoin, Ethereum, Blockchain, DeFi, and more. Read the latest analysis and guides by CryptoGainers." />
    <meta property="og:url" content="https://watcher.guru/news/" />
    <meta property="og:site_name" content="CryptoGainers" />
    <meta property="article:modified_time" content="2021-10-10T15:31:51+00:00" />
    <meta property="og:image" content="https://watcher.guru/news/wp-content/uploads/2021/08/keyart.jpg" />
    <meta property="og:image:width" content="1920" />
    <meta property="og:image:height" content="1005" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="https://watcher.guru/news/wp-content/uploads/2021/08/keyart.jpg" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="1 minute" />
@endsection

{{-- content --}}
@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="container max-w-4xl px-6 py-10 mx-auto">
            <h1 class="text-4xl font-semibold text-center text-gray-800 dark:text-white">Frequently asked questions</h1>

            <div class="mt-12 space-y-8">
                <div x-data="{ faq1: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="faq1 = ! faq1" class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">How i can play for my appoinment ?
                        </h1>

                        <span x-show="faq1" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!faq1" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="faq1" class="relative lg:p-8 p-4">
                        <p class="text-sm text-gray-500 dark:text-gray-300">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas eaque nobis, fugit odit omnis
                            fugiat deleniti animi ab maxime cum laboriosam recusandae facere dolorum veniam quia pariatur
                            obcaecati illo ducimus?
                        </p>
                    </div>
                </div>

                <div x-data="{ faq2: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="faq2 = ! faq2" class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">Is the cost of the appoinment
                            covered by
                            private health insurance?</h1>

                        <span x-show="faq2" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!faq2" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="faq2" class="relative lg:p-8 p-4">
                        <p class="text-sm text-gray-500 dark:text-gray-300">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas eaque nobis, fugit odit omnis
                            fugiat deleniti animi ab maxime cum laboriosam recusandae facere dolorum veniam quia pariatur
                            obcaecati illo ducimus?
                        </p>
                    </div>

                </div>

                <div x-data="{ faq3: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="faq3 = ! faq3" class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">Do i need a referral?</h1>

                        <span x-show="faq3" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!faq3" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="faq3" class="relative lg:p-8 p-4">
                        <p class="text-sm text-gray-500 dark:text-gray-300">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas eaque nobis, fugit odit omnis
                            fugiat deleniti animi ab maxime cum laboriosam recusandae facere dolorum veniam quia pariatur
                            obcaecati illo ducimus?
                        </p>
                    </div>
                </div>

                <div x-data="{ faq4: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="faq4 = ! faq4" class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">What are your opening house?</h1>

                        <span x-show="faq4" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!faq4" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="faq4" class="relative lg:p-8 p-4">
                        <p class=" text-sm text-gray-500 dark:text-gray-300">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas eaque nobis, fugit odit omnis
                            fugiat deleniti animi ab maxime cum laboriosam recusandae facere dolorum veniam quia pariatur
                            obcaecati illo ducimus?
                        </p>
                    </div>
                </div>

                <div x-data="{ faq5: false }" class="border-2 border-gray-100 rounded-lg dark:border-gray-700">
                    <button @click="faq5 = ! faq5" class="flex items-center justify-between w-full lg:p-8 p-3">
                        <h1 class="font-semibold text-left text-gray-700 dark:text-white">What can i expect at my first
                            consultation?
                        </h1>

                        <span x-show="faq5" class="text-gray-400 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                            </svg>
                        </span>
                        <span x-show="!faq5" class="text-white bg-primary-400 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </span>
                    </button>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div x-show="faq5" class="relative lg:p-8 p-4">
                        <p class="text-sm text-gray-500 dark:text-gray-300">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas eaque nobis, fugit odit omnis
                            fugiat deleniti animi ab maxime cum laboriosam recusandae facere dolorum veniam quia pariatur
                            obcaecati illo ducimus?
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

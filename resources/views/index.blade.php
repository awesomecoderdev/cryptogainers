{{-- index file --}}
@extends('template.index')

{{-- title --}}
@section('title', 'Crypto Analysis, Tracking and Crypto News : CryptoGainers')

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



    <div class="relative container">
        {{-- go for prev --}}
        <div class="goForPrev absolute inset-y-0 left-0 z-10 flex items-center">
            <button
                class=" bg-white -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
                <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class=" swiper newsSlider">
            <div class="swiper-wrapper">

                @foreach ($news as $slider)
                    <a href="{{ $slider->slug }}" class="swiper-slide p-4">
                        <div class="flex flex-col rounded shadow overflow-hidden">
                            <div class="flex-shrink-0">
                                <img class="h-48 w-full object-cover" src="{{ $slider->thumbnail }}" {{-- src="https://images.unsplash.com/photo-1598951092651-653c21f5d0b9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" --}}
                                    alt="">
                            </div>
                        </div>
                    </a>
                @endforeach


                {{-- <div class="swiper-slide p-4">
                    <div class="flex flex-col rounded shadow overflow-hidden">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover"
                                src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                                alt="">
                        </div>
                    </div>
                </div>

                <div class="swiper-slide p-4">
                    <div class="flex flex-col rounded shadow overflow-hidden">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover"
                                src="https://images.unsplash.com/photo-1598951092651-653c21f5d0b9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80"
                                alt="">
                        </div>
                    </div>
                </div>

                <div class="swiper-slide p-4">
                    <div class="flex flex-col rounded shadow overflow-hidden">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover"
                                src="https://images.unsplash.com/photo-1598946423291-ce029c687a42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80"
                                alt="">
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
        {{-- go for next --}}
        <div class="goForNext absolute inset-y-0 right-0 z-10 flex items-center">
            <button
                class="bg-white -mr-2 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
                <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-800/80">
        <div
            class="max-w-2xl mx-auto py-24 px-4 grid items-center grid-cols-1 gap-y-16 gap-x-8 sm:px-6 sm:py-32 lg:max-w-7xl lg:px-8 lg:grid-cols-2">
            <div>
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Technical Specifications
                </h2>
                <p class="mt-4 text-gray-500">The walnut wood card tray is precision milled to perfectly fit a stack of
                    Focus cards. The powder coated steel divider separates active cards from new ones, or can be used to
                    archive important task lists.</p>

                <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
                    <div class="border-t border-gray-200 pt-4">
                        <dt class="font-medium text-gray-900">Origin</dt>
                        <dd class="mt-2 text-sm text-gray-500">Designed by Good Goods, Inc.</dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="font-medium text-gray-900">Material</dt>
                        <dd class="mt-2 text-sm text-gray-500">Solid walnut base with rare earth magnets and powder
                            coated steel card cover</dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="font-medium text-gray-900">Dimensions</dt>
                        <dd class="mt-2 text-sm text-gray-500">6.25&quot; x 3.55&quot; x 1.15&quot;</dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="font-medium text-gray-900">Finish</dt>
                        <dd class="mt-2 text-sm text-gray-500">Hand sanded and finished with natural oil</dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="font-medium text-gray-900">Includes</dt>
                        <dd class="mt-2 text-sm text-gray-500">Wood card tray and 3 refill packs</dd>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <dt class="font-medium text-gray-900">Considerations</dt>
                        <dd class="mt-2 text-sm text-gray-500">Made from natural materials. Grain and color vary with
                            each item.</dd>
                    </div>
                </dl>
            </div>
            <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
                <img src="{{ asset('img/bitcoin.jpg') }}"
                    alt="Walnut card tray with white powder coated steel divider and 3 punchout holes."
                    class="bg-gray-100 rounded-lg">
                <img src="{{ asset('img/chart.jpg') }}"
                    alt="Top down view of walnut card tray with embedded magnets and card groove."
                    class="bg-gray-100 rounded-lg">
                <img src="{{ asset('img/eth.jpg') }}"
                    alt="Side of walnut card tray with card groove and recessed card area." class="bg-gray-100 rounded-lg">
                <img src="{{ asset('img/chart2.jpg') }}"
                    alt="Walnut card tray filled with cards and card angled in dedicated groove."
                    class="bg-gray-100 rounded-lg">
            </div>
        </div>
    </div>

    <div class="flex justify-center items-center">
        <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
        <div class="2xl:mx-auto 2xl:container lg:px-20 lg:py-16 md:py-12 md:px-6 py-9 px-4 w-96 sm:w-auto">
            <div role="main" class="flex flex-col items-center justify-center">
                <h1 class="text-4xl font-semibold leading-9 text-center text-gray-800 dark:text-gray-50">This Week
                    Tranding
                </h1>
                <p
                    class="text-base leading-normal text-center text-gray-500 dark:text-white mt-4 lg:w-1/2 md:w-10/12 w-11/12">
                    If you're looking for random paragraphs, you've come to the right place. When a random word or a
                    random sentence isn't quite enough</p>
            </div>
            <div class="lg:flex items-stretch md:mt-12 mt-8">
                <div class="lg:w-1/2">
                    <div class="sm:flex items-center justify-between xl:gap-x-8 gap-x-6">
                        <div class="sm:w-1/2 relative">
                            <div>
                                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">
                                    {{ date('d F, Y', strtotime($news[0]->updated_at)) }}</p>
                                <div class="absolute bottom-0 left-0 p-6">
                                    <h2 class="text-xl font-semibold 5 text-white">{{ $news[0]->title }}</h2>
                                    {{-- <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p> --}}
                                    <a href="{{ $news[0]->slug }}"
                                        class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                        <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <img src="{{ $news[0]->thumbnail }}" class="w-full" alt="{{ $news[0]->title }}" />
                        </div>
                        <div class="sm:w-1/2 sm:mt-0 mt-4 relative">
                            <div>
                                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">
                                    {{ date('d F, Y', strtotime($news[1]->updated_at)) }}</p>
                                <div class="absolute bottom-0 left-0 p-6">
                                    <h2 class="text-xl font-semibold 5 text-white">{{ $news[1]->title }}</h2>
                                    {{-- <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p> --}}
                                    <a href="{{ $news[1]->slug }}"
                                        class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                        <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <img src="{{ $news[1]->thumbnail }}" class="w-full" alt="{{ $news[1]->title }}" />
                        </div>
                    </div>
                    <div class="relative">
                        <div>
                            <p class="md:p-10 p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">
                                {{ date('d F, Y', strtotime($news[2]->updated_at)) }}</p>
                            <div class="absolute bottom-0 left-0 md:p-10 p-6">
                                <a href="{{ $news[2]->slug }}">
                                    <h2 class="text-xl font-semibold 5 text-white">{{ $news[2]->title }}</h2>
                                </a>
                                {{-- <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p> --}}
                                <a href="{{ $news[2]->slug }}"
                                    class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                    <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <img src="{{ $news[2]->thumbnail }}" alt="{{ $news[2]->title }}"
                            class="w-full mt-8 md:mt-6 hidden sm:block" />
                        <img class="w-full mt-4 sm:hidden" src="{{ $news[2]->thumbnail }}"
                            alt="{{ $news[2]->title }}" />
                    </div>
                </div>
                <div class="lg:w-1/2 xl:ml-8 lg:ml-4 lg:mt-0 md:mt-6 mt-4 lg:flex flex-col justify-between">
                    <div class="relative">
                        <div>
                            <p class="md:p-10 p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">
                                {{ date('d F, Y', strtotime($news[3]->updated_at)) }}</p>
                            <div class="absolute bottom-0 left-0 md:p-10 p-6">
                                <a href="{{ $news[3]->slug }}">
                                    <h2 class="text-xl font-semibold 5 text-white">{{ $news[3]->title }}</h2>
                                </a>
                                {{-- <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p> --}}
                                <a href="{{ $news[3]->slug }}"
                                    class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                    <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                    <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <img src="{{ $news[3]->thumbnail }}" alt="{{ $news[3]->title }}"
                            class="w-full sm:block hidden" />
                        <img class="w-full sm:hidden" src="{{ $news[3]->thumbnail }}" alt="{{ $news[3]->title }}" />
                    </div>
                    <div class="sm:flex items-center justify-between xl:gap-x-8 gap-x-6 md:mt-6 mt-4">
                        <div class="relative w-full">
                            <div>
                                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">
                                    {{ date('d F, Y', strtotime($news[4]->updated_at)) }}</p>
                                <div class="absolute bottom-0 left-0 p-6">
                                    <a href="{{ $news[4]->slug }}">
                                        <h2 class="text-xl font-semibold 5 text-white">{{ $news[4]->title }}</h2>
                                    </a>
                                    {{-- <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p> --}}
                                    <a href="{{ $news[4]->slug }}"
                                        class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                        <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <img src="{{ $news[4]->thumbnail }}" class="w-full" alt="{{ $news[4]->title }}" />
                        </div>
                        <div class="relative w-full sm:mt-0 mt-4">
                            <div>
                                <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">
                                    {{ date('d F, Y', strtotime($news[5]->updated_at)) }}</p>
                                <div class="absolute bottom-0 left-0 p-6">
                                    <a href="{{ $news[5]->slug }}">
                                        <h2 class="text-xl font-semibold 5 text-white">{{ $news[5]->title }}</h2>
                                    </a>
                                    {{-- <p class="text-base leading-4 text-white mt-2">Dive into minimalism</p> --}}
                                    <a href="{{ $news[5]->slug }}"
                                        class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                        <p class="pr-2 text-sm font-medium leading-none">Read More</p>
                                        <svg class="fill-stroke" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <img src="{{ $news[5]->thumbnail }}" class="w-full"
                                alt="{{ $news[5]->title }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('hero')

    <div class="relative w-full overflow-hidden">
        <video
            class="-z-10 absolute top-0 left-0 right-0 bottom-0 h-auto mx-auto min-h-screen min-w-full object-contain  blur-sm"
            loop muted autoplay playsinline type='video/webm'>
            <source src="{{ asset('video/crypto.webm') }}" type="video/webm">
            <source src="{{ asset('video/crypto.mp4') }}" type="video/mp4">
        </video>


        <section class="z-10 py-20 bg-blend-saturation saturate-200 bg-white/20 dark:bg-black/80">


            <div class="container px-6 py-16 mx-auto">
                <div class="items-center lg:flex">
                    <div class="w-full lg:w-1/2">
                        <div class="lg:max-w-lg">
                            <h1 class="text-2xl font-semibold text-gray-800 uppercase dark:text-white lg:text-3xl">Best
                                Place To Choose Your Clothes</h1>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Porro beatae error laborum ab amet sunt recusandae? Reiciendis natus
                                perspiciatis optio.</p>
                            <button
                                class="w-full px-3 py-2 mt-6 text-xs font-medium text-white uppercase transition-colors duration-200 transform bg-blue-600 rounded-md lg:w-auto hover:bg-blue-500 focus:outline-none focus:bg-blue-500">Shop
                                Now</button>
                        </div>
                    </div>

                    <div class="flex items-center justify-center w-full mt-6 lg:mt-0 lg:w-1/2">
                        <img class="w-full h-full lg:max-w-2xl" src="../../../assets/svg/Catalogue-pana.svg"
                            alt="Catalogue-pana.svg">
                    </div>
                </div>
            </div>

        </section>


    </div>
@endsection

{{-- index file --}}
@extends('template.search.news')

@isset($request['search'])
    @php
    $title = $request['search'];
    @endphp
    {{-- title --}}
    @section('title', "Showing search result \"$title\" : CryptoGainers News")
@else
    {{-- title --}}
@section('title', 'CryptoGainers News : Bitcoin, Ethereum, BSC & Daily Crypto News and Analysis')
@endisset

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
@if ($news->isEmpty())
    {{-- no data available --}}
    <div class=" h-full container rounded p-4bg-white dark:bg-slate-800 border border-gray-200 dark:border-gray-800 ">
        <div class="flex flex-col my-auto justify-center items-center">
            <img class="h-auto md:w-60 lg:w-72 w-40 opacity-80 my-10" src="{{ asset('svg/lost.svg') }}" alt="">
            <h1 class="lg:text-4xl md:text-2xl text-2xl font-bold text-slate-500 dark:text-primary-200">No data
                available.</h1>
            <div class="relative lg:w-full justify-center my-10 lg:flex lg:ml-6 items-center">
                <form action="{{ route('news.index') }}/" method="GET" autocomplete="off"
                    class="relative m-0 lg:mr-10 flex items-center justify-center text-gray-600">
                    <input
                        class="border-1 lg:w-96 border-gray-300 bg-white h-10 px-5 pr-10 rounded-lg text-sm focus:outline-none focus:border-primary-300"
                        type="text" name="search" placeholder="Search"
                        value="{{ isset($request['search']) ? $request['search'] : '' }}">
                    <button type="submit" class="absolute right-2 ">
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
    {{-- no data available --}}
@else
    @foreach ($news as $post)
        <article id="news-{{ $post->id }}"
            class="bg-white mb-5 border border-primary-100 rounded-md dark:bg-gray-800 drop-shadow-xl ">
            <div class="lg:px-4 md:px-4 px-0 lg:py-4 md:py-4 mx-auto">
                <div class=" lg:flex md:flex">

                    <div class="lg:w-1/2 md:w-1/2 relative overflow-hidden rounded-lg ">
                        <a href="{{ $post->slug }}">
                            <div class="ease-in-out duration-300 flex transform transition-all hover:scale-110 rounded-lg items-center justify-center w-full  md:h-60 xl:h-60 lg:h-60 h-60 xl:justify-start bg-cover bg-no-repeat bg-center"
                                style="background-image: url('{{ $post->thumbnail }}')">
                            </div>
                        </a>
                    </div>


                    <div
                        class="mt-2  lg:mx-2 md:pl-4 pl-0 md:mt-0 md:w-1/2 md:mx-0 mx-2 lg:mt-0 lg:w-1/2 flex flex-col justify-between">
                        <a href="{{ $post->slug }}">
                            <h1 class="lg:text-2xl md:text-2xl text-xl font-bold text-gray-800 dark:text-gray-100">
                                {{ $post->title }}
                            </h1>
                        </a>

                        <p class="mt-2 text-gray-500 dark:text-gray-400 lg:max-w-md">
                            {{ substr(strip_tags($post->content), 0, 100) }}...
                        </p>

                        {{-- share --}}
                        {{-- <div class="flex items-center mt-6 -mx-2">

                                <a class="mx-2" target="_blank"
                                    href="https://www.facebook.com/sharer.php?u={{ $post->slug }}"
                                    aria-label="Facebook">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        class="w-5 h-5 text-gray-700 fill-current dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400">
                                        <path
                                            d="M12.001 2.002c-5.522 0-9.999 4.477-9.999 9.999 0 4.99 3.656 9.126 8.437 9.879v-6.988h-2.54v-2.891h2.54V9.798c0-2.508 1.493-3.891 3.776-3.891 1.094 0 2.24.195 2.24.195v2.459h-1.264c-1.24 0-1.628.772-1.628 1.563v1.875h2.771l-.443 2.891h-2.328v6.988C18.344 21.129 22 16.992 22 12.001c0-5.522-4.477-9.999-9.999-9.999z">
                                        </path>
                                    </svg>
                                </a>

                                <a class="mx-2" target="_blank"
                                    href="https://twitter.com/share?&amp;text={{ $post->title }}&amp;via=CryptoGainersIO&amp;url={{ $post->slug }}"
                                    aria-label="Twitter">
                                    <svg class="w-5 h-5 text-gray-700 fill-current dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z">
                                        </path>
                                    </svg>
                                </a>


                                <a class="mx-2" target="_blank"
                                    href="https://api.whatsapp.com/send?text={{ $post->title }} {{ $post->slug }}"
                                    aria-label="Whatsapp">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        class="w-5 h-5 text-gray-700 fill-current dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263">
                                        </path>
                                    </svg>
                                </a>

                                <a class="mx-2" target="_blank"
                                    href="http://www.reddit.com/submit?url={{ $post->slug }}"
                                    aria-label="Reddit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        class="w-5 h-5 text-gray-700 fill-current dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400">
                                        <circle cx="9.67" cy="13" r="1.001"></circle>
                                        <path
                                            d="M14.09 15.391A3.28 3.28 0 0 1 12 16a3.271 3.271 0 0 1-2.081-.63.27.27 0 0 0-.379.38c.71.535 1.582.809 2.471.77a3.811 3.811 0 0 0 2.469-.77v.04a.284.284 0 0 0 .006-.396.28.28 0 0 0-.396-.003zm.209-3.351a1 1 0 0 0 0 2l-.008.039c.016.002.033 0 .051 0a1 1 0 0 0 .958-1.038 1 1 0 0 0-1.001-1.001z">
                                        </path>
                                        <path
                                            d="M12 2C6.479 2 2 6.477 2 12c0 5.521 4.479 10 10 10s10-4.479 10-10c0-5.523-4.479-10-10-10zm5.859 11.33c.012.146.012.293 0 .439 0 2.24-2.609 4.062-5.83 4.062s-5.83-1.82-5.83-4.062a2.681 2.681 0 0 1 0-.439 1.46 1.46 0 0 1-.455-2.327 1.458 1.458 0 0 1 2.063-.063 7.145 7.145 0 0 1 3.899-1.23l.743-3.47v-.004A.313.313 0 0 1 12.82 6l2.449.49a1.001 1.001 0 1 1-.131.61L13 6.65l-.649 3.12a7.123 7.123 0 0 1 3.85 1.23 1.46 1.46 0 0 1 2.469 1c.01.563-.307 1.08-.811 1.33z">
                                        </path>
                                    </svg>
                                </a>
                            </div> --}}

                        <div class="relative my-2 flex">
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('news.index') }}?tag={{ $tag }}"
                                    class="{{ isset($request['tag']) && $request['tag'] == $tag ? 'bg-primary-100 border-primary-200' : '' }} rounded-xl font-medium mr-2 border transition-all hover:bg-primary-100 hover:text-gray-600 border-primary-100 px-2 my-2 text-gray-500">
                                    {{ $tag }}
                                </a>
                            @endforeach
                        </div>

                        <div class="relative flex items-center justify-between md:mb-0 mb-2 ">
                            <span
                                class="font-medium text-sm text-gray-400">{{ date('d F, Y', strtotime($post->created_at)) }}</span>
                            <a class="rounded-xl font-medium mr-2 border transition-all bg-primary-50 hover:bg-primary-100 hover:text-gray-600 border-primary-300 px-5 py-2 text-gray-500"
                                href="{{ $post->slug }}">
                                Read More
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </article>
    @endforeach

    {{-- pagenation --}}
    {{ $news->links() }}
@endif
@endsection



{{-- sidebar --}}
@section('sidebar')
<div id="trending"
    class="bg-white dark:bg-slate-800 relative w-full lg:px-5 px-3 rounded border border-primary-100 dark:border-slate-900/10 ">
    <div class="relative mt-4">
        <span
            class=" text-gray-500 dark:text-gray-300 font-bold text-sm px-3 py-1 border rounded-xl border-primary-200/70 dark:border-slate-600 bg-primary-50 dark:bg-slate-900/10 ">Tranding</span>

        <span
            class=" text-gray-500 dark:text-gray-300 font-bold text-sm px-3 py-1 border rounded-xl border-primary-200/70 dark:border-slate-600 bg-primary-50 dark:bg-slate-900/10 ">This
            Week</span>

    </div>
    @foreach ($trending as $trend)
        <x-news-trend :trend="$trend" />
    @endforeach
</div>
@endsection


{{-- recent --}}
@section('recent')
<section class="text-gray-600 body-font">
    <div class="container lg:px-5 px-3 lg:pt-10 pt-5 mx-auto">
        <div class="flex flex-wrap -m-4">
            @php $recent_limit=0; @endphp
            @foreach ($recent as $recent)
                {{-- for desktop only --}}
                @if ($recent_limit < 8)
                    <div class="relative p-4 xl:w-1/4 lg:w-1/3 md:w-1/2 xl:block hidden">
                        <div
                            class="h-full border bg-white border-primary-200 border-opacity-60 rounded-lg overflow-hidden">
                            <div class="relative overflow-hidden ">
                                <a href="{{ $recent->slug }}">
                                    <div class="lg:h-48 md:h-64 h-52 w-full bg-no-repeat bg-cover bg-center transform transition-all ease-in-out duration-300 hover:scale-110"
                                        style="background-image: url('{{ $recent->thumbnail }}')">
                                    </div>
                                </a>
                            </div>


                            <div class="p-4 relative h-full">
                                <div class="relative flex flex-wrap ">
                                    @php $tag_counter=0; @endphp
                                    @foreach ($recent->tags as $tag)
                                        @if ($tag_counter < 2)
                                            <a href="{{ route('news.index') }}?tag={{ $tag }}"
                                                class="{{ isset($request['tag']) && $request['tag'] == $tag ? 'bg-primary-100 border-primary-200' : '' }}  text-sm md:text-md rounded-xl font-medium mr-2 border transition-all hover:bg-primary-100 hover:text-gray-600 border-primary-100 px-2 my-2 text-gray-500">
                                                {{ $tag }}
                                            </a>
                                        @endif
                                        @php $tag_counter++; @endphp
                                    @endforeach
                                </div>
                                <a href="{{ $recent->slug }}">
                                    <h1 class="title-font text-lg font-bold text-gray-800 dark:text-gray-100 mb-2">
                                        {{ $recent->title }}</h1>
                                </a>

                                <p class="text-gray-500 dark:text-gray-400 lg:max-w-md h-20">
                                    {{ substr(strip_tags($recent->content), 0, 50) }}...
                                </p>
                                <div class=" flex items-center justify-between flex-wrap">
                                    <span
                                        class="font-medium text-xs text-gray-400">{{ date('d F, Y', strtotime($recent->created_at)) }}</span>

                                    <a href="{{ $recent->slug }}"
                                        class=" text-primary-500 font-medium inline-flex items-center md:mb-2 lg:mb-0">Read
                                        More
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif

                {{-- for tab and laptop --}}
                @if ($recent_limit < 6)
                    <div class="relative p-4 xl:w-1/4 lg:w-1/3 md:w-1/2 xl:hidden lg:block md:block hidden">
                        <div
                            class="h-full border bg-white border-primary-200 border-opacity-60 rounded-lg overflow-hidden">
                            <div class="relative overflow-hidden ">
                                <a href="{{ $recent->slug }}">
                                    <div class="lg:h-48 md:h-64 h-52 w-full bg-no-repeat bg-cover bg-center transform transition-all ease-in-out duration-300 hover:scale-110"
                                        style="background-image: url('{{ $recent->thumbnail }}')">
                                    </div>
                                </a>
                            </div>


                            <div class="p-4 relative h-full">
                                <div class="relative flex flex-wrap ">
                                    @foreach ($recent->tags as $tag)
                                        <a href="{{ route('news.index') }}?tag={{ $tag }}"
                                            class="{{ isset($request['tag']) && $request['tag'] == $tag ? 'bg-primary-100 border-primary-200' : '' }}  text-sm md:text-md rounded-xl font-medium mr-2 border transition-all hover:bg-primary-100 hover:text-gray-600 border-primary-100 px-2 my-2 text-gray-500">
                                            {{ $tag }}
                                        </a>
                                    @endforeach
                                </div>
                                <a href="{{ $recent->slug }}">
                                    <h1 class="title-font text-lg font-bold text-gray-800 dark:text-gray-100 mb-2">
                                        {{ $recent->title }}</h1>
                                </a>

                                <p class="text-gray-500 dark:text-gray-400 lg:max-w-md h-20">
                                    {{ substr(strip_tags($recent->content), 0, 50) }}...
                                </p>
                                <div class=" flex items-center justify-between flex-wrap">
                                    <span
                                        class="font-medium text-xs text-gray-400">{{ date('d F, Y', strtotime($recent->created_at)) }}</span>

                                    <a href="{{ $recent->slug }}"
                                        class=" text-primary-500 font-medium inline-flex items-center md:mb-2 lg:mb-0">Read
                                        More
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif

                {{-- for phone only --}}
                @if ($recent_limit < 4)
                    <div class="relative p-4 xl:w-1/4 lg:w-1/3 md:w-1/2  xl:hidden lg:hidden md:hidden block ">
                        <div
                            class="h-full border bg-white border-primary-200 border-opacity-60 rounded-lg overflow-hidden">
                            <div class="relative overflow-hidden ">
                                <a href="{{ $recent->slug }}">
                                    <div class="lg:h-48 md:h-64 h-52 w-full bg-no-repeat bg-cover bg-center transform transition-all ease-in-out duration-300 hover:scale-110"
                                        style="background-image: url('{{ $recent->thumbnail }}')">
                                    </div>
                                </a>
                            </div>


                            <div class="p-4 relative h-full">
                                <div class="relative flex flex-wrap ">
                                    @foreach ($recent->tags as $tag)
                                        <a href="{{ route('news.index') }}?tag={{ $tag }}"
                                            class="{{ isset($request['tag']) && $request['tag'] == $tag ? 'bg-primary-100 border-primary-200' : '' }}  text-sm md:text-md rounded-xl font-medium mr-2 border transition-all hover:bg-primary-100 hover:text-gray-600 border-primary-100 px-2 my-2 text-gray-500">
                                            {{ $tag }}
                                        </a>
                                    @endforeach
                                </div>
                                <a href="{{ $recent->slug }}">
                                    <h1 class="title-font text-lg font-bold text-gray-800 dark:text-gray-100 mb-2">
                                        {{ $recent->title }}</h1>
                                </a>

                                <p class="text-gray-500 dark:text-gray-400 lg:max-w-md h-20">
                                    {{ substr(strip_tags($recent->content), 0, 50) }}...
                                </p>
                                <div class=" flex items-center justify-between flex-wrap">
                                    <span
                                        class="font-medium text-xs text-gray-400">{{ date('d F, Y', strtotime($recent->created_at)) }}</span>

                                    <a href="{{ $recent->slug }}"
                                        class=" text-primary-500 font-medium inline-flex items-center md:mb-2 lg:mb-0">Read
                                        More
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
                @php $recent_limit++; @endphp
            @endforeach

        </div>
    </div>
</section>
@endsection

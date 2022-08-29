{{-- index file --}}
@extends('template.news')

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
        <x-news-card :post="$post" :request="$request" />
    @endforeach
    {{-- pagenation --}}
    {{-- {{ $news->links() }} --}}
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
<section class="text-slate-600 body-font">
    <div class="container lg:px-5 px-3 lg:pt-10 pt-5 mx-auto">
        <div class="flex flex-wrap -m-4">
            @php $recent_limit=0; @endphp
            @foreach ($recent as $recent)
                {{-- for desktop only --}}
                @if ($recent_limit < 8)
                    <x-news-recent :recent="$recent" :request="$request" class="xl:block hidden" />
                @endif
                {{-- for tab and laptop --}}
                @if ($recent_limit < 6)
                    <x-news-recent :recent="$recent" :request="$request" class="xl:hidden lg:block md:block hidden" />
                @endif
                {{-- for phone only --}}
                @if ($recent_limit < 4)
                    <x-news-recent :recent="$recent" :request="$request"
                        class=" xl:hidden lg:hidden md:hidden block " />
                @endif
                @php $recent_limit++; @endphp
            @endforeach

        </div>
    </div>
</section>
@endsection

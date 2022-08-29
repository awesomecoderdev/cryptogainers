{{-- index file --}}
@extends('template.single.news')

{{-- title --}}
@section('title', "$news->title : CryptoGainers News")

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
    <article id="news-{{ $news->id }}"
        class="bg-white  border border-primary-100 dark:border-primary-300/10 rounded-md dark:bg-gray-800 ">
        <div class="lg:px-4 md:px-4 px-0 lg:py-4 md:py-4 mx-auto">
            <h1 class="lg:mb-5 lg:text-4xl md:text-3xl text-2xl font-bold text-gray-800 dark:text-gray-100">
                {{ $news->title }}</h1>

            {!! $news->content !!}
        </div>
    </article>
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

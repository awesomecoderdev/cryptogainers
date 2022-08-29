{{-- index file --}}
@extends('template.single.coins')

{{-- title --}}
@section('title', "$coin->title : CryptoGainers News")

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
    <article id="news-{{ $coin->id }}">

        <div class="mb-6 prose prose-slate dark:prose-dark">

            <p>
                {!! $content->description->en !!}
            </p>
        </div>

        <div id="coinChart" class="h-screen max-h-screen-md  w-3/4"></div>
    </article>
    <script src="{{ route('coins.script', $coin->slug) }}"></script>
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
    </div>
@endsection

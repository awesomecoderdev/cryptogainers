{{-- index file --}}
@extends('template.single.exchanges')

{{-- title --}}
@section('title', "$exchanges->name Trade Volume, Trade Pairs, and Info : CryptoGainers Exchanges")

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
    {{-- @json($exchanges) --}}
    {{-- {{ $exchanges->exchange_id }} --}}
    @php $charts = Http::get("https://api.coingecko.com/api/v3/exchanges/$exchanges->exchange_id/volume_chart?days=1"); @endphp


    @foreach ($charts->json() as $chart)
        @json($chart)
        <br>
    @endforeach


@endsection

{{-- sidebar --}}
@section('sidebar')
    {{-- @json($exchanges) --}}
@endsection

{{-- index file --}}
@extends('template.exchanges')

@isset($request['search'])
    @php
    $title = $request['search'];
    @endphp
    {{-- title --}}
    @section('title', "Showing search result \"$title\" : CryptoGainers")
@else
    {{-- title --}}
@section('title', 'Top Crypto Exchanges Ranking : CryptoGainers')
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

@if ($exchanges->isEmpty())
    {{-- no data available --}}
    <div class="bg-white h-full container rounded-md p-4 border border-primary-100">
        <div class="flex flex-col my-auto justify-center items-center">
            <img class="h-auto md:w-60 lg:w-72 w-40 opacity-80 my-10" src="{{ asset('svg/lost.svg') }}" alt="">
            <h1 class="lg:text-4xl md:text-2xl text-2xl font-bold text-primary-600">No data available.</h1>
            <div class="relative lg:w-full justify-center my-10 lg:flex lg:ml-6 items-center">
                <form
                    @if (Route::current()->getName() == 'coins') action="{{ route('coins') }}/"
                    @elseif (Route::current()->getName() == 'news')
                    action="{{ route('news.index') }}/"
                    @elseif (Route::current()->getName() == 'exchange')
                    action="{{ route('exchange') }}/" @endif
                    method="GET" autocomplete="off"
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
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col mb-5">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Exchange Score</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Role</th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Edit</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @php $rank= (($exchanges->currentPage() * $exchanges->perPage()) - ($exchanges->perPage()-1)) ; @endphp
                            @foreach ($exchanges as $exchange)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $rank }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">

                                            <div class="flex-shrink-0 h-10 w-10">
                                                <a href="{{ route('exchanges.index') }}/{{ $exchange->slug }}">
                                                    <img class="h-10 w-10 rounded-full" src="{{ $exchange->image }}"
                                                        alt="{{ $exchange->name }}">
                                                </a>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a
                                                        href="{{ route('exchanges.index') }}/{{ $exchange->slug }}">
                                                        {{ $exchange->name }}
                                                    </a>
                                                </div>
                                                <a href="{{ route('exchanges.index') }}/{{ $exchange->slug }}">
                                                    <div class="text-sm text-gray-500">{{ $exchange->country }}</div>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $exchange->meta->trade_volume_24h_btc }}
                                        </div>
                                        <div class="text-sm text-gray-500">Optimization</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">


                                        @if ($exchange->meta->trust_score > 6)
                                            @empty($exchange->meta->trust_score)
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    ?</span>
                                            @else
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    {{ $exchange->meta->trust_score }} </span>
                                            @endempty
                                        @elseif ($exchange->meta->trust_score > 4)
                                            @empty($exchange->meta->trust_score)
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    ?</span>
                                            @else
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    {{ $exchange->meta->trust_score }} </span>
                                            @endempty
                                        @else
                                            @empty($exchange->meta->trust_score)
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    ?</span>
                                            @else
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    {{ $exchange->meta->trust_score }} </span>
                                            @endempty
                                        @endif

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>
                                @php $rank++; @endphp
                            @endforeach

                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    {{-- pagenation --}}
    {{ $exchanges->links() }}
@endif


@endsection

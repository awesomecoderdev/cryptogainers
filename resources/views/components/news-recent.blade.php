@props(['recent', 'request'])

<div {!! $attributes->merge(['class' => 'relative p-4 xl:w-1/4 lg:w-1/3 md:w-1/2']) !!}>
    <div
        class="h-full border bg-white dark:bg-slate-800 border-primary-200/70 dark:border-slate-700/10 border-opacity-60 rounded-lg overflow-hidden">
        <div class="relative overflow-hidden ">
            <a href="{{ route('news.index') }}/{{ $recent->slug }}">
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
                        <a href="{{ route('news.index', "?tag=$tag") }}"
                            class="{{ isset($request['tag']) && $request['tag'] == $tag? 'bg-primary-100 dark:bg-primary-600/20 border-primary-200/70 dark:border-primary-500/25 ': '' }} rounded-xl font-medium mr-2 border transition-all hover:bg-primary-100 dark:hover:bg-primary-600/10 hover:text-gray-600 border-primary-100 dark:border-primary-500/25 px-2 my-2 text-gray-500 dark:text-gray-300">
                            {{ $tag }}
                        </a>
                    @endif
                    @php $tag_counter++; @endphp
                @endforeach
            </div>
            <a href="{{ route('news.index', $recent->slug) }}">
                <h1 class="title-font text-lg font-bold text-gray-800 dark:text-gray-100 mb-2">
                    {{ $recent->title }}</h1>
            </a>

            <p class="text-gray-500 dark:text-gray-400 lg:max-w-md h-20">
                {{ substr(strip_tags($recent->content), 0, 50) }}...
            </p>
            <div class=" flex items-center justify-between flex-wrap">
                <span
                    class="font-medium text-xs text-gray-400">{{ date('d F, Y', strtotime($recent->created_at)) }}</span>

                <a href="{{ route('news.index', $recent->slug) }}"
                    class=" text-primary-500 font-medium inline-flex items-center md:mb-2 lg:mb-0">Read
                    More
                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

        </div>
    </div>
</div>

@props(['post', 'request'])
<article id="news-{{ $post->id }}"
    class=" mb-5 rounded-md bg-white dark:bg-slate-800 border border-gray-200 dark:border-gray-800 ">
    <div class="lg:px-4 md:px-4 px-0 lg:py-4 md:py-4 mx-auto">
        <div class=" lg:flex md:flex">

            <div class="lg:w-1/2 md:w-1/2 relative overflow-hidden rounded-lg ">
                <a href="{{ route('news.index', $post->slug) }}">
                    <div class="ease-in-out duration-300 flex transform transition-all hover:scale-110 rounded-lg items-center justify-center w-full  md:h-60 xl:h-60 lg:h-60 h-60 xl:justify-start bg-cover bg-no-repeat bg-center"
                        style="background-image: url('{{ $post->thumbnail }}')">
                    </div>
                </a>
            </div>
            <div
                class="mt-2  lg:mx-2 md:pl-4 pl-0 md:mt-0 md:w-1/2 md:mx-0 mx-2 lg:mt-0 lg:w-1/2 flex flex-col justify-between">
                <a href="{{ route('news.index', $post->slug) }}">
                    <h1 class="lg:text-2xl md:text-2xl text-xl font-bold text-gray-800 dark:text-gray-100">
                        {{ $post->title }}
                    </h1>
                </a>
                <p class="mt-2 text-gray-500 dark:text-gray-400 lg:max-w-md">
                    {{ substr(strip_tags($post->content), 0, 100) }}...
                </p>
                <div class="relative my-2 flex">
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('news.index', "?tag=$tag") }}"
                            class="{{ isset($request['tag']) && $request['tag'] == $tag? 'bg-primary-100 dark:bg-primary-600/20 border-primary-200/70 dark:border-primary-500/25 ': '' }} rounded-xl font-medium mr-2 border transition-all hover:bg-primary-100 dark:hover:bg-primary-600/10 hover:text-gray-600 border-primary-100 dark:border-primary-500/25 px-2 my-2 text-gray-500 dark:text-gray-300">
                            {{ $tag }}
                        </a>
                    @endforeach
                </div>
                <div class="relative flex items-center justify-between md:mb-0 mb-2 ">
                    <span
                        class="font-medium text-sm text-gray-400">{{ date('d F, Y', strtotime($post->created_at)) }}</span>
                    <a class="rounded-xl font-medium mr-2 border transition-all bg-primary-50 dark:bg-slate-800 hover:bg-primary-100 dark:hover:bg-primary-500/20 hover:text-gray-600 dark:hover:text-gray-300 border-primary-300 px-5 py-2 text-gray-500"
                        href="{{ route('news.index', $post->slug) }}">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</article>

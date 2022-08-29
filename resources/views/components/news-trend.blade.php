@props(['trend'])

<a href="{{ route('news.index', $trend->slug) }}">
    <article class="relative flex my-4 w-full " id="trending-{{ $trend->id }}">
        <div class="flex">
            <div class="h-20 min-h-fit w-24 bg-cover bg-no-repeat bg-center rounded-md bg-blend-soft-light"
                style="background-image:url('{{ $trend->thumbnail }}');">
            </div>
            <div class="relative pl-3 w-auto ">
                <h1 class="text-md font-bold text-gray-800 dark:text-gray-50">
                    {{ $trend->title }} {{ $trend->title }}
                </h1>
                <span
                    class="font-medium text-xs text-gray-400">{{ date('d F, Y', strtotime($trend->created_at)) }}</span>
            </div>
        </div>

    </article>
</a>

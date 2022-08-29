@if (Route::current() != null)
    @if (Route::current()->getName() == 'news.index')
        @include('nav.news')
    @elseif (Route::current()->getName() == 'coins.index')
        @include('nav.coins')
    @elseif (Route::current()->getName() == 'exchanges.index')
        @include('nav.exchanges')
    @else
        @include('nav.index')
    @endif
@else
    @include('nav.index')
@endif

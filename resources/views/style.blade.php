<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('site.webmanifest') }}">
<link href="{{ asset('css/app.css?var=') }}{{ md5(filemtime(public_path('css/app.css'))) }}" rel="stylesheet">
<link href="{{ asset('css/swiper-bundle.min.css?var=') }}{{ md5(filemtime(public_path('css/app.css'))) }}"
    rel="stylesheet">
<script src="{{ asset('js/main.js?var=') }}{{ md5(filemtime(public_path('js/main.js'))) }}"></script>
{{-- <script src="{{ asset('js/main.js?var=') }}{{ md5(filemtime(public_path('js/main.js'))) }}"></script> --}}
<script src="{{ asset('js/jquery.min.js') }}"></script>
{{-- jQuery --}}

@if (Route::current() != null)
    @if (in_array(Route::current()->getName(), ['news', 'exchanges']))
        <script src="{{ asset('js/turbolinks.js') }}"></script> {{-- turbolinks --}}
    @endif
    @if (in_array(Route::current()->getName(), ['coins.show']))
        <script src="{{ asset('js/charts.js') }}"></script> {{-- charts --}}
    @endif
@endif

{{-- app.js --}}
<script src="{{ asset('js/app.js?var=') }}{{ md5(filemtime(public_path('js/app.js'))) }}"></script>

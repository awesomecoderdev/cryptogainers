{{-- start:header --}}
@include('header')
{{-- start:header --}}

<main id="main">
    {{-- content --}}
    @yield("hero")
    {{-- content --}}
    <div class="container">
        {{-- content --}}
        @yield("content")
        {{-- content --}}
    </div>
</main>

{{-- start:footer --}}
@include('footer')
{{-- start:footer --}}

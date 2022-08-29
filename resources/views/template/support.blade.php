{{-- start:header --}}
@include('header')
{{-- start:header --}}
{{-- start:body --}}
<main id="main-content" class="w-full ">
    <div class="container my-6">
        {{-- content --}}
        @yield("content")
        {{-- content --}}
    </div>
</main>
{{-- end:body --}}
{{-- start:footer --}}
@include('footer')
{{-- start:footer --}}

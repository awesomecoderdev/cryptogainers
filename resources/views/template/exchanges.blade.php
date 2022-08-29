{{-- start:header --}}
@include('header')
{{-- start:header --}}
{{-- start:body --}}
<main id="main-content" class="container w-full mb-12">
    <div id="exchanges" class="p-5 my-6 w-full">
        {{-- content --}}
        @yield("content")
        {{-- content --}}
    </div>
</main>
{{-- end:body --}}
{{-- start:footer --}}
@include('footer')
{{-- start:footer --}}

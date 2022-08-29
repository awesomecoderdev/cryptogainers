{{-- start:header --}}
@include('header')
{{-- start:header --}}
{{-- start:body --}}
<main id="main-content" class="w-full ">
    <div class="container my-6">
        <div class="lg:flex-row flex-col flex w-full justify-between ">
            {{-- content:start --}}
            <div id="articles" class="flex-auto lg:px-5 px-3 ">
                {{-- content --}}
                @yield("content")
                {{-- content --}}
            </div>
            {{-- content:end --}}
            {{-- sidebar:start --}}
            <div id="sidebar" class="lg:w-4/12 w-full lg:mx-5 lg:mt-0 mt-8 mx-0 lg:px-0 px-3">
                <div class="flex flex-col justify-between overflow-y-auto sticky max-h-(screen-18) top-6">
                    {{-- sidebar --}}
                    @yield("sidebar")
                    {{-- sidebar --}}
                </div>
            </div>
            {{-- sidebar:end --}}
        </div>
    </div>
</main>
{{-- end:body --}}
{{-- start:footer --}}
@include('footer')
{{-- start:footer --}}

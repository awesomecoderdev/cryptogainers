@extends("dashboard.admin.template.index")

@section('title', 'Add News | CryptoGainers')

@php
$errorClasses = 'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-red-100 dark:border-red-400';

$errorLebel = 'text-red-600 dark:text-red-500';
$lebel = 'text-gray-500 dark:text-gray-400 ';

$errorPeer = 'peer-focus:text-red-600 peer-focus:dark:text-red-500';
$peer = 'peer-focus:text-primary-600 peer-focus:dark:text-primary-500';

$errorInput = 'border-red-300 dark:border-red-600 dark:focus:border-red-500 focus:border-red-600';
$input = 'border-gray-300 dark:border-gray-600 dark:focus:border-primary-500 focus:border-primary-600';
@endphp
@section('content')

    <form action="{{ route('admin.news.store') }}" method="POST" autocomplete="off">
        @csrf
        {{-- title --}}
        <div class="relative z-0 mb-6 w-full group">
            <input type="text" name="title" id="title"
                class="@error('title') {{ $errorInput }} @else {{ $input }} @enderror  block py-2.5 px-0 w-full text-sm  text-gray-900 dark:text-white bg-transparent border-0 border-b-2  appearance-none focus:outline-none focus:ring-0 peer"
                placeholder=" " @error('title') value="{{ old('title') }}" @else value="{{ old('title') }}" @enderror>
            <label for="title"
                class="absolute text-sm  @error('title') {{ $errorLebel }} {{ $errorPeer }} @else {{ $lebel }} {{ $peer }} @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary-600 peer-focus:dark:text-primary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
            @error('title')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!
                    </span>{{ $message }}</p>
            @enderror
        </div>
        {{-- slug --}}
        <div class="relative z-0 mb-6 w-full group">
            <input type="text" name="slug" id="slug"
                class="@error('slug') {{ $errorInput }} @else {{ $input }} @enderror  block py-2.5 px-0 w-full text-sm  text-gray-900 dark:text-white bg-transparent border-0 border-b-2  appearance-none focus:outline-none focus:ring-0 peer"
                placeholder=" " @error('slug') value="{{ old('slug') }}"@else value="{{ old('slug') }}" @enderror>
            <label for="slug"
                class="@error('slug') {{ $errorLebel }} {{ $errorPeer }} @else {{ $lebel }} {{ $peer }} @enderror absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Slug</label>
            @error('slug')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!
                    </span>{{ $message }}</p>
            @enderror
        </div>
        {{-- descritption --}}
        <div class="relative z-0 mb-6 w-full group">
            <input type="text" name="description" id="description"
                class="@error('description') {{ $errorInput }} @else {{ $input }} @enderror  block py-2.5 px-0 w-full text-sm  text-gray-900 dark:text-white bg-transparent border-0 border-b-2  appearance-none focus:outline-none focus:ring-0 peer"
                placeholder=" "
                @error('description') value="{{ old('description') }}" @else value="{{ old('description') }}" @enderror>
            <label for="description"
                class="@error('description') {{ $errorLebel }} {{ $errorPeer }} @else {{ $lebel }} {{ $peer }} @enderror absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
            @error('description')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!
                    </span>{{ $message }}</p>
            @enderror
        </div>
        {{-- keywords --}}
        <div class="relative z-0 mb-6 w-full group">
            <input type="text" name="keywords" id="keywords"
                class="@error('keywords') {{ $errorInput }} @else {{ $input }} @enderror  block py-2.5 px-0 w-full text-sm  text-gray-900 dark:text-white bg-transparent border-0 border-b-2  appearance-none focus:outline-none focus:ring-0 peer"
                placeholder=" "
                @error('keywords') value="{{ old('keywords') }}" @else value="{{ old('keywords') }}" @enderror>
            <label for="keywords"
                class="@error('keywords') {{ $errorLebel }} {{ $errorPeer }} @else {{ $lebel }} {{ $peer }} @enderror absolute text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Keywords
            </label>
            @error('keywords')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!
                    </span>{{ $message }}</p>
            @enderror
        </div>

        {{-- content --}}
        <div class="relative z-0 mb-6 w-full group">
            <textarea class="opacity-0 @error('content') {{ $errorInput }} @else {{ $input }} @enderror  block py-2.5 px-0 w-full text-sm  text-gray-900 dark:text-white bg-transparent border-0 border-b-2  appearance-none focus:outline-none focus:ring-0 peer"
                name="content" id="contents" cols="30" rows="100">{!! old('content') !!}</textarea>
            @error('content')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!
                    </span>{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="bg-primary-500 hover:bg-primary-600 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white">
            Save changes
        </button>
    </form>
    <script>
        $(document).ready(function() {
            const ajaxUrl = "{{ route('admin.news.slug') }}/?_token={{ csrf_token() }}";
            $(document).on("keyup", "#title", function() {
                $.ajax({
                    type: "POST",
                    url: ajaxUrl,
                    data: {
                        title: $(this).val()
                    },
                    success: function(response) {
                        $("#slug").val(response.slug);
                    }
                });
            });
        });

        const upload_url = "{{ route('admin.news.ckeditor.upload') . '?_token=' . csrf_token() }}";
        ClassicEditor.create(document.querySelector('#contents'), {
            ckfinder: {
                uploadUrl: upload_url
            },
        }).catch(error => {
            console.error(error);
        });
    </script>

@endsection

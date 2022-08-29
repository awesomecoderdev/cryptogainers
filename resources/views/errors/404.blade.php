@extends('errors.minimal')

@if (Route::current() != null)
    @if (Route::current()->getName() == 'news')
        @section('title', __('Page Not Found : CryptoGainers News'))
    @elseif (Route::current()->getName() == 'coins')
        @section('title', __('Page Not Found : CryptoGainers Coins'))
    @elseif (Route::current()->getName() == 'exchanges')
        @section('title', __('Page Not Found : CryptoGainers Exchanges'))
    @else
        @section('title', __('Page Not Found : CryptoGainers'))
    @endif
@else
    @section('title', __('Page Not Found : CryptoGainers'))
@endif

@section('code', '404')
@section('message', __('Page Not Found'))

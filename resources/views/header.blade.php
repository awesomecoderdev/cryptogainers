<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('dark') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{ 'dark': darkMode }">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield("meta")
    <link rel="canonical" href="{{ route('news.index') }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta name="twitter:site" content="@CryptoGainersIO" />
    <meta property="article:publisher" content="https://facebook.com/CryptoGainersIO" />
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>@yield("title")</title>
    @include('style')
</head>

<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-900">
    {{-- start:nav --}}
    @include('nav')
    {{-- end:nav --}}

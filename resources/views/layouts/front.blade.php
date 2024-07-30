<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Panart') }}</title>
    @include('front.common.head') 
	<!-- <link href="https://daneden.github.io/animate.css/animate.min.css" rel="styleSheet"/> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
</head>

<body class="@if(Request::url()!=='/')inside_body @endif">
    <div class="main @if(!Request::is('/'))detail @endif">
        @include('front.common.header') 
        @yield('content')

        @if(Request::is('/'))

        @else 
        @include('front.common.footer') 
        @endif
    </div>
</body>
</html>
<!doctype html>
<html lang="en">
    <head>
        <!-- Meta Head -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="WbeSite Description">
        <meta name="keywords" content="droosonline, admin, portfolio, laravel, dashboard template, bootstrap, Admin LTE">
        <meta name="author" content="HeshamAdel">
        @stack('meta_og')
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Title -->
        <title>
            @yield('title', 'pageTitle') |
            @foreach($settings as $setting)
                @if(!empty($setting->name))
                    {{ $setting->name }}
                @else
                    {{ config('app.name', 'laravel') }}
                @endif
            @endforeach
        </title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('front-end/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end/css/classy-nav.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('front-end/css/style.css') }}">
    </head>
    <body>
        <!-- Preloader -->
        {{-- <div class="preloader d-flex align-items-center justify-content-center">
            <div class="lds-ellipsis">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div> --}}

        <!-- ##### Header Area Start ##### -->
        <header class="header-area">
            @include('layouts.front-end.topheader')
            @include('layouts.front-end.navbar')
        </header>

        <!-- Start Content -->
        @yield('content')

        <!-- ##### Footer Area Start ##### -->
        @include('layouts.front-end.footer')
        <!-- script File  -->
        <script src="{{ asset('front-end/js/jquery/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('front-end/js/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('front-end/js/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('front-end/js/plugins/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('front-end/js/plugins/plugins.js') }}"></script>
        <script src="{{ asset('front-end/js/active.js') }}"></script>
    </body>
</html>

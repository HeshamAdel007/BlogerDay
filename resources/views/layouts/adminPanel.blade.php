<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Head -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="WbeSite Description">
        <meta name="keywords" content="droosonline, admin, portfolio, laravel, dashboard template, bootstrap, Admin LTE">
        <meta name="author" content="HeshamAdel">
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
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- FontAwesome -->
        <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('back-end/dist/css/adminlte.min.css') }}">
        @stack('styles')
        @notifyCss
        <style type="text/css">
            .connectify-alert {
                top: 5rem !important;
        }
</style>
    </head>
        <body class="hold-transition sidebar-mini">
            @include('notify::messages')
            <div class="wrapper">
                <!-- Start NavBar -->
                @include('layouts.back-end.navbar')
                <!-- Start SideBar -->
                @include('layouts.back-end.sidebar')
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper text-capitalize">
                    <!-- /.content -->
                    @yield('content')
                </div>
            <!-- /.content-wrapper -->
            </div>
            <!-- ./wrapper -->
            <script src="{{ asset('js/app.js') }}"></script>

            @notifyJs
            <!-- AdminLTE App -->
            <script src="{{ asset('back-end/dist/js/adminlte.min.js') }}"></script>
            @stack('scripts')
        </body>
</html>


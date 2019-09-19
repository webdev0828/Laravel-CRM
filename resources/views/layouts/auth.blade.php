<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/animation/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">



</head>
<body>

    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <main class="py-4">
                @yield('content')
            </main>

        </div>
    </div>

    <!-- Required Js -->
    <script src="{{ asset('js/vendor-all.min.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/pcoded.min.js')}}"></script>

</body>
</html>

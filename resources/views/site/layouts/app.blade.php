<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/site/scss/app.scss', 'resources/site/js/app.js'])
    {{-- <script src="https://www.google.com/recaptcha/api.js?render=6LcZCrkbAAAAAM2jsXfhjwi1CjR2lMr2PXUgHiL6"></script> --}}
    {!!  GoogleReCaptchaV3::init() !!}
</head>

<body id="app">

    <div class="image-container top-left-image">
        <img src="{{ asset('storage/site/img/background-left-top.jpg') }}">
    </div>

    <div class="image-container bottom-right-image">
        <img src="{{ asset('storage/site/img/background-right-bottom.jpg') }}">
    </div>

    @include('site.partials.navigation')

    <!-- ======= Header ======= -->
    <header id="header" class="header">
        @include('site.partials.header')
    </header>
    <!-- End Header -->

    <!-- ======= Main ======= -->
    <main id="main" class="main mb-5">
        @yield('content')
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('site.partials.footer')
    <!-- End Footer -->
</body>

</html>

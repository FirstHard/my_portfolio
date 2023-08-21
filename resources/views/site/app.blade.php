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
    {{-- {!! GoogleReCaptchaV3::init() !!} --}}
</head>

<body>
    <div class="image-container top-left-image">
        <img src="{{ asset('storage/site/img/background-left-top.jpg') }}">
    </div>

    <div class="image-container bottom-right-image">
        <img src="{{ asset('storage/site/img/background-right-bottom.jpg') }}">
    </div>
    <div id="app">
        <contact-form :sitekey="{{ json_encode(config('services.google_recaptcha.site_key')) }}"></contact-form>
    </div>
</body>

</html>

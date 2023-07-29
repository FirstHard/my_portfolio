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

    <link href="{{ asset('/img/admin/favicon.png') }}" rel="icon">
    <link href="{{ asset('/img/admin/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/admin/assets/scss/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/admin/assets/vendor/apexcharts/apexcharts.min.js', 'resources/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', 'resources/admin/assets/vendor/chart.js/chart.umd.js', 'resources/admin/assets/vendor/echarts/echarts.min.js', 'resources/admin/assets/vendor/quill/quill.min.js', 'resources/admin/assets/vendor/simple-datatables/simple-datatables.js', 'resources/admin/assets/vendor/tinymce/tinymce.min.js', 'resources/admin/assets/vendor/php-email-form/validate.js', 'resources/admin/assets/js/main.js'])

    <!-- =======================================================
    * Template: NiceAdmin
    * Original Template Name: NiceAdmin by BootstrapMade.com
    * Customized Template: NiceAdmin by Volodymyr Buynov
    * Updated: July 28 2023 with Bootstrap v5.3.0
    * Original Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        @yield('header')
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        @yield('sidebar')
    </aside>
    <!-- End Sidebar-->

    <!-- ======= Main ======= -->
    <main id="main" class="main">
        <div class="content">
            @yield('content')
        </div>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        @yield('footer')
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
</body>

</html>

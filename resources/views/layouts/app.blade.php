<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('app.name')) @yield('title_postfix', '')</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    <link rel="stylesheet" href="sass/main.css">
    <link rel="stylesheet" href="sass/homepage.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <title>Evolved- Homepage</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('common.favicons')

    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}">

    @stack('css')

</head>
<body class="hold-transition background-page @yield('body_class')">
<div id="app">
    {{-- @include('common.staging-indication') --}}
    @include('common.navbar')
    @include('common.alerts')
    <main class="py-5 mb-5">
        <div id="main-content">
            @yield('content')
        </div>
    </main>
    @include('common.footer')
</div>
@include('common.footer-scripts')
@stack('modals')
</body>
</html>


<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title_prefix', config('app.name')) @yield('title_postfix', '')</title>

    @include('common.favicons')
    
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('dist/css/login-page.css') }}">

    @stack('css')

</head>
<body class="hold-transition background-page @yield('body_class')">
<div id="app">
    <main >
        <div id="main-content">
            @yield('content')
        </div>
    </main>

</div>
@include('common.footer-scripts')
</body>
</html>


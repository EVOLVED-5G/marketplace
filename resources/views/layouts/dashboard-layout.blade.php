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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('dist/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@voerro/vue-tagsinput@2.7.0/dist/style.css">
    <link rel="stylesheet" href="{{ mix('dist/css/dashboard.css') }}">
    @stack('css')
    <style>
        .loading-content {
            position: fixed;
            top: 0px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            background: rgba(238, 238, 238, 0.5);
            z-index: -1;
        }

        #loader {
            position: fixed;
            width: 100%;
            height: 100vh;
            z-index: 1;
            overflow: visible;
            display: none;
            background: rgba(238, 238, 238, 0.5) url("{{ asset('images/loader.gif') }}") no-repeat center center;
        }
    </style>
</head>

<body class="hold-transition background-page @yield('body_class')">
    <div id="app">
        {{-- @include('common.staging-indication') --}}
        @include('common.navbar')
        @include('common.alerts')
        <div id="loader"></div>

        <div class="dashboard-content">
            <div class="container-fluid content">
                {{-- <div class="row">
                    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto"> --}}
                        <nav class="navbar navbar-expand-md navbar-light bg-light ">
                            <button class="navbar-toggler btn btn-link border-0" type="button" id="sidebar" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon me-5">Dashboard <i class="fas fa-chevron-right"></i></span>
                            </button>
                        </nav>


                        <div class="d-flex wrapper wrapper-navbar-used wrapper-navbar-fixed">
                            @include('common.sidebar')

                            <div class="container-fluid">
                                <!-- content -->
                                <main role="main">
                                    @yield('content')
                                </main>

                            </div>
                        </div>
                    {{-- </div>
                </div> --}}
            </div>
        </div>


        @include('common.footer')
    </div>
    @include('common.footer-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nanobar/0.4.2/nanobar.min.js"></script>

    <script src="{{ mix('dist/js/dashboard.js') }}"></script>
    @stack('modals')
    <<<<<<< HEAD <script src="https://cdnjs.cloudflare.com/ajax/libs/nanobar/0.4.2/nanobar.min.js">
        </script>

        <script src="{{ mix('dist/js/dashboard.js') }}"></script>
        =======
        @stack('scripts')
        >>>>>>> 8946bd07fbc8f74cbef7e15231c329fd84c1c61d
</body>

</html>

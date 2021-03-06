<script>
    window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
    'baseUrl' => url('/'),
    'routes' => collect(\Route::getRoutes())->mapWithKeys(function ($route) {
        return [$route->getName() => $route->uri()];
    }),
]) !!};
</script>
<script src="{{ mix('dist/js/manifest.js') }}"></script> {{-- The Webpack manifest runtime --}}
<script src="{{ mix('dist/js/vendor.js') }}"></script> {{-- Vendor libraries like jQuery, bootstrap --}}
<script src="{{ mix('dist/js/app.js') }}"></script> {{-- our application common code --}}



<script>
    function openNav() {
        $("body").addClass("test");
    }

    function closeNav() {
        $("body").removeClass("test");
        // document.getElementById("mySidenav").style.width = "0";
    }
</script>



@stack('scripts')

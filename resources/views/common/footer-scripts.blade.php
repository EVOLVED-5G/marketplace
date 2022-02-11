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
    let btn = document.querySelector('.mouse-cursor-gradient-tracking');
    btn.addEventListener('mousemove', e => {
        let rect = e.target.getBoundingClientRect();
        let x = e.clientX - rect.left;
        let y = e.clientY - rect.top;
        btn.style.setProperty('--x', x + 'px');
        btn.style.setProperty('--y', y + 'px');
    });
</script>

<script>
    const stepButtons = document.querySelectorAll('.step-button');
    const progress = document.querySelector('#progress');

    Array.from(stepButtons).forEach((button,index) => {
        button.addEventListener('click', () => {
            progress.setAttribute('value', index * 100 /(stepButtons.length - 1) );//there are 3 buttons. 2 spaces.

            stepButtons.forEach((item, secindex)=>{
                if(index > secindex){
                    item.classList.add('done');
                }
                if(index < secindex){
                    item.classList.remove('done');
                }
            })
        })
    })
    </script>




@stack('scripts')

@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ mix('dist/css/netapp-creators.css') }}">
@endpush

@section('content')

<main>
    <section class="main-title d-flex align-items-center u-margin-bottom-big">
        <div class="main-title__content content">
            <div class="main-title__content--text ">
                <h1 class="mb-3">
                    Explore your possibilities
                </h1>
                <p> Find out how to sell or buy your Network Apps in marketplace.</p>
            </div>
            <div class="main-title__content--icon">
                <img class="img-fluid" loading="lazy" src="/img/netapp-creators-title.png" alt="title-image">
            </div>
        </div>
    </section>


    <section class="how-to-sell u-margin-bottom-medium content">
        <div class="how-to-sell__content text-center mb-5 d-flex align-items-center flex-column">
            <img class="img-fluid mb-3" loading="lazy" src="/img/line-icon.png" alt="line-icon">
            <h1>How to sell</h1>
            <p>Use the marketplace to upload your Evolved5G- Network Apps, configure pricing quotes, branding and marketing material. Activate your NetApp and start selling!</p>
        </div>
        <div class="how-to-sell__steps py-5">
            <h3 class="mb-3">Take the steps</h3>
            <ol>
                <li>
                    <p> <span>1</span>Follow the <a href="https://forum.evolved-5g.eu/c/how-to-build/6" target="_blank">documentation</a>  to learn how to start creating your NetApp in the EVOLVED-5G ecosystem. In case or doubt, please ask for support at <a href="https://forum.evolved-5g.eu/" target="_blank">EVOLVED-5G forum</a>.</p>
                </li>
                <li>
                    <p> <span>2</span>Verify your NetApp in a by making use of the
                        <a href="https://evolved5g-cli.readthedocs.io/en/latest/" target="_blank">EVOLVED-5G SDK tools</a>.
                        </p>
                </li>
                <li>
                    <p> <span>3</span>Validate and Certify your NetApp in a real 5G infrastructure.</a>
                    </p>
                </li>
                <li>
                    <p> <span>4</span>Publish your NetApp to the marketplace.</p>

                </li>
                <li>
                    <p> <span>5</span>Configure your pricing quotes and make your NetApp available to anyone.</p>

                </li>
                <li>
                    <p> <span>6</span>Your NetApp is already in the market, ready to be download and use!</p>

                </li>
            </ol>
            <div class="text-center">
                <a href="https://evolved5g-cli.readthedocs.io/en/latest/" class="mouse-cursor-gradient-tracking btn btn--blue mt-5 me-5" target="_blank">Create your NetApp</a>
                <a href="{{ route('welcome-dashboard') }}" class="mouse-cursor-gradient-tracking btn btn--tertiary mt-5">Connect your NetApp to the marketplace</a>
            </div>
        </div>
    </section>


    <div class="section-bck pt-5">

        <section class="buy-a-netapp u-margin-bottom-big content text-center p-5">
            <h1> Buy a NetApp</h1>
            <a href="{{ route('product-catalogue') }}" class="mouse-cursor-gradient-tracking btn btn--tertiary mt-5">Find NetApp</a>

        </section>

        <section class="questions u-margin-bottom-medium content d-flex justify-content-center">

            <div class="questions__box p-5">
                <img class="img-fluid mt-3 mb-3" loading="lazy" src="/img/creators-line.png" alt="line-icon">
                <h1> Do you have questions?</h1>
                <p>Check our community platform and get accurate answers.</p>
                <a href="https://forum.evolved-5g.eu/" target="_blank" class="mouse-cursor-gradient-tracking btn btn--blue mt-5">Find out more</a>
            </div>



        </section>
    </div>

</main>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>

@endpush

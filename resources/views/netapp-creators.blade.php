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
                <p> Find out how to sell or buy your NetApps in marketplace.</p>
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
            <p>Use the marketplace to upload your Evolved5G- netapps, configure pricing quotes, branding and marketing material. Activate your NetApp and start selling!</p>
        </div>
        <div class="how-to-sell__steps p-5">
            <h3 class="mb-3">Take the steps</h3>
            <ol>
                <li>
                    <p> <span>1</span>Use the <a href="http://evolved5g-marketplace-forum.evolved-5g.gr/c/how-to-build/6" target="blank">forum</a> to lean how you can create your netapps</p>
                </li>
                <li>
                    <p> <span>2</span>Validate and Certify your NetApp</p>
                </li>
                <li>
                    <p> <span>3</span>Configure your pricing quotes and connect to the marketplace</a>
                    </p>
                </li>
                <li>
                    <p> <span>4</span>Start Selling!</p>

                </li>
            </ol>
            <div class="text-center">
                <a href="{{ route('welcome-dashboard') }}" class="mouse-cursor-gradient-tracking btn btn--blue mt-5">Create your NetApp</a>
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
                <a href="http://evolved5g-marketplace-forum.evolved-5g.gr/" target="blank" class="mouse-cursor-gradient-tracking btn btn--blue mt-5">Find out more</a>
            </div>



        </section>
    </div>

</main>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>

@endpush

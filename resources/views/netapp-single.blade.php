@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ mix('dist/css/netapp-single.css') }}">
@endpush

@section('content')
    <section>
        <div class="product-info">
            <div class="content d-flex">
                <div class="product-info__title d-flex me-5">
                    <div class="product-info__title--icon me-3">
                        <img loading="lazy" src="/img/product-netapp-icon.png" alt="product-netapp-icon">
                    </div>
                    <div class="product-info__title--name">
                        <h2>NetApp 1</h2>
                        <p>Creator/Organization/Company</p>
                    </div>
                    <div class="product-info__title--save d-flex justify-content-center align-items-center"> <a href="#"><i
                                class="far fa-bookmark"></i></a></div>
                </div>
                <div class="product-info__status d-flex ms-5">
                    <p class="product-info__status--template rounded text-note me-3 p-2">Active</p>
                    <p class="product-info__status--template rounded text-note me-3 p-2">Version 1.1</p>
                    <p class="product-info__status--template rounded text-note me-3 p-2">Certified</p>
                </div>
            </div>
        </div>
        <div class="content ">
            <div class="product-about d-flex flex-wrap">
                <div class="product-about__info p-3 me-3">
                    <h3>About</h3>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                        dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
                        sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                        invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et
                        justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem
                        ipsum dolor sit amet.
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                        dolores et ea rebum. Stet clita kasd gubergren</p>
                </div>

                <div class="product-about__extra-info">
                    <div class="product-about__extra-info--categories mb-3">
                        Categories
                        <div class="tags-categories p-3">
                            <p class="tags-categories__template text-note">Active</p>
                            <p class="tags-categories__template text-note">Version 1.1</p>
                            <p class="tags-categories__template text-note">Certified</p>
                        </div>
                    </div>
                    <div class="product-about__extra-info--support d-flex justify-content-center align-items-center flex-column">
                        <p>If you have any question you can join<br> our community for support</p>
                        <a href="{{ route('support') }}" class="btn btn--primary">Support</a>


                    </div>
                </div>
            </div>
            <div class="product-tutorials">
                <h3>Tutorials</h3>
            </div>
            <div class="product-pricing">
                <h3>Pricing</h3>
            </div>
        </div>

    </section>

@endsection
@push('scripts')

@endpush

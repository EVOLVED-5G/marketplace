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
                                class="far fa-bookmark"></i></a> <span class="tooltiptext"> You have to login/register to
                            save item</span></div>

                </div>
                <div class="product-info__status d-flex ms-5">
                    <p class="product-info__status--template rounded text-note me-3 p-2">Active</p>
                    <p class="product-info__status--template rounded text-note me-3 p-2">Version 1.1</p>
                    <p class="product-info__status--template rounded text-note me-3 p-2">Certified</p>
                </div>
            </div>
        </div>
        <div class="content ">
            <div class="product-about d-flex flex-wrap mb-5">
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
                            <p class="tags-categories__template text-note ">StandAlone</p>
                            <p class="tags-categories__template text-note "> Interaction of Employees and Machines</p>
                            <p class="tags-categories__template text-note ">Other</p>
                        </div>
                    </div>
                    <div
                        class="product-about__extra-info--support d-flex justify-content-center align-items-center flex-column">
                        <p>If you have any question you can join<br> our community for support</p>
                        <a href="{{ route('support') }}" class="btn btn--primary">Support</a>


                    </div>
                </div>
            </div>
            <div class="product-tutorials mb-5">
                <div class="section-title">
                    <a data-bs-toggle="collapse" href="javascript:void(0)" data-bs-target="#tutorials" role="button"
                        aria-expanded="false" aria-controls="tutorials" class="collapsed">
                        <h3>Tutorials<i class="fas fa-long-arrow-alt-right ms-5" aria-hidden="true"></i><i
                                class="fas fa-long-arrow-alt-left ms-5" aria-hidden="true"></i></h3>
                    </a>
                </div>

                <div class="collapse content p-5" id="tutorials">
                    <h2>How to use it</h2>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                        labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                        et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                        labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                        et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                    </p>
                    <h3>Subject 1</h3>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                        labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                        et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                    </p>
                    <h3>Subject 2</h3>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                        labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                </div>

            </div>
            <div class="product-pricing mb-5">
                <div class="section-title">
                    <a data-bs-toggle="collapse" href="javascript:void(0)" data-bs-target="#pricing" role="button"
                        aria-expanded="false" aria-controls="pricing" class="collapsed">
                        <h3>Pricing<i class="fas fa-long-arrow-alt-right ms-5" aria-hidden="true"></i><i
                                class="fas fa-long-arrow-alt-left ms-5" aria-hidden="true"></i></h3>
                    </a>
                </div>

                <div class="collapse content p-5" id="pricing">
                    <div id="pay-as-you-go">
                        <h3>Pay as you go</h3>
                        <p>Pay depending on the usage</p>

                        <div class="calls-choices mt-5">
                            <div class="container mb-5" style="max-width: 730px">
                                <div class="row gx-3 mb-3">
                                    <div class="col text-center ps-0">
                                        <div class="p-3 border bg-light">
                                            <h4 class="mb-4">For calls made to /endpoint-1</h4>
                                            <div class="row row-calls mb-2 ms-2 me-2 p-2">
                                                <div class="col col-calls">
                                                    <h4 class="mb-0">0-500</h4> <span>calls</span>
                                                </div>
                                                <div class="col">
                                                    <h4 class="mb-0">0€</h4>
                                                    <span> (no cost)</span>
                                                </div>
                                            </div>

                                            <div class="row row-calls mb-2 ms-2 me-2 p-2">
                                                <div class="col col-calls">
                                                    <h4 class="mb-0">500- 1000</h4><span>calls</span>
                                                </div>
                                                <div class="col">
                                                    <h4 class="mb-0">0.020 €</h4>
                                                    <span> /call</span>
                                                </div>
                                            </div>

                                            <div class="row row-calls ms-2 me-2 p-2">
                                                <div class="col col-calls">
                                                    <h4 class="mb-0">1000+</h4> <span>calls</span>
                                                </div>
                                                <div class="col">
                                                    <h4 class="mb-0">0.015 €</h4>
                                                    <span> /call</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col text-center pe-0">
                                        <div class="p-3 border bg-light">
                                            <h4 class="mb-4">For calls made to /endpoint-2</h4>
                                            <h2>0.15 € <br>
                                                <span> /call</span>
                                            </h2>
                                        </div>

                                    </div>
                                </div>
                                <div class="row ">
                                    <a href="#" class="btn btn--primary">Purchase</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="once-off">
                        <h3>Once-off</h3>
                        <p>Purchase and get unlimited access to the net-app's functionality</p>

                        <div class="calls-choices mt-5">
                            <div class="container mb-5">
                                <div class="text-center px-0 mb-3">
                                    <div class="p-3 border bg-light">
                                        <h4 class="mb-4">Once-off</h4>
                                        <h2>300 €</h2>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Button trigger modal -->
                                    <a href="#" class="btn btn--primary" data-bs-toggle="modal"
                                        data-bs-target="#purchase">Purchase</a>



                                    <!-- Modal -->
                                    <div class="modal fade" id="purchase" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title d-flex" id="exampleModalLabel">
                                                        <img loading="lazy" src="/img/success.modal.png"
                                                            alt="success.modal" />
                                                    </h5>
                                                </div>
                                                <div class="modal-body">
                                                    <h1>Your purchase was successful!</h1>
                                                    <p>The item named "<b>NetApp 1</b>" was added to your dashboard. You will find
                                                        details to your e-mail such as useful links of your purchase:</p>

                                                    <div class="row mb-5 mt-5">

                                                        <ul class="text-details text-start ">Links

                                                            <li class="mt-1">  <a href="#">Blockchain confirmation   </a></li>
                                                            <li><a href="#">Blockchain confirmation 2</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn--tertiary">OK</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </section>
@endsection
@push('scripts')
@endpush

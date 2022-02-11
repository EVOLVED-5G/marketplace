@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ mix('dist/css/product-catalogue.css') }}">
@endpush

@section('content')
    <section class="product-title d-flex align-items-center justify-content-center">
        <h1>Product catalogue</h1>

    </section>

    <div class="product-content">

        <div class="content d-flex">

            <section class="main-sidebar">
                <div class="filters-list">

                    <h4>Filters</h4>

                    <div class="form me-4"> <i class="fa fa-search"></i> <input type="text"
                            class="form-control form-input mt-3 mb-4" placeholder="Search"> </div>

                    <div class="filter-group mb-5">
                        <div class="filter-group-title">
                            <p>Categories</p>
                        </div>

                        <ul>
                            <li><input class="form-check-input me-2"
                                type="checkbox"><label class="form-check-label">Artificial intelligence</label></li>
                            <li><input class="form-check-input me-2" type="checkbox"><label class="form-check-label">Cyber
                                    security & cryptography</label></li>
                            <li><input class="form-check-input me-2"
                                type="checkbox"><label class="form-check-label">Identity and verification</label></li>
                            <li><input class="form-check-input me-2"
                                type="checkbox"><label class="form-check-label">Messaging services</label></li>
                            <li><input class="form-check-input me-2" type="checkbox"><label class="form-check-label">Mobile
                                    carrier lending and advances</label></li>
                            <li><input class="form-check-input me-2" type="checkbox"><label class="form-check-label">Mobile
                                    carrier subscriptions</label></li>
                        </ul>

                    </div>

                    {{-- <div class="filter-group mb-5">
                        <div class="filter-group-title">
                            <p>Categories</p>
                        </div>
                        <input type="text" class="form-control form-input mt-3 mb-4" placeholder="Type">

                        <div class="sample p-1">
                            <span class="p-2">Sample 1</span> <input class="ms-2" type="reset" value="X">

                        </div>
                    </div> --}}


                    <div class="filter-group mb-5">
                        <div class="filter-group-title">
                            <p>Categories</p>
                        </div>
                        <ul>
                            <li><input class="form-check-input me-2" type="checkbox"><label class="form-check-label">Sample
                                    1</label></li>
                            <li><input class="form-check-input me-2" type="checkbox"><label class="form-check-label">Sample
                                    2</label></li>
                            <li><input class="form-check-input me-2" type="checkbox"><label class="form-check-label">Sample
                                    3</label></li>
                        </ul>
                    </div>



                    {{-- <button type="button" class="btn btn--tertiary">Search</button> --}}
                </div>

            </section>

            <section class="products">



                <p>Results: 40</p>
                <div class="product-list d-flex flex-wrap ">
                    <div class="product-list__card mb-4">
                        <div class="product-list__card--name d-flex">
                            <img class="me-2" loading="lazy" src="/img/icon-codepen.png" alt="icon-codepen">
                            <div>
                                <h5>Name</h5>
                                <p>Creator</p>
                            </div>
                            <a href="#"><i class="far fa-bookmark"></i></a>

                        </div>
                        <div class="product-list__card--content">
                            <p class="text-note mb-5"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                            <div class="tags">
                                <a href="#" class="text-details">Tag</a>
                                <a href="#" class="text-details">Tag</a>
                                <a href="#" class="text-details">Tag</a>
                            </div>

                        </div>

                    </div>

                    <div class="product-list__card mb-4">
                        <div class="product-list__card--name d-flex">
                            <img class="me-2" loading="lazy" src="/img/icon-codepen.png" alt="icon-codepen">
                            <div>
                                <h5>Name</h5>
                                <p>Creator</p>
                            </div>
                            <a href="#"><i class="far fa-bookmark"></i></a>

                        </div>
                        <div class="product-list__card--content">
                            <p class="text-note mb-5"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                            <div class="tags">
                                <a href="#" class="text-details">Tag</a>
                                <a href="#" class="text-details">Tag</a>
                                <a href="#" class="text-details">Tag</a>
                            </div>

                        </div>

                    </div>

                    <div class="product-list__card mb-4">
                        <div class="product-list__card--name d-flex">
                            <img class="me-2" loading="lazy" src="/img/icon-codepen.png" alt="icon-codepen">
                            <div>
                                <h5>Name</h5>
                                <p>Creator</p>
                            </div>
                            <a href="#"><i class="far fa-bookmark"></i></a>

                        </div>
                        <div class="product-list__card--content">
                            <p class="text-note mb-5"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                            <div class="tags">
                                <a href="#" class="text-details">Tag</a>
                                <a href="#" class="text-details">Tag</a>
                                <a href="#" class="text-details">Tag</a>
                            </div>

                        </div>

                    </div>
                    <div class="product-list__card mb-4">
                        <div class="product-list__card--name d-flex">
                            <img class="me-2" loading="lazy" src="/img/icon-codepen.png" alt="icon-codepen">
                            <div>
                                <h5>Name</h5>
                                <p>Creator</p>
                            </div>
                            <a href="#"><i class="far fa-bookmark"></i></a>

                        </div>
                        <div class="product-list__card--content">
                            <p class="text-note mb-5"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                            <div class="tags">
                                <a href="#" class="text-details">Tag</a>
                                <a href="#" class="text-details">Tag</a>
                                <a href="#" class="text-details">Tag</a>
                            </div>

                        </div>

                    </div>
                    <div class="product-list__card mb-4">
                        <div class="product-list__card--name d-flex">
                            <img class="me-2" loading="lazy" src="/img/icon-codepen.png" alt="icon-codepen">
                            <div>
                                <h5>Name</h5>
                                <p>Creator</p>
                            </div>
                            <a href="#"><i class="far fa-bookmark"></i></a>

                        </div>
                        <div class="product-list__card--content">
                            <p class="text-note mb-5"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                            <div class="tags">
                                <a href="#" class="text-details">Tag</a>
                                <a href="#" class="text-details">Tag</a>
                                <a href="#" class="text-details">Tag</a>
                            </div>

                        </div>

                    </div>
                    <div class="product-list__card mb-4">
                        <div class="product-list__card--name d-flex">
                            <img class="me-2" loading="lazy" src="/img/icon-codepen.png" alt="icon-codepen">
                            <div>
                                <h5>Name</h5>
                                <p>Creator</p>
                            </div>
                            <a href="#"><i class="far fa-bookmark"></i></a>

                        </div>
                        <div class="product-list__card--content">
                            <p class="text-note mb-5"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                            <div class="tags">
                                <a href="#" class="text-details">Tag</a>
                                <a href="#" class="text-details">Tag</a>
                                <a href="#" class="text-details">Tag</a>
                            </div>

                        </div>

                    </div>
                    <div class="product-list__card mb-4">
                        <div class="product-list__card--name d-flex">
                            <img class="me-2" loading="lazy" src="/img/icon-codepen.png" alt="icon-codepen">
                            <div>
                                <h5>Name</h5>
                                <p>Creator</p>
                            </div>
                            <a href="#"><i class="far fa-bookmark"></i></a>

                        </div>
                        <div class="product-list__card--content">
                            <p class="text-note mb-5"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
                            <div class="tags">
                                <a href="#" class="text-details">Tag</a>
                                <a href="#" class="text-details">Tag</a>
                                <a href="#" class="text-details">Tag</a>
                            </div>

                        </div>

                    </div>
                </div>
            </section>

        </div>

    </div>
@endsection
@push('scripts')

@endpush

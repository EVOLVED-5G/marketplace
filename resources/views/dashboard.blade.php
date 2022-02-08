@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ mix('dist/css/dashboard.css') }}">
@endpush

@section('content')


    <div class="dashboard-content">

        <div class="content d-flex">

            <section class="dashboard-sidebar">
                <div class="my-list">
                    <p class="text-note mb-0"><b>My list</b></p>
                    <div class="d-flex wrapper wrapper-navbar-used mt-2">
                        <nav role="navigation" class="sidebar sidebar-bg-white sidebar-rounded-top-right" id="navigation">
                            <!-- sidebar -->
                            <div class="sidebar-menu">


                                <!-- menu scrollbar -->
                                <div class="scrollbar scrollbar-use-navbar scrollbar-bg-white">

                                    <!-- menu -->
                                    <ul class="list list-unstyled list-bg-white list-icon-purple mb-0">
                                        <!-- multi-level dropdown menu -->
                                        <li class="list-item">

                                            <!-- list items -->
                                            <ul class="list-unstyled">
                                                <li class="mb-2">
                                                    <a href="#" class="list-link link-arrow "><span class="list-icon">
                                                            <img class="me-2" loading="lazy"
                                                                src="/img/netapp-icon.png" alt="netapp-icon"></span>My Net
                                                        Apps</a>
                                                    <!-- list items, second level -->
                                                    <ul class="list-unstyled list-hidden">

                                                        <li>
                                                            <a href="#" class="list-link link-arrow">NetApp 1</a>
                                                            <!-- list items, third level -->
                                                            <ul class="list-unstyled list-hidden">
                                                                <li><a href="#" class="list-link">Details</a></li>
                                                                <li><a href="#" class="list-link">Track/revenue</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <!-- comments -->
                                                <li class="mb-2">
                                                    <a href="#" class="list-link link-arrow"><span class="list-icon"><i
                                                                class="fas fa-cloud-download-alt"></i></span>My
                                                        purchased NetApp</a>
                                                    <!-- list items, second level -->
                                                    <ul class="list-unstyled list-hidden">
                                                        <li><a href="#" class="list-link">NetApp 1</a></li>
                                                        <li><a href="#" class="list-link">NetApp 2</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#" class="list-link link-current"><span
                                                            class="list-icon"><i
                                                                class="fas fa-bookmark"></i></span>Saved items</a></li>
                                            </ul>
                                        </li>

                                    </ul>
                                    <hr>
                                    <p class="text-note"><b>Action</b></p>
                                    <a class="btn btn--tertiary mt-2" href="#">Create new NetApp</a>


                                </div>

                            </div>
                        </nav>

                    </div>
            </section>

            {{-- <section id="welcome" class="dashboard-right-content">


                <h2>Welcome</h2>
                <p>Don't wait longer. Start to:</p>
                <div class="bar-template row p-3 my-auto shadow align-items-center mb-5">
                    <div class="col-xl-8 col-lg-7 col-md-6 my-auto">
                        <h4>Build a NetApp</h4>
                        <p class="mb-0">Create your own NetApp and add it to our marketplace.</p>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <div class="btn btn--blue"> Create now! </div>

                    </div>

                </div>

                <div class="bar-template row p-3 my-auto shadow align-items-center mb-5">
                    <div class="col-xl-8 col-lg-7 col-md-6 my-auto">
                        <h4>Buy a NetApp</h4>
                        <p class="mb-0">Search through product catalogue.</p>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <div class="btn btn--blue">Go to product catalogue</div>

                    </div>

                </div>

            </section> --}}

            <div id="stepper" class="dashboard-right-content">
                <h3>Create new NetApp</h3>
                <div class="accordion mt-5" id="accordionExample">
                    <div class="steps">
                        <progress id="progress" value=0 max=100></progress>
                        <div class="step-item ">
                            <button class="step-button text-center mb-3" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                1
                            </button>
                            <div class="step-title ">
                                <p class="text-note mb-0">
                                    Service
                                </p>
                                <p class="text-details">basic information</p>

                            </div>
                        </div>
                        <div class="step-item">
                            <button class="step-button text-center mb-3 collapsed " type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                2
                            </button>
                            <div class="step-title">
                                <p class="text-note mb-0">
                                    Policy
                                </p>
                                <p class="text-details">Marketplace policy</p>
                            </div>
                        </div>
                        <div class="step-item">
                            <button class="step-button text-center mb-3 collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                3
                            </button>
                            <div class="step-title">
                                <p class="text-note mb-0">
                                    Deployment
                                </p>
                                <p class="text-details">Choose deployment setup </p>
                            </div>
                        </div>
                        <div class="step-item">
                            <button class="step-button text-center mb-3 collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <i class="fas fa-check"></i>
                            </button>
                            <div class="step-title">
                                <p class="text-note mb-0">
                                    Tutorial
                                </p>
                                <p class="text-details">Choose deployment setup </p>
                            </div>
                        </div>
                        <div class="step-item">
                            <button class="step-button text-center mb-3 collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                5
                            </button>
                            <div class="step-title">
                                <p class="text-note mb-0">
                                    Pricing
                                </p>
                                <p class="text-details">Choose pricing plan</p>
                            </div>
                        </div>
                    </div>

                    {{-- i imagine you dont nedd the stepper as an accordion as it is here, so you dont need these cards either. am i correct? --}}
                    {{-- <div class="card">
                        <div id="headingOne">
                            Service basic information/metadata
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                forms
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div id="headingTwo">
                            Policy
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                <p>In order to publish your netapp you need to agree to the Marketplace Policy. <a
                                        href="#">Read</a> the document for policy</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div id="headingThree">
                            Deployment
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                            <p>Copy paste the net app image url from the Open Repository</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div id="headingFour">
                            Tutorial
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                4 step your content goes here...
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div id="headingFive">
                            Pricing
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                5 step your content goes here...
                            </div>
                        </div>
                    </div> --}}
                </div>


                <div id="service" class="step-card">
                    <div class="step-card__title">
                        <h4>Service basic information/metadata</h4>
                    </div>

                    <div class="step-card__content p-3">
                        <form class="row g-3">
                            <div>
                                <label for="netapp-name" class="form-label text-details">Net app name</label>
                                <input type="text" class="form-control" id="netapp-name" placeholder="Type">
                            </div>
                            <div>
                                <label for="about-netapp" class="form-label text-details">About</label>
                                <input type="text" class="form-control" id="about-netapp" placeholder="...">
                            </div>
                            <div class="col-md-6">
                                <label for="type-of-netapp" class="form-label text-details">Type of Net app</label>
                                <select id="type-of-netapp" class="form-select">
                                    <option selected class="text-note">Standalone</option>
                                    <option class="text-note">Option 1</option>
                                    <option class="text-note">Option 2</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="category-of-netapp" class="form-label text-details">Category of Net app</label>
                                <select id="category-of-netapp" class="form-select">
                                    <option selected class="text-note">Industry 4.0 Pillars </option>
                                    <option class="text-note">Option 1</option>
                                    <option class="text-note">Option 2</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="version-of-netapp" class="form-label text-details">Version</label>
                                <input type="text" class="form-control" id="version-of-netapp" placeholder="v 1.0">
                            </div>
                            <div>
                                <label for="about-netapp" class="form-label text-details">View more (Marketing page) url
                                    site</label>
                                <input type="text" class="form-control" id="about-netapp">
                            </div>
                            <div class="mb-3">
                                <label for="logo-netapp" class="form-label text-details">NetApp logo</label>
                                <input class="form-control" type="file" id="logo-netapp">
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 text-details">Publish as:</legend>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="publish-as-user">
                                    <label class="form-check-label" for="publish-as-user">
                                        User
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="publish-as-business" checked>
                                    <label class="form-check-label" for="publish-as-business">
                                        Business/Organization
                                    </label>
                                    <div>
                                        <label for="business-name" class="form-label text-details">Business/Organization
                                            Name</label>
                                        <input type="text" class="form-control" id="business-name">
                                    </div>
                                    <div>
                                        <label for="social-number" class="form-label text-details">Social number</label>
                                        <input type="text" class="form-control" id="social-number">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div id="policy" class="step-card">
                    <div class="step-card__title">
                        <h4>Policy</h4>
                    </div>

                    <div class="step-card__content p-3">
                        <p>In order to publish your netapp you need to agree to the Marketplace Policy. <a href="#">Read</a>
                            the document for policy.</p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="agree-policy" id="agree-policy">
                            <label class="form-check-label" for="agree-policy">
                                Agree Marketplace policy
                            </label>
                        </div>
                    </div>




                </div>

                <div id="deployment" class="step-card">
                    <div class="step-card__title">
                        <h4>Deployment</h4>
                    </div>

                    <div class="step-card__content p-3">
                        <form class="row g-3">
                            <div>
                                <label for="netapp-image-url" class="form-label text-details">Copy paste the net app image url from the Open Repository</label>
                                <input type="text" class="form-control" id="netapp-image-url" >
                            </div>
                            <div>
                                <label for="report-url" class="form-label text-details">Copy paste the Certification/Validation report URL</label>
                                <input type="text" class="form-control" id="report-url" >
                            </div>
                            <div>
                                <label for="docker-size" class="form-label text-details">Enter Docker Size</label>
                                <input type="text" class="form-control" id="docker-size" >
                            </div>

                            <div class="mb-3">
                                <label for="tutorial-pdf" class="form-label text-details">Upload tutorial as a pdf</label>
                                <input class="form-control" type="file" id="tutorial-pdf">
                            </div>
                        </form>
                    </div>




                </div>

                <div class="step-actions mt-5">
                    <a href="#">Cancel Process</a>
                    <div class="btn btn--blue ms-5"> Next</div>
                </div>

            </div>





        </div>

    </div>



@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nanobar/0.4.2/nanobar.min.js"></script>

    <script src="{{ mix('dist/js/dashboard.js') }}"></script>
@endpush

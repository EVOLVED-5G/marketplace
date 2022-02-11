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
                                    <a class="btn btn--tertiary mt-2 mb-5" href="#">Create new NetApp</a>

                                    {{-- <button class="mouse-cursor-gradient-tracking">
                                        <span>Hover me</span>
                                      </button> --}}


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

                                <textarea class="form-control" id="about-netapp" rows="3">...</textarea>
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
                                <label for="netapp-image-url" class="form-label text-details">Copy paste the net app image
                                    url from the Open Repository</label>
                                <input type="text" class="form-control" id="netapp-image-url">
                            </div>
                            <div>
                                <label for="report-url" class="form-label text-details">Copy paste the
                                    Certification/Validation report URL</label>
                                <input type="text" class="form-control" id="report-url">
                            </div>
                            <div>
                                <label for="docker-size" class="form-label text-details">Enter Docker Size</label>
                                <input type="text" class="form-control" id="docker-size">
                            </div>

                            <div class="mb-3">
                                <label for="deployment-tutorial-pdf" class="form-label text-details">Upload license file </label>
                                <input class="form-control" type="file" id="deployment-tutorial-pdf">
                            </div>
                        </form>
                    </div>




                </div>

                <div id="tutorial" class="step-card">
                    <div class="step-card__title">
                        <h4>Tutorial</h4>
                        <p>Please describe in detail your net app. </p>
                        <p>Add a title/description here for the tutorial. </p>
                        <br>
                        <p>Make sure you present a list of the technologies that are used in your docker package.</p>
                    </div>

                    <div class="step-card__content p-3">
                        <p>Build your own tutorial editing the form below.</p>

                        <div class="col-sm-10">
                            <textarea class="form-control" id="code_preview0" name="" style="height: 300px;"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tutorial-pdf" class="form-label text-details">Upload tutorial as a pdf</label>
                            <input class="form-control" type="file" id="tutorial-pdf">
                        </div>
                    </div>




                </div>

                <div id="pricing" class="step-card">
                    <div class="step-card__title">
                        <h4>Pricing</h4>

                    </div>

                    <div id="once-off" class="step-card__content p-3 mb-3">
                        <p>Once-off</p>
                        <p>Charge your customer once-off. Once they pay this amount they will be able to make unlimited
                            calls to your netapp API</p>
                        <div class="choose-cost p-3">
                            <div class="col-md-2">
                                <label for="choose-cost" class="form-label text-details">Choose Cost</label>
                                <input type="text" class="form-control" id="choose-cost" placeholder="300 €">
                            </div>
                        </div>
                    </div>

                    {{-- <div id="pay-as-you-go" class="step-card__content p-3">
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pay" id="pay">
                                <label class="form-check-label" for="pay">
                                    Pay as you go pricing
                                </label>
                            </div>
                            <p>Charge your customer either a) a fixed price for a specific number of calls, or b) fixed
                                price
                                per call.</p>
                        </div>
                        <div>
                            <p>Plan table</p>
                            <div class="plan-table-card pt-3 ps-3 pe-3">
                                <input type="text" class="form-control mb-3" id="device-location"
                                    placeholder="/get-device-location">

                                <div class="plan-table-card__form p-3 mb-3">
                                    <div class="check-and-trash">
                                        <i class="fa fa-check"></i> | <i class="fa fa-trash"></i>
                                    </div>
                                    <div class="mt-3">
                                        <form class="row g-3">
                                            <div class="col-md-2">
                                                <label for="from-calls" class="form-label text-details">From</label>
                                                <input type="text" class="form-control" id="from-calls"
                                                    placeholder="0 calls">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="to-calls" class="form-label text-details">To</label>
                                                <input type="text" class="form-control" id="to-calls"
                                                    placeholder="500 calls">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="category-fee" class="form-label text-details">Category
                                                    fee</label>
                                                <select id="category-fee" class="form-select">
                                                    <option selected class="text-note">Fixed</option>
                                                    <option class="text-note">Per call</option>
                                                    <option class="text-note">Option 2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="cost-netapp" class="form-label text-details">Cost</label>
                                                <input type="text" class="form-control" id="cost-netapp"
                                                    placeholder="0 €">
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="plan-table-card__form p-3 mb-3">
                                    <div class="check-and-trash">
                                        <i class="fa fa-check"></i> | <i class="fa fa-trash"></i>
                                    </div>
                                    <div class="mt-3">
                                        <form class="row g-3">
                                            <div class="col-md-2">
                                                <label for="from-calls2" class="form-label text-details">From</label>
                                                <input type="text" class="form-control" id="from-calls2"
                                                    placeholder="500 calls">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="to-calls2" class="form-label text-details">To</label>
                                                <input type="text" class="form-control" id="to-calls2"
                                                    placeholder="1000 calls">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="category-fee2" class="form-label text-details">Category
                                                    fee</label>
                                                <select id="category-fee2" class="form-select">
                                                    <option selected class="text-note">Fixed</option>
                                                    <option class="text-note">Per call</option>
                                                    <option class="text-note">Option 2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="cost-netapp2" class="form-label text-details">Cost</label>
                                                <input type="text" class="form-control" id="cost-netapp2"
                                                    placeholder="2 € ">
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="plan-table-card__form p-3 ">
                                    <div class="check-and-trash">
                                        <i class="fa fa-check"></i> | <i class="fa fa-trash"></i>
                                    </div>
                                    <div class="mt-3">
                                        <form class="row g-3">
                                            <div class="col-md-2">
                                                <label for="from-calls3" class="form-label text-details">From</label>
                                                <input type="text" class="form-control" id="from-calls3"
                                                    placeholder="1000+  calls">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="to-calls3" class="form-label text-details">To</label>
                                                <input type="text" class="form-control" id="to-calls3"
                                                    placeholder="∞">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="unlimited" id="unlimited">
                                                        <label class="form-check-label" for="unlimited">
                                                            unlimited
                                                        </label>
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="category-fee3" class="form-label text-details">Category
                                                    fee</label>
                                                <select id="category-fee3" class="form-select">
                                                    <option selected class="text-note">Per call</option>
                                                    <option class="text-note">Option 1</option>
                                                    <option class="text-note">Option 2</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="cost-netapp" class="form-label text-details">Cost</label>
                                                <input type="text" class="form-control" id="cost-netapp"
                                                    placeholder="0.005e/call">
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="plan-table-card__add p-2 text-center">
                                    <a href="#"><i class="fas fa-plus-circle"></i> Add</a>
                                </div>
                            </div>

                            <div class="new-table mt-3 p-2 text-center">
                                Add new plan table
                            </div>
                        </div>

                    </div> --}}


                </div>

                <div class="step-actions mt-5">
                    <a href="#">Cancel Process</a>
                    <div class="btn btn--blue ms-5"> Next</div>

                    <div class="mt-5">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn--blue" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Create
                        </button>


                {{-- <button class="mouse-cursor-gradient-tracking">
                    <span>Hover me</span>
                  </button> --}}

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content text-center">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="modal-header ">
                                        <h5 class="modal-title d-flex " id="exampleModalLabel">
                                            <img loading="lazy" src="/img/success.modal.png" alt="success.modal">

                                        </h5>

                                    </div>
                                    <div class="modal-body mb-5">
                                        <h1>Your NetApp was created successfuly! </h1>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn--tertiary mb-3"
                                            data-bs-dismiss="modal">OK</button>


                                        <a href="#">Go to see your NetApp</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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

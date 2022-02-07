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

                                    {{-- <button class="mouse-cursor-gradient-tracking ms-3 mt-5">
                                            <span>Create new NetApp</span>
                                        </button> --}}

                                </div>

                            </div>
                        </nav>

                    </div>
            </section>

            <div id="stepper" class="dashboard-right-content">
                <div class="accordion" id="accordionExample">
                    <div class="steps">
                        <progress id="progress" value=0 max=100></progress>
                        <div class="step-item">
                            <button class="step-button text-center" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                1
                            </button>
                            <div class="step-title">
                                First Step
                            </div>
                        </div>
                        <div class="step-item">
                            <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                2
                            </button>
                            <div class="step-title">
                                Second Step
                            </div>
                        </div>
                        <div class="step-item">
                            <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                3
                            </button>
                            <div class="step-title">
                                Third Step
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div id="headingOne">
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                1 step your content goes here...
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div id="headingTwo">

                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                2 step your content goes here...
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div id="headingThree">

                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="card-body">
                                3 step your content goes here...
                            </div>
                        </div>
                    </div>
                </div>

            </div>

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

        </div>

    </div>



@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nanobar/0.4.2/nanobar.min.js"></script>

    <script src="{{ mix('dist/js/dashboard.js') }}"></script>
@endpush

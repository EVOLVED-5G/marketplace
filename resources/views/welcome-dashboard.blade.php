@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ mix('dist/css/dashboard.css') }}">
@endpush

@section('content')
    <div class="dashboard-content">
        <div class="content d-flex">
            <section class="dashboard-sidebar">
                <div class="my-list">
                    <p class="text-note mb-0">
                        <b>My list</b>
                    </p>
                    <div class="d-flex wrapper wrapper-navbar-used mt-2">
                        <nav role="navigation" class="sidebar sidebar-bg-white sidebar-rounded-top-right" id="navigation">
                            <!-- sidebar -->
                            <div class="sidebar-menu">
                                <!-- menu scrollbar -->
                                <div class="scrollbar scrollbar-use-navbar scrollbar-bg-white">
                                    <!-- menu -->
                                    <ul
                                        class="
                              list list-unstyled list-bg-white list-icon-purple
                              mb-0
                            ">
                                        <!-- multi-level dropdown menu -->
                                        <li class="list-item">
                                            <!-- list items -->
                                            <ul class="list-unstyled">
                                                <li class="mb-2">
                                                    <a href="#" class="list-link link-arrow"><span class="list-icon">
                                                            <img class="me-2" loading="lazy"
                                                                src="/img/netapp-icon.png" alt="netapp-icon" /></span>My Net
                                                        Apps</a>
                                                    <!-- list items, second level -->
                                                    <ul class="list-unstyled list-hidden">
                                                        <li>
                                                            <a href="#" class="list-link link-arrow">NetApp 1</a>
                                                            <!-- list items, third level -->
                                                            <ul class="list-unstyled list-hidden">
                                                                <li>
                                                                    <a href="#" class="list-link">Details</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="list-link">Track/revenue</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <!-- comments -->
                                                <li class="mb-2">
                                                    <a href="#" class="list-link link-arrow"><span class="list-icon"><i
                                                                class="fas fa-cloud-download-alt"></i></span>My purchased
                                                        NetApp</a>
                                                    <!-- list items, second level -->
                                                    <ul class="list-unstyled list-hidden">
                                                        <li>
                                                            <a href="#" class="list-link">NetApp 1</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="list-link">NetApp 2</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#" class="list-link link-current"><span
                                                            class="list-icon"><i
                                                                class="fas fa-bookmark"></i></span>Saved items</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <hr />
                                    <p class="text-note"><b>Action</b></p>
                                    <a class="btn btn--tertiary mt-2" href="#">Create new NetApp</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </section>
            <section id="welcome" class="dashboard-right-content">
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

            </section>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nanobar/0.4.2/nanobar.min.js"></script>

    <script src="{{ mix('dist/js/dashboard.js') }}"></script>
@endpush

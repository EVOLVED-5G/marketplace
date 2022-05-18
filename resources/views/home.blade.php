@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ mix('dist/css/home.css') }}">
@endpush

@section('body_class')
    home
@endsection

@section('content')
    <main>
        <section class="main-title d-flex align-items-center u-margin-bottom-big">
            <div class="main-title__content content">
                <div class="main-title__content--text d-flex">
                    <div>
                        <h1 class="mb-3">
                            Embrace the <img class="img-fluid" loading="lazy" src="{{ asset('img/5g-icon.png') }}"
                                alt="5g-icon"> era
                        </h1>
                        <p> We provide the tools to create, manage and connect to the next generation of 5G netapps</p>
                    </div>

                    <div>
                        <a href="{{ route('product-catalogue') }}" class="mouse-cursor-gradient-tracking btn btn--primary ">Explore NetApps</a>
                        <a href="{{ route('welcome-dashboard') }}" class="mouse-cursor-gradient-tracking btn btn--secondary">Create your own</a>
                   </div>

                </div>
                <div class="main-title__content--icon">
                    <img class="img-fluid" loading="lazy" src="/img/5G-launch.png" alt="title-image">
                </div>
            </div>
        </section>


        <section class="explore d-flex align-items-center u-margin-bottom-big">

            <div class="explore__content content d-flex flex-wrap ">
                <div class="text-center mb-5">
                    <img class="img-fluid mb-2" loading="lazy" src="/img/line-icon.png" alt="line-icon">
                    <h1> Explore the marketplace</h1>
                    <p>Evolved-5G is cross-industry API Marketplace that enables developers, entrepreneurs and
                        businesses to
                        come together to create, discover and integrate services by consuming 3GPP APIs (native APIs) as
                        well as other telco assets</p>
                    <a href="{{ route('product-catalogue') }}" class="mouse-cursor-gradient-tracking btn btn--tertiary mt-5">View NetApps</a>
                </div>
                {{-- <div class="boxes">
                    <div class="d-flex flex-wrap align-items-center justify-content-center gap-3">
                        <div class="explore__box mb-4">
                            <div class="explore__box--title">
                                <h4>NetApp category 1</h4>
                            </div>
                            <div class="explore__box--text">
                                <p class="text-note">Category 1 dolor sit amet, consetetur sadipscing elitr, sed diam
                                    nonumy
                                    eirmod tempor
                                    invidunt ut labore et dolore magna.</p>
                                <a href="{{ route('product-catalogue') }}" class="mouse-cursor-gradient-tracking btn btn--tertiary ">View NetApps</a>
                            </div>
                        </div>
                        <div class="explore__box mb-4">
                            <div class="explore__box--title">
                                <h4>NetApp category 2</h4>
                            </div>
                            <div class="explore__box--text">
                                <p class="text-note">Category 1 dolor sit amet, consetetur sadipscing elitr, sed diam
                                    nonumy
                                    eirmod tempor
                                    invidunt ut labore et dolore magna. </p>
                                <a href="{{ route('product-catalogue') }}" class="mouse-cursor-gradient-tracking btn btn--tertiary ">View NetApps</a>
                            </div>
                        </div>
                    </div>


                </div> --}}
            </div>


            </div>

        </section>




        <section class="for-whom u-margin-bottom-big">
            <div class="for-whom__content content">
                <div class="row  for-creators">
                    <div class="col-lg-6 for-creators--title p-5">
                        <img class="img-fluid" loading="lazy" src="/img/creators-line.png" alt="creators-line">
                        <h1>For NetApps creators</h1>
                    </div>
                    <div class="col-lg-6 for-creators--list ">
                        <ol>
                            <li>
                                <p> <span>1</span>Download SKD to create your first net app</p>

                            </li>
                            <li>
                                <p> <span>2</span>Use Evolved-5G CI/CD tools to build your net app</p>
                            </li>
                            <li>
                                <p> <span>3</span>Certify and validate your net app</p>
                            </li>
                            <li>
                                <p> <span>4</span>Release to open repository and to marketplace</p>

                            </li>
                        </ol>
                        <a href="{{ route('netapp-creators') }}" class="mouse-cursor-gradient-tracking btn btn--primary mt-5">Find out more</a>
                    </div>
                </div>

                <div class="row for-businesses">
                    <div class="col-lg-6 for-businesses--list ">
                        <ol>
                            <li>
                                <p> <span>1</span>Explore the product catalogue</p>

                            </li>
                            <li>
                                <p> <span>2</span>Purchase netapps of interest</p>
                            </li>
                            <li>
                                <p> <span>3</span>Integrate netapps to your applications / infrastructure</p>
                            </li>

                        </ol>

                        <a href="{{ route('product-catalogue') }}" class="mouse-cursor-gradient-tracking btn btn--primary mt-5">Find out more</a>
                    </div>
                    <div class="col-lg-6 for-businesses--title p-5">
                        <img class="img-fluid" loading="lazy" src="/img/businesses-line.png" alt="businesses-line">
                        <h1>For businesses and entrepreneurs</h1>
                    </div>
                </div>



            </div>

        </section>

        <section class="support u-margin-medium-big d-flex align-items-center">

            <div class="support__text content text-center ">
                <div>
                    <h1> Support</h1>
                    <h2>Connect tο the forum!</h2>

                    <a class="mouse-cursor-gradient-tracking btn btn--secondary mt-5" href="{{ route('support') }}">Go to forum</a>
                </div>


            </div>

        </section>



        <section class="related-tech u-margin-bottom-big d-flex align-items-center">

            <div class="related-tech__content content text-center">
                <h1>Related technologies</h1>

                <div class="related-tech__content--tech d-flex flex-wrap  gap-2 technologies mt-5">

                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item mb-4">
                            <h2 class="accordion-header key-title" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#key-1" aria-expanded="false" aria-controls="key-1">
                                    <i class="fas fa-plus-circle"></i>
                                    <i class="fas fa-minus-circle"></i> <b>Software Defined Network</b>
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                data-bs-parent="#accordionFlushExample" id="key-1">
                                <div class="accordion-body text-start">Software-Defined Networking (SDN) is a network
                                    architecture approach that enables the network to be intelligently and centrally
                                    controlled, or 'programmed,' using software applications.</div>
                            </div>
                        </div>


                    </div>

                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item mb-4">
                            <h2 class="accordion-header key-title" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#key-2" aria-expanded="false" aria-controls="key-2">
                                    <i class="fas fa-plus-circle"></i>
                                    <i class="fas fa-minus-circle"></i> <b>Native Cloud technologies</b>
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                data-bs-parent="#accordionFlushExample" id="key-2">
                                <div class="accordion-body text-start">Cloud-native architecture and technologies are an
                                    approach to designing, constructing, and operating workloads that are built in the cloud
                                    and take full advantage of the cloud computing model</div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item mb-4">
                            <h2 class="accordion-header key-title" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#key-3" aria-expanded="false" aria-controls="key-3">
                                    <i class="fas fa-plus-circle"></i>
                                    <i class="fas fa-minus-circle"></i> <b>5G</b>
                                </button>
                            </h2>
                            <div class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                data-bs-parent="#accordionFlushExample" id="key-3">
                                <div class="accordion-body text-start">5G is the 5th generation mobile network.5G enables a
                                    new kind of network that is designed to connect virtually everyone and everything
                                    together including machines, objects, and devices.</div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>

    </main>
@endsection
@push('scripts')
    <script src="{{ mix('dist/js/home.js') }}"></script>
@endpush

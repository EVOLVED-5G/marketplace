@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ mix('dist/css/support.css') }}">
    <link rel="stylesheet" href="{{ mix('dist/css/netapp-single.css') }}">
@endpush

@section('content')

<div class="test">
    <section style="padding-top: 150px;" class="content">
        <h2>Support</h2>
        <p>Under construction</p>


        <ul class="nav nav-tabs " id="myTab" role="tablist">
            <li class="nav-item text-details" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">Overview</button>
            </li>
            <li class="nav-item text-details" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                    role="tab" aria-controls="profile" aria-selected="false">Tutorial</button>
            </li>
            <li class="nav-item text-details" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                    role="tab" aria-controls="contact" aria-selected="false">Pricing</button>
            </li>
            <li class="nav-item ms-auto" id="view-netapp-page">

                <a href="#"><button class="nav-link" type="button">View NetApp page</button></a>
            </li>

        </ul>
        <hr>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row status-options mb-5 p-3 align-items-center">
                    <div class="col-1">Status</div>
                    <div class="col-4">
                        <select id="status" class="form-select mt-3">
                            <option selected class="text-note">
                                Private
                            </option>
                            <option class="text-note">
                                Public
                            </option>
                            <option class="text-note">
                                Option 2
                            </option>
                        </select>
                        <label for="status" class="form-label text-details">Not visible to the marketplace</label>
                    </div>


                </div>

                <div class="step-card__content p-3">
                    <form class="row g-3">
                        <div>
                            <label for="netapp-name" class="form-label text-details">Net app name</label>
                            <a href="#">Edit</a>

                            <input type="text" class="form-control" id="netapp-name" data-vv-rules="required" name="name"
                                placeholder="Name" />

                            <span v-show="errors.has('service.name')" class="error-text">Please Enter a name</span>
                        </div>
                        <div>
                            <label for="about-netapp" class="form-label text-details">About</label>
                            <input type="text" class="form-control" id="about-netapp" name="about"
{{--                                   todo: these should be commented back--}}
{{--                                v-model="form.service.about" placeholder="..." data-vv-scope="service"--}}
{{--                                v-validate="{ required: true }" data-vv-rules="required" --}}
                            />
                            <span v-show="errors.has('service.about')" class="error-text">Please Fill this field</span>
                        </div>

                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="col-sm-10">
                    {{-- <ckEditor v-model="form.tutorial.docs" name="docs"></ckEditor>
                    <span v-show="editorError" class="error-text">Please Write some Tutorial Documentation</span> --}}
                </div>

            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">


                <div class="row status-options mb-5 p-3 align-items-center">
                    <div class="col-1">Form</div>
                    <div class="col-4">
                        <select id="status" class="form-select ">
                            <option selected class="text-note">
                                Pay as you go
                            </option>
                            <option class="text-note">
                                Once off
                            </option>

                        </select>

                    </div>


                </div>


                <div class="calls-choices mt-5">
                 <a href="#" id="edit-details" >Edit</a>


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

                    </div>
                </div>

            </div>
        </div>

    </section>
</div>
@endsection
@push('scripts')
@endpush

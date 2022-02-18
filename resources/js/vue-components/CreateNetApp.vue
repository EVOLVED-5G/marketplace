<template>
    <div class="dashboard-content">
        <div class="content d-flex">
            <section class="dashboard-sidebar">
                <div class="my-list">
                    <p class="text-note mb-0">
                        <b>My list</b>
                    </p>
                    <div class="d-flex wrapper wrapper-navbar-used mt-2">
                        <nav
                            role="navigation"
                            class="sidebar sidebar-bg-white sidebar-rounded-top-right"
                            id="navigation"
                        >
                            <!-- sidebar -->
                            <div class="sidebar-menu">
                                <!-- menu scrollbar -->
                                <div
                                    class="scrollbar scrollbar-use-navbar scrollbar-bg-white"
                                >
                                    <!-- menu -->
                                    <ul
                                        class="list list-unstyled list-bg-white list-icon-purple mb-0"
                                    >
                                        <!-- multi-level dropdown menu -->
                                        <li class="list-item">
                                            <!-- list items -->
                                            <ul class="list-unstyled">
                                                <li class="mb-2">
                                                    <a
                                                        href="#"
                                                        class="list-link link-arrow link-current"
                                                        ><span
                                                            class="list-icon"
                                                        >
                                                            <img
                                                                class="me-2"
                                                                loading="lazy"
                                                                src="/img/netapp-icon.png"
                                                                alt="netapp-icon" /></span
                                                        >My Net Apps</a
                                                    >
                                                    <!-- list items, second level -->
                                                    <ul
                                                        class="list-unstyled list-hidden"
                                                    >
                                                        <li>
                                                            <a
                                                                href="#"
                                                                class="list-link link-arrow"
                                                                >NetApp 1</a
                                                            >
                                                            <!-- list items, third level -->
                                                            <ul
                                                                class="list-unstyled list-hidden"
                                                            >
                                                                <li>
                                                                    <a
                                                                        href="#"
                                                                        class="list-link"
                                                                        >Details</a
                                                                    >
                                                                </li>
                                                                <li>
                                                                    <a
                                                                        href="#"
                                                                        class="list-link"
                                                                        >Track/revenue</a
                                                                    >
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <!-- comments -->
                                                <li class="mb-2">
                                                    <a
                                                        href="#"
                                                        class="list-link link-arrow"
                                                        ><span class="list-icon"
                                                            ><i
                                                                class="fas fa-cloud-download-alt"
                                                            ></i></span
                                                        >My purchased NetApp</a
                                                    >
                                                    <!-- list items, second level -->
                                                    <ul
                                                        class="list-unstyled list-hidden"
                                                    >
                                                        <li>
                                                            <a
                                                                href="#"
                                                                class="list-link"
                                                                >NetApp 1</a
                                                            >
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="#"
                                                                class="list-link"
                                                                >NetApp 2</a
                                                            >
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a
                                                        href="#"
                                                        class="list-link "
                                                        ><span class="list-icon"
                                                            ><i
                                                                class="fas fa-bookmark"
                                                            ></i></span
                                                        >Saved items</a
                                                    >
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <hr />
                                    <p class="text-note"><b>Action</b></p>
                                    <a class="btn btn--tertiary mt-2" href="#"
                                        >Create new NetApp</a
                                    >
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </section>

            <!-- <section id="welcome" class="dashboard-right-content">


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

        </section> -->

            <div id="stepper" class="dashboard-right-content">
                <h3>Create new NetApp</h3>
                <div class="accordion mt-5" id="accordionExample">
                    <div class="steps">
                        <progress
                            id="progress"
                            :value="this.progressValue"
                            max="100"
                        ></progress>
                        <div class="step-item">
                            <button
                                class="step-button text-center mb-3"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseOne"
                                :aria-expanded="
                                    this.progressValue > this.stepsValue.service
                                        ? true
                                        : false
                                "
                                @click="backToPrevious(stepsValue.service)"
                                aria-controls="collapseOne"
                            >
                                <i
                                    class="fas fa-check"
                                    v-if="
                                        this.progressValue >
                                        this.stepsValue.service
                                    "
                                ></i>
                                <p v-else>1</p>
                            </button>
                            <div class="step-title">
                                <p class="text-note mb-0">Service</p>
                                <p class="text-details">basic information</p>
                            </div>
                        </div>
                        <div class="step-item">
                            <button
                                class="step-button text-center mb-3 collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo"
                                @click="backToPrevious(stepsValue.policy)"
                                :aria-expanded="
                                    this.progressValue > this.stepsValue.policy
                                        ? true
                                        : false
                                "
                                aria-controls="collapseTwo"
                            >
                                <i
                                    class="fas fa-check"
                                    v-if="
                                        this.progressValue >
                                        this.stepsValue.policy
                                    "
                                ></i>
                                <p v-else>2</p>
                            </button>
                            <div class="step-title">
                                <p class="text-note mb-0">Policy</p>
                                <p class="text-details">Marketplace policy</p>
                            </div>
                        </div>
                        <div class="step-item">
                            <button
                                class="step-button text-center mb-3 collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseThree"
                                @click="backToPrevious(stepsValue.deployment)"
                                :aria-expanded="
                                    this.progressValue >
                                    this.stepsValue.deployment
                                        ? true
                                        : false
                                "
                                aria-controls="collapseThree"
                            >
                                <i
                                    class="fas fa-check"
                                    v-if="
                                        this.progressValue >
                                        this.stepsValue.deployment
                                    "
                                ></i>
                                <p v-else>3</p>
                            </button>
                            <div class="step-title">
                                <p class="text-note mb-0">Deployment</p>
                                <p class="text-details">
                                    Choose deployment setup
                                </p>
                            </div>
                        </div>
                        <div class="step-item">
                            <button
                                class="step-button text-center mb-3 collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseFour"
                                @click="backToPrevious(stepsValue.tutorial)"
                                :aria-expanded="
                                    this.progressValue >=
                                    this.stepsValue.tutorial
                                        ? true
                                        : false
                                "
                                aria-controls="collapseFour"
                            >
                                <i
                                    class="fas fa-check"
                                    v-if="
                                        this.progressValue >
                                        this.stepsValue.tutorial
                                    "
                                ></i>
                                <p v-else>4</p>
                            </button>
                            <div class="step-title">
                                <p class="text-note mb-0">Tutorial</p>
                                <p class="text-details">
                                    Choose deployment setup
                                </p>
                            </div>
                        </div>
                        <div class="step-item">
                            <button
                                class="step-button text-center mb-3 collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseFive"
                                @click="backToPrevious(stepsValue.pricing)"
                                :aria-expanded="
                                    this.progressValue ==
                                    this.stepsValue.pricing
                                        ? true
                                        : false
                                "
                                aria-controls="collapseFive"
                            >
                                <i
                                    class="fas fa-check"
                                    v-if="
                                        this.progressValue >=
                                        this.stepsValue.pricing
                                    "
                                ></i>
                                <p v-else>5</p>
                            </button>
                            <div class="step-title">
                                <p class="text-note mb-0">Pricing</p>
                                <p class="text-details">Choose pricing plan</p>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="card">
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
                    </div> -->
                </div>
                <div
                    id="service"
                    class="step-card"
                    v-if="this.progressValue == this.stepsValue.service"
                >
                    <div class="step-card__title">
                        <h4>Service basic information/metadata</h4>
                    </div>

                    <div class="step-card__content p-3">
                        <form class="row g-3">
                            <div>
                                <label
                                    for="netapp-name"
                                    class="form-label text-details"
                                    >Net app name</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="netapp-name"
                                    v-model="form.service.name"
                                    :class="{
                                        customError: errors.has('service.name'),
                                    }"
                                    data-vv-scope="service"
                                    v-validate="{ required: true }"
                                    data-vv-rules="required"
                                    name="name"
                                    placeholder="Name"
                                />

                                <span
                                    v-show="errors.has('service.name')"
                                    class="error-text"
                                    >Please Enter a name</span
                                >
                            </div>
                            <div>
                                <label
                                    for="about-netapp"
                                    class="form-label text-details"
                                    >About</label
                                >
                                <textarea
                                    class="form-control"
                                    id="about-netapp"
                                    name="about"
                                    v-model="form.service.about"
                                    placeholder="One paragram about your net app. What it does and what problem it solves. This will appear at the first paragraph in your public netapp page"
                                    :class="{
                                        customError:
                                            errors.has('service.about'),
                                    }"
                                    data-vv-scope="service"
                                    v-validate="{ required: true }"
                                    data-vv-rules="required"
                                />
                                <span
                                    v-show="errors.has('service.about')"
                                    class="error-text"
                                    >Please Fill this field</span
                                >
                            </div>

                            <div class="col-md-6">
                                <label
                                    for="type-of-netapp"
                                    class="form-label text-details"
                                    >Type of Net app</label
                                >
                                <select
                                    id="type-of-netapp"
                                    class="form-select"
                                    name="type"
                                    v-model="form.service.type"
                                    :class="{
                                        customError: errors.has('service.type'),
                                    }"
                                    data-vv-scope="service"
                                    v-validate="{ required: true }"
                                    data-vv-rules="required"
                                >
                                    <option
                                        class="text-note"
                                        v-for="netApptype in types"
                                        :value="netApptype.id"
                                        :key="netApptype.id"
                                    >
                                        {{ netApptype.name }}
                                    </option>
                                </select>
                                <span
                                    v-show="errors.has('service.type')"
                                    class="error-text"
                                    >Select atleast One Service Type</span
                                >
                            </div>
                            <div class="col-md-6">
                                <label
                                    for="category-of-netapp"
                                    class="form-label text-details"
                                    >Category of Net app</label
                                >
                                <select
                                    id="category-of-netapp"
                                    class="form-select"
                                    v-model="form.service.category"
                                    name="category"
                                    :class="{
                                        customError:
                                            errors.has('service.category'),
                                    }"
                                    data-vv-scope="service"
                                    v-validate="{ required: true }"
                                    data-vv-rules="required"
                                >
                                    <option
                                        class="text-note"
                                        v-for="category in categories"
                                        :value="category.id"
                                        :key="category.id"
                                    >
                                        {{ category.name }}
                                    </option>
                                </select>
                                <span
                                    v-show="errors.has('service.category')"
                                    class="error-text"
                                    >Select atleast one Service Category</span
                                >
                            </div>
                            <div class="col-md-6">
                                <label
                                    for="version-of-netapp"
                                    class="form-label text-details"
                                    >Version</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="version-of-netapp"
                                    name="version"
                                    v-model="form.service.version"
                                    :class="{
                                        customError:
                                            errors.has('service.version'),
                                    }"
                                    data-vv-scope="service"
                                    v-validate="{ required: true }"
                                    data-vv-rules="required"
                                    placeholder="v1.0"
                                />
                                <span
                                    v-show="errors.has('service.version')"
                                    class="error-text"
                                    >Add Service Version</span
                                >
                            </div>
                            <div class="col-md-6">
                                <label
                                    for="version-of-netapp"
                                    class="form-label text-details"
                                ></label>
                                <VoerroTagsInput
                                    element-id="tags"
                                    v-model="form.service.tag"
                                    :existing-tags="tagsOption"
                                    :typeahead="true"
                                    :class="{
                                        customError: errors.has('service.tag'),
                                    }"
                                    data-vv-scope="service"
                                    name="tag"
                                    v-validate="{ required: true }"
                                    data-vv-rules="required"
                                ></VoerroTagsInput>
                                <span
                                    v-show="errors.has('service.tag')"
                                    class="error-text"
                                    >Select atleast one Tag</span
                                >
                                <span
                                    v-show="errors.has('service.tags')"
                                    class="error-text"
                                    >Select atleast one Tag asdf</span
                                >

                            </div>
                            <div>
                                <label
                                    for="about-netapp"
                                    class="form-label text-details"
                                    >View more page (in case you have your netapp listed in your company's page) </label
                                >
                                <input
                                    type="url"
                                    class="form-control"
                                    id="about-netapp"
                                    placeholder="Enter the URL "
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    for="logo-netapp"
                                    class="form-label text-details"
                                    >NetApp logo</label
                                >
                                <VueDropzone
                                    :uploadUrl="
                                        uploadUrl + '/api/upload-file?url=logo'
                                    "
                                    extensions=".jpg, .jpeg, .png, .webp"
                                    v-on:uploadFile="
                                        (value) =>
                                            (this.form.service.logo =
                                                value.file_name.original.path)
                                    "
                                ></VueDropzone>
                                <span v-show="errors.has('service.logo')" class="error-text"
                                    >Please Choose Logo Image</span
                                >

                            </div>

                            <fieldset class="row mb-3">
                                <legend
                                    class="col-form-label col-sm-2 text-details"
                                >
                                    Publish as:
                                </legend>
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="publishedBy"
                                        v-model="form.service.publishedBy"
                                        id="publish-as-user"
                                        value="user"
                                        :class="{
                                            customError: errors.has(
                                                'service.publishedBy'
                                            ),
                                        }"
                                        data-vv-scope="service"
                                        v-validate="{ required: true }"
                                        data-vv-rules="required"
                                    />
                                    <label
                                        class="form-check-label"
                                        for="publish-as-user"
                                    >
                                        User
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        v-model="form.service.publishedBy"
                                        id="publish-as-business"
                                        name="publishedBy"
                                        value="business"
                                        :class="{
                                            customError: errors.has(
                                                'service.publishedBy'
                                            ),
                                        }"
                                        data-vv-scope="service"
                                        v-validate="{ required: true }"
                                        data-vv-rules="required"
                                    />
                                    <label
                                        class="form-check-label"
                                        for="publish-as-business"
                                    >
                                        Business/Organization
                                    </label>
                                    <span
                                        v-show="
                                            errors.has('service.publishedBy')
                                        "
                                        class="error-text"
                                        >Select Publisher</span
                                    >
                                    <div  v-if="form.service.publishedBy=='business'">
                                        <label
                                            for="business-name"
                                            class="form-label text-details"
                                            >Business/Organization Name</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="businessName"
                                            v-model="form.service.businessName"
                                            :class="{
                                                customError: errors.has(
                                                    'service.businessName'
                                                ),
                                            }"
                                            data-vv-scope="service"
                                            v-validate="{ required: true }"
                                            data-vv-rules="required"
                                            id="business-name"
                                        />
                                        <span
                                            v-show="
                                                errors.has(
                                                    'service.businessName'
                                                )
                                            "
                                            class="error-text"
                                            >Business/Organization Name</span
                                        >
                                    </div>
                                    <div v-if="form.service.publishedBy=='business'">
                                        <label
                                            for="social-number"
                                            class="form-label text-details"
                                            >Social number</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="socialNumber"
                                            v-model.number="
                                                form.service.socialNumber
                                            "
                                            :class="{
                                                customError: errors.has(
                                                    'service.socialNumber'
                                                ),
                                            }"
                                            data-vv-scope="service"
                                            v-validate="{ required: true }"
                                            data-vv-rules="required"
                                            id="social-number"
                                        />
                                        <span
                                            v-show="
                                                errors.has(
                                                    'service.socialNumber'
                                                )
                                            "
                                            class="error-text"
                                            >Add Social Number</span
                                        >
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div
                    id="policy"
                    class="step-card"
                    v-if="this.progressValue == this.stepsValue.policy"
                >
                    <div class="step-card__title">
                        <h4>Policy</h4>
                    </div>

                    <div class="step-card__content p-3">
                        <p>
                            In order to publish your netapp you need to agree to
                            the Marketplace Policy. <a href="#">Read</a> the
                            document for policy.
                        </p>
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="agreePolicy"
                                v-model="form.policy.agreePolicy"
                                :class="{
                                    customError:
                                        errors.has('policy.agreePolicy'),
                                }"
                                data-vv-scope="policy"
                                v-validate="{ required: true }"
                                data-vv-rules="required"
                                id="agree-policy"
                            />
                            <label class="form-check-label" for="agree-policy">
                                Agree Marketplace policy
                            </label>
                            <span
                                v-show="errors.has('policy.agreePolicy')"
                                class="error-text"
                                >Check mark The Policy</span
                            >
                        </div>
                    </div>
                </div>
                <div
                    id="deployment"
                    class="step-card"
                    v-if="this.progressValue == this.stepsValue.deployment"
                >
                    <div class="step-card__title">
                        <h4>Deployment</h4>
                    </div>

                    <div class="step-card__content p-3">
                        <form class="row g-3">
                            <div>
                                <label
                                    for="netapp-image-url"
                                    class="form-label text-details"
                                    >Copy paste the netapp docker image url from the
                                    Open Repository</label
                                >
                                <input
                                    type="url"
                                    class="form-control"
                                    id="netapp-image-url"
                                    name="imageUrl"
                                    v-model="form.deployment.imageUrl"
                                    :class="{
                                        customError: errors.has(
                                            'deployment.imageUrl'
                                        ),
                                    }"
                                    data-vv-scope="deployment"
                                    v-validate="{
                                        url: { require_protocol: true },
                                        required: true,
                                    }"
                                    data-vv-rules="required"
                                />
                                <span
                                    v-show="errors.has('deployment.imageUrl')"
                                    class="error-text"
                                    >Add image Url of Net App</span
                                >
                            </div>
                            <div>
                                <label
                                    for="report-url"
                                    class="form-label text-details"
                                    >Copy paste the Certification/Validation
                                    report URL</label
                                >
                                <input
                                    type="url"
                                    class="form-control"
                                    id="report-url"
                                    name="report"
                                    v-model="form.deployment.report"
                                    :class="{
                                        customError:
                                            errors.has('deployment.report'),
                                    }"
                                    data-vv-scope="deployment"
                                    v-validate="{
                                        url: { require_protocol: true },
                                        required: true,
                                    }"
                                    data-vv-rules="required"
                                />
                                <span
                                    v-show="errors.has('deployment.report')"
                                    class="error-text"
                                    >Add Certification/Validation report
                                    URL</span
                                >
                            </div>
                            <div>
                                <label
                                    for="docker-size"
                                    class="form-label text-details"
                                    >Enter Docker's image Size (in MBs)</label
                                >
                                <input
                                    type="number"
                                    class="form-control"
                                    id="docker-size"
                                    name="dockerSize"
                                    v-model.number="form.deployment.dockerSize"
                                    :class="{
                                        customError: errors.has(
                                            'deployment.dockerSize'
                                        ),
                                    }"
                                    data-vv-scope="deployment"
                                    v-validate="{
                                        required: true,
                                        numeric: true,
                                    }"
                                    data-vv-rules="required"
                                />
                                <span
                                    v-show="errors.has('deployment.dockerSize')"
                                    class="error-text"
                                    >Enter Docker Size</span
                                >
                            </div>

                            <div class="mb-3">
                                <label
                                    for="deployment-tutorial-pdf"
                                    class="form-label text-details"
                                    >Upload license file
                                </label>
                                <input
                                    class="form-control"
                                    type="file"
                                    id="deployment-tutorial-pdf"
                                />
                            </div>
                        </form>
                    </div>
                </div>
                <div
                    id="tutorial"
                    class="step-card"
                    v-if="this.progressValue == this.stepsValue.tutorial"
                >
                    <div class="step-card__title">
                        <h4>Tutorial</h4>
                    </div>

                    <div class="step-card__content p-3">

                        <p>Please describe how your net app works</p>
                        <p>How can you use it? How dows it work?
                        </p>
                        <div class="col-sm-12">
                            <ckEditor
                                v-model="form.tutorial.docs"
                                name="docs"
                            ></ckEditor>

                            <span v-show="editorError || errors.has('tutorial.docs')" class="error-text"
                                >Please Write some Tutorial Documentation</span
                            >
                        </div>

                        <div class="mb-3">
                            <label
                                for="tutorial-pdf"
                                class="form-label text-details"
                                >Upload tutorial as a pdf</label
                            >
                            <VueDropzone
                                :uploadUrl="
                                    uploadUrl + '/api/upload-file?url=pdf'
                                "
                                extensions=".pdf"
                                v-on:uploadFile="
                                    (value) =>
                                        (this.form.tutorial.pdf =
                                            value.file_name.original.path)
                                "
                            ></VueDropzone>
                            <span v-show="errors.has('tutorial.pdf')" class="error-text"
                                >Upload Tutorial PDF</span
                            >
                        </div>
                    </div>
                </div>
                <div
                    id="pricing"
                    class="step-card"
                    v-if="this.progressValue == this.stepsValue.pricing"
                >
                    <div class="step-card__title">
                        <h4>Pricing</h4>
                    </div>

                    <div id="once-off" class="step-card__content p-3 mb-3">
                        <p>Once-off</p>
                        <p>
                            Charge your customer once-off. Once they pay this
                            amount they will be able to make unlimited calls to
                            your netapp API
                        </p>
                        <div class="choose-cost p-3">
                            <div class="col-md-2">
                                <label
                                    for="choose-cost"
                                    class="form-label text-details"
                                    >Choose Cost</label
                                >
                                <input
                                    type="number"
                                    class="form-control"
                                    id="choose-cost"
                                    placeholder="300 €"
                                    name="price"
                                    v-model.number="form.pricing.price"
                                    :class="{
                                        customError:
                                            errors.has('pricing.price'),
                                    }"
                                    data-vv-scope="pricing"
                                    v-validate="form.payasgo?{}:{
                                        required: true,
                                        numeric: true,
                                    }"
                                    data-vv-rules="required"
                                />
                                <span
                                    v-show="errors.has('pricing.price')"
                                    class="error-text"
                                    >Add Price of NetApp</span
                                >
                            </div>
                        </div>
                    </div>

                    <div id="pay-as-you-go" class="step-card__content p-3">
                        <div>
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="pay"
                                    v-model="form.payasgo"
                                    id="pay"
                                />
                                <label class="form-check-label" for="pay">
                                    Pay as you go pricing
                                </label>
                            </div>
                            <p>
                                Charge your customer either a) a fixed price for
                                a specific number of calls, or b) fixed price
                                per call.
                            </p>
                        </div>
                        <div v-if="form.payasgo">
                            <p>Plan table</p>
                            <div
                                class="plan-table-card pt-3 ps-3 pe-3"
                                v-for="(maindiv, mainIndex) in mainDiv"
                                :key="mainIndex"
                                :style="[
                                    mainIndex !== 0
                                        ? { 'margin-top': '5%' }
                                        : {},
                                ]"
                            >
                                <input
                                    type="url"
                                    class="form-control mb-3"
                                    id="device-location"
                                    placeholder="/get-device-location"
                                    v-model="maindiv.endpointInput"
                                    :name="'payAsGo.' + mainIndex + '.api_url'"
                                    :class="{
                                        customError: errors.has(
                                            'payAsGo.' + mainIndex + '.api_url'
                                        ),
                                    }"
                                    data-vv-scope="pricing"
                                    v-validate="{
                                        url: { require_protocol: true },
                                        required: true,
                                    }"
                                    data-vv-rules="required"
                                />
                                <span
                                    v-show="
                                        errors.has(
                                            'payAsGo.' + mainIndex + '.api_url'
                                        )
                                    "
                                    class="error-text"
                                    >Add an Endpoint</span
                                >
                                <div
                                    class="plan-table-card__form p-3 mb-3"
                                    v-for="(div, index) in maindiv.inputRows"
                                    :key="index"
                                >
                                    <div
                                        class="check-and-trash"
                                        v-if="index !== 0"
                                    >
                                        <i class="fa fa-check"></i> |
                                        <i
                                            class="fa fa-trash"
                                            @click="deleteRow(index, mainIndex)"
                                        ></i>
                                    </div>
                                    <div class="mt-3">
                                        <form class="row g-3">
                                            <div class="col-md-2">
                                                <label
                                                    for="from-calls3"
                                                    class="form-label text-details"
                                                    >From
                                                </label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="from-calls3"
                                                    placeholder="1000+  calls"
                                                    v-model.number="
                                                        div.fromInput
                                                    "
                                                    :name="
                                                        'payAsGo.' +
                                                        mainIndex +
                                                        '.prices.' +
                                                        index +
                                                        '.from'
                                                    "
                                                    :class="{
                                                        customError: errors.has(
                                                            'payAsGo.' +
                                                                mainIndex +
                                                                '.prices.' +
                                                                index +
                                                                '.from'
                                                        ),
                                                    }"
                                                    v-validate="{
                                                        numeric: true,
                                                        required: true,
                                                    }"
                                                    data-vv-rules="required"
                                                    data-vv-scope="pricing"
                                                />
                                                <span
                                                    v-show="
                                                        errors.has(
                                                            'payAsGo.' +
                                                                mainIndex +
                                                                '.prices.' +
                                                                index +
                                                                '.from'
                                                        )
                                                    "
                                                    class="error-text"
                                                    >This Field is
                                                    Required</span
                                                >
                                            </div>
                                            <div class="col-md-2">
                                                <label
                                                    for="to-calls3"
                                                    class="form-label text-details"
                                                    >To
                                                </label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="to-calls3"
                                                    placeholder="∞"
                                                    v-model.number="div.toInput"
                                                    :disabled="
                                                        div.unlimitedInput ==
                                                        true
                                                    "
                                                    :name="
                                                        'payAsGo.' +
                                                        mainIndex +
                                                        '.prices.' +
                                                        index +
                                                        '.to'
                                                    "
                                                    :class="{
                                                        customError: errors.has(
                                                            'payAsGo.' +
                                                                mainIndex +
                                                                '.prices.' +
                                                                index +
                                                                '.to'
                                                        ),
                                                    }"
                                                    v-validate="
                                                        div.unlimitedInput ==
                                                        false
                                                            ? {
                                                                  numeric: true,
                                                                  required: true,
                                                              }
                                                            : {}
                                                    "
                                                    data-vv-rules="required"
                                                    data-vv-scope="pricing"
                                                />
                                                <span
                                                    v-show="
                                                        errors.has(
                                                            'payAsGo.' +
                                                                mainIndex +
                                                                '.prices.' +
                                                                index +
                                                                '.to'
                                                        )
                                                    "
                                                    class="error-text"
                                                    >This Field is
                                                    Required</span
                                                >
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        name="unlimited"
                                                        id="unlimited"
                                                        v-model="
                                                            div.unlimitedInput
                                                        "
                                                    />
                                                    <label
                                                        class="form-check-label"
                                                        for="unlimited"
                                                    >
                                                        unlimited
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label
                                                    for="category-fee3"
                                                    class="form-label text-details"
                                                    >Category fee</label
                                                >
                                                <select
                                                    id="category-fee3"
                                                    class="form-select"
                                                    v-model="div.categoryInput"
                                                    :name="
                                                        'payAsGo.' +
                                                        mainIndex +
                                                        '.prices.' +
                                                        index +
                                                        '.category'
                                                    "
                                                     :class="{
                                                        customError: errors.has(
                                                            'payAsGo.' +
                                                                mainIndex +
                                                                '.prices.' +
                                                                index +
                                                                '.category'
                                                        ),
                                                    }"
                                                    v-validate="{
                                                        required: true,
                                                    }"
                                                    data-vv-rules="required"
                                                    data-vv-scope="pricing"
                                                >
                                                    <option
                                                        v-for="(cateogry,index) in planCategory"
                                                        class="text-note"
                                                        :value="cateogry.key"
                                                        :key="index"
                                                    >
                                                        {{cateogry.value}}
                                                    </option>

                                                </select>
                                                 <span
                                                    v-show="
                                                        errors.has(
                                                            'payAsGo.' +
                                                                mainIndex +
                                                                '.prices.' +
                                                                index +
                                                                '.category'
                                                        )
                                                    "
                                                    class="error-text"
                                                    >Cost Field is
                                                    Required</span
                                                >
                                            </div>
                                            <div class="col-md-4">
                                                <label
                                                    for="cost-netapp"
                                                    class="form-label text-details"
                                                    >Cost</label
                                                >
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="cost-netapp"
                                                    placeholder="0.005e/call"
                                                    v-model="div.costInput"
                                                    :name="
                                                        'payAsGo.' +
                                                        mainIndex +
                                                        '.prices.' +
                                                        index +
                                                        '.cost'
                                                    "
                                                    :class="{
                                                        customError: errors.has(
                                                            'payAsGo.' +
                                                                mainIndex +
                                                                '.prices.' +
                                                                index +
                                                                '.cost'
                                                        ),
                                                    }"
                                                    v-validate="{
                                                        numeric: true,
                                                        required: true,
                                                    }"
                                                    data-vv-rules="required"
                                                    data-vv-scope="pricing"
                                                />
                                                <span
                                                    v-show="
                                                        errors.has(
                                                            'payAsGo.' +
                                                                mainIndex +
                                                                '.prices.' +
                                                                index +
                                                                '.cost'
                                                        )
                                                    "
                                                    class="error-text"
                                                    >Cost Field is
                                                    Required</span
                                                >
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div
                                    class="plan-table-card__add p-2 text-center"
                                >
                                    <a @click="addRow(maindiv.id)"
                                        ><i class="fas fa-plus-circle"></i>
                                        Add</a
                                    >
                                </div>
                            </div>
                            <br />
                            <div
                                class="new-table mt-3 p-2 text-center"
                                @click="addDiv"
                            >
                                Add new plan table
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step-actions mt-5">
                    <a href="#">Cancel Process</a>
                    <div
                        class="btn btn--blue ms-5"
                        type="button"
                        @click="Validation"
                    >
                        <span v-if="this.progressValue < 100"> Next</span>
                        <span v-else>Create</span>
                    </div>

                    <div class="mt-5">
                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <Modal :open="this.showModal"></Modal>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import ckEditor from "./common/CkEditor";
import VoerroTagsInput from "@voerro/vue-tagsinput";
import VueDropzone from "./common/DropZone";
import Modal from "./common/SuccessModal";
import axios from "axios";
console.log("process env",process.env);
export default {
    name: "createnetapp",
    components: { ckEditor, VoerroTagsInput, VueDropzone, Modal },
    props: {
        categories: { type: Array, default: () => [] },
        types: { type: Array, default: () => [] },
    },
    data() {
        return {
            divIndex: 1,
            inputIndex: 1,
            RowInputs: {
                fromInput: null,
                toInput: null,
                unlimitedInput: false,
                costInput: null,
                categoryInput: null,
            },
            planCategory:[{key:"percall",value:"Per call"},{key:"fix",value:"Fixed"}],
            tagsOption: [
                { key: "location-monitoring", value: "Location Monitoring" },
                { key: "QoS", value: "QoS" }

            ],
            mainDiv: [
                {
                    id: 0,
                    name: "mainDiv0",
                    endpointInput: null,
                    inputRows: [
                        {
                            id: 0,
                            name: "mainDiv-row0",
                           ...this.RowInputs
                        },
                    ],
                },
            ],
            uploadUrl: process.env.MIX_API_URL,
            editorError: false,
            showModal: false,
            pdfError: false,
            logoError: false,
            stepsValue: {
                service: 0,
                policy: 22,
                deployment: 50,
                tutorial: 75,
                pricing: 100,
            },
            progressValue: 0,
            pricing: [{ endpoint0: null, from0: null, to0: null }],
            form: {
                payasgo: false,
                service: {
                    type: null,
                    tag: [],
                    tags:[],
                    name: null,
                    about: null,
                    category: null,
                    logo: null,
                    version: null,
                    publishedBy: null,
                    businessName: null,
                    socialNumber: null,
                },
                deployment: {
                    imageUrl: null,
                    dockerSize: null,
                    report: null,
                },
                policy: { agreePolicy: null },
                tutorial: {
                    docs: null,
                    pdf: null,
                },
                pricing: {
                    price: null,
                    payAsGo: null,
                },
            },
        };
    },

    methods: {
        Validation() {
            if (this.progressValue == this.stepsValue.service) {
                this.$validator.validate("service.*").then((isValid) => {
                    if (this.form.service.logo == null) {
                     this.errors.add({field:"service.logo",msg:"Please Add a Logo Image"})
                    }
                    if (isValid && this.form.service.logo !== null) {
                        this.progressValue = this.stepsValue.policy;
                    }
                });
            }
            if (this.progressValue == this.stepsValue.policy) {
                this.$validator.validate("policy.*").then((isValid) => {
                    if (isValid) {
                        this.progressValue = this.stepsValue.deployment;
                    }
                });
            }
            if (this.progressValue == this.stepsValue.deployment) {
                this.$validator.validate("deployment.*").then((isValid) => {
                    if (isValid) {
                        this.progressValue = this.stepsValue.tutorial;
                    }
                });
            }
            if (this.progressValue == this.stepsValue.tutorial) {
                this.$validator.validate("tutorial.*").then((isValid) => {
                    if (
                        isValid &&
                        this.form.tutorial.pdf !== null &&
                        (this.form.tutorial.docs !== null ||
                            this.form.tutorial.docs !== "")
                    ) {
                        this.progressValue = this.stepsValue.pricing;
                    } else {
                        if (this.form.tutorial.pdf == null) {
                          this.errors.add({field:"tutorial.pdf",msg:"Add Tutorial File"})
                        }
                        if (
                            this.form.tutorial.docs == null ||
                            this.form.tutorial.docs == ""
                        ) {
                           this.errors.add({field:"tutorial.docs",msg:"Add Tutorial Descrption"})
                        }
                    }
                });
            }
            if (this.progressValue == this.stepsValue.pricing) {
                this.$validator.validate("pricing.*").then((isValid) => {
                    if (isValid) {
                        this.processForm();
                    }
                });
            }
        },
        addRow(index) {
            let maindiv = this.search(index, this.mainDiv);
            maindiv.inputRows.push({
                id: this.inputIndex,
                name: "mainDiv-row" + index,
                ...this.RowInputs

            });
            this.inputIndex++;
        },
        deleteRow(inputIndex, mainDivIndex) {
            this.mainDiv[mainDivIndex].inputRows.splice(inputIndex, 1);
        },
        addDiv() {
            this.mainDiv.push({
                id: this.divIndex,
                name: "mainDiv" + this.divIndex,
                endpointInput: null,
                inputRows: [
                    {
                        id: this.inputIndex,
                        name: "mainDiv-row0",
                       ...this.RowInputs

                    },
                ],
            });

            this.inputIndex += 1;
            this.divIndex++;
        },
        deleteDiv(ref) {
            this.mainDiv.splice(index, 1);
        },
        search(key, inputArray) {
            for (let i = 0; i < inputArray.length; i++) {
                if (inputArray[i].id === key) {
                    return inputArray[i];
                }
            }
        },
        processForm() {
            if(this.form.payasgo){
                let price = this.mainDiv.map((value, index) => {
                return {
                    api_url: value.endpointInput,
                    prices: value.inputRows.map((price, priceIndex) => {
                        if (price.unlimitedInput) {
                            return {
                                from: price.fromInput,
                                to: 0,
                                unlimited: price.unlimitedInput,
                                cost:price.costInput,
                                plan_category: price.categoryInput

                            };
                        }
                        return {
                            from: price.fromInput,
                            to: price.toInput,
                            unlimited: price.unlimitedInput,
                            cost:price.costInput,
                            plan_category: price.categoryInput

                        };
                    }),
                };
            });
             this.form.payAsGo = [...price];
             this.form.pricing.price=0;
            }


            axios
                .post("api/create-netapp", this.form)
                .then((respnose) => {
                    if (respnose.data.error) {
                        this.$toastr.e("internal Server Error");
                    } else {
                        this.showModal = true;
                    }
                })
                .catch((err) => {
                    this.$toastr.defaultPosition = "toast-top-center";
                    this.$toastr.e(err.response.data.message);
                    let errors = err.response.data.errors;
                    for (let key in errors) {
                        console.log(key);
                        this.errors.add({
                            field: key,
                            msg: [...errors[key]],
                        });
                    }
                      this.progressValue = 0;
                });
        },

        backToPrevious(value) {
            if (value < this.progressValue) {
                this.progressValue = value;
            }
        },
    },
};
</script>
<style></style>

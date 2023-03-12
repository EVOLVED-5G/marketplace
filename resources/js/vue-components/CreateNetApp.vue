<template>
    <div class="dashboard-content">
        <div class="content d-flex">
            <div id="stepper" class="dashboard-right-content flex-fill">
                <h3>Create new Network App</h3>
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
                  this.progressValue > this.stepsValue.service ? true : false
                "
                                @click="backToPrevious(stepsValue.service)"
                                aria-controls="collapseOne"
                            >
                                <i
                                    class="fas fa-check"
                                    v-if="this.progressValue > this.stepsValue.service"
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
                  this.progressValue > this.stepsValue.policy ? true : false
                "
                                aria-controls="collapseTwo"
                            >
                                <i
                                    class="fas fa-check"
                                    v-if="this.progressValue > this.stepsValue.policy"
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
                  this.progressValue > this.stepsValue.deployment ? true : false
                "
                                aria-controls="collapseThree"
                            >
                                <i
                                    class="fas fa-check"
                                    v-if="this.progressValue > this.stepsValue.deployment"
                                ></i>
                                <p v-else>3</p>
                            </button>
                            <div class="step-title">
                                <p class="text-note mb-0">Deployment</p>
                                <p class="text-details">Choose deployment setup</p>
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
                  this.progressValue >= this.stepsValue.tutorial ? true : false
                "
                                aria-controls="collapseFour"
                            >
                                <i
                                    class="fas fa-check"
                                    v-if="this.progressValue > this.stepsValue.tutorial"
                                ></i>
                                <p v-else>4</p>
                            </button>
                            <div class="step-title">
                                <p class="text-note mb-0">Tutorial</p>
                                <p class="text-details">Choose deployment setup</p>
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
                  this.progressValue == this.stepsValue.pricing ? true : false
                "
                                aria-controls="collapseFive"
                            >
                                <i
                                    class="fas fa-check"
                                    v-if="this.progressValue >= this.stepsValue.pricing"
                                ></i>
                                <p v-else>5</p>
                            </button>
                            <div class="step-title">
                                <p class="text-note mb-0">Pricing</p>
                                <p class="text-details">Choose pricing plan</p>
                            </div>
                        </div>
                    </div>
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
                                <label for="netapp-name" class="form-label text-details"
                                >Network App name</label
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

                                <span v-show="errors.has('service.name')" class="error-text"
                                >Please Enter a name</span
                                >
                            </div>
                            <div>
                                <label for="about-netapp" class="form-label text-details"
                                >About</label
                                >
                                <textarea
                                    type="text"
                                    class="form-control"
                                    id="about-netapp"
                                    name="about"
                                    v-model="form.service.about"
                                    placeholder="..."
                                    :class="{
                    customError: errors.has('service.about'),
                  }"
                                    data-vv-scope="service"
                                    v-validate="{ required: true }"
                                    data-vv-rules="required"
                                ></textarea>
                                <span v-show="errors.has('service.about')" class="error-text"
                                >Please Fill this field</span
                                >
                            </div>

                            <div class="col-md-6">
                                <label for="type-of-netapp" class="form-label text-details"
                                >Type of Network App</label
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
                                <span v-show="errors.has('service.type')" class="error-text"
                                >Select atleast One Service Type</span
                                >
                            </div>
                            <div class="col-md-6">
                                <label for="category-of-netapp" class="form-label text-details"
                                >Category of Network App</label
                                >
                                <select
                                    id="category-of-netapp"
                                    class="form-select"
                                    v-model="form.service.category"
                                    name="category"
                                    :class="{
                    customError: errors.has('service.category'),
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
                                <span v-show="errors.has('service.category')" class="error-text"
                                >Select atleast one Service Category</span
                                >
                            </div>
                            <div class="col-md-12">
                                <label for="version-of-netapp" class="form-label text-details"
                                >Version</label
                                >
                                <input
                                    type="number"
                                    class="form-control"
                                    id="version-of-netapp"
                                    name="version"
                                    v-model="form.service.version"
                                    :class="{
                    customError: errors.has('service.version'),
                  }"
                                    data-vv-scope="service"
                                    v-validate="{ required: true, decimal: true }"
                                    data-vv-rules="required"
                                    placeholder="1.0"
                                />
                                <span v-show="errors.has('service.version')" class="error-text"
                                >Add Service Version</span
                                >
                            </div>
                            <div class="col-md-12">
                                <label for="version-of-netapp" class="form-label text-details"
                                >Add a tag name<br/><i
                                >Help your Network App be more distinguished so that it can be
                                    found easier. Add tag names that you want to characterize
                                    your Network App.</i
                                ></label
                                >
                                <VoerroTagsInput
                                    element-id="tags"
                                    v-model="form.service.tag"
                                    :existing-tags="tagsOption"
                                    :typeahead="true"
                                ></VoerroTagsInput>
                                <span v-show="errors.has('service.tag')" class="error-text"
                                >Select atleast one Tag</span
                                >
                                <span v-show="errors.has('service.tags')" class="error-text"
                                >Select atleast one Tag asdf</span
                                >
                            </div>
                            <div class="col-md-12">
                                <div class="form_field_main">
                                    <div class="tooltip">
                                        <label style="margin-right: 5px">URL Slug </label
                                        ><i class="fas fa-question-circle"></i> <br/><span
                                        class="tooltiptext"
                                    >
                      <small>
                        For example (my-network-app) <br/>
                        This will make your Network App available at
                        {{ this.appurl }}/my-network-app. You should use only
                        alphanumeric characters, underscores (_) or dashes
                        (-).</small
                      ></span
                                    >
                                    </div>

                                    <div class="align_url_field">
                                        <input
                                            type="text"
                                            style="display: none"
                                            :placeholder="this.appurl"
                                            name=""
                                            class="form-control"
                                        />
                                        <input
                                            type="text"
                                            placeholder="your-net-app-url"
                                            class="form-control"
                                            v-model="form.service.appSlug"
                                            :class="{
                        customError: errors.has('service.appSlug'),
                      }"
                                            data-vv-scope="service"
                                            name="appSlug"
                                            v-validate="{
                        required: true,
                      }"
                                        />
                                    </div>
                                    <span
                                        v-show="errors.has('service.appSlug')"
                                        class="error-text"
                                    >Slug is alread Exists</span
                                    >
                                </div>
                            </div>
                            <div>
                                <label for="about-netapp" class="form-label text-details"
                                >View more (Marketing page) url site<br/><i
                                >Do you have an external page/URL hat demonstrates your
                                    NetApp (for example in your company's website)? Paste it
                                    below:</i
                                ></label
                                >
                                <input
                                    type="url"
                                    class="form-control"
                                    id="netapp-url"
                                    v-model="form.service.marketing_url"
                                />
                                <span
                                    v-show="errors.has('service.marketing_url')"
                                    class="error-text"
                                >Invalid Url</span
                                >
                            </div>
                            <div class="mb-3">
                                <label for="logo-netapp" class="form-label text-details"
                                >NetApp logo</label
                                >
                                <VueDropzone
                                    id="logo-netapp"
                                    :uploadUrl="uploadUrl + '/api/upload-file?url=logo'"
                                    extensions=".jpg, .jpeg, .png, .webp"
                                    v-on:uploadFile="
                    (value) =>
                      (this.form.service.logo = value.file_name.original.path)
                  "
                                ></VueDropzone>
                                <span v-show="errors.has('service.logo')" class="error-text"
                                >Please Choose Logo Image</span
                                >
                            </div>

                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 text-details">
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
                      customError: errors.has('service.publishedBy'),
                    }"
                                        data-vv-scope="service"
                                        v-validate="{ required: true }"
                                        data-vv-rules="required"
                                    />
                                    <label class="form-check-label" for="publish-as-user">
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
                      customError: errors.has('service.publishedBy'),
                    }"
                                        data-vv-scope="service"
                                        v-validate="{ required: true }"
                                        data-vv-rules="required"
                                    />
                                    <label class="form-check-label" for="publish-as-business">
                                        Business/Organization
                                    </label>
                                    <span
                                        v-show="errors.has('service.publishedBy')"
                                        class="error-text"
                                    >Select Publisher</span
                                    >
                                    <div v-if="form.service.publishedBy == 'business'">
                                        <label for="business-name" class="form-label text-details"
                                        >Business/Organization Name</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="businessName"
                                            v-model="form.service.businessName"
                                            :class="{
                        customError: errors.has('service.businessName'),
                      }"
                                            data-vv-scope="service"
                                            v-validate="{ required: true }"
                                            data-vv-rules="required"
                                            id="business-name"
                                            :readOnly="business !== null"
                                        />
                                        <span
                                            v-show="errors.has('service.businessName')"
                                            class="error-text"
                                        >Business/Organization Name</span
                                        >
                                    </div>
                                    <div v-if="form.service.publishedBy == 'business'">
                                        <label for="social-number" class="form-label text-details"
                                        >Social number</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="socialNumber"
                                            v-model.number="form.service.socialNumber"
                                            :class="{
                        customError: errors.has('service.socialNumber'),
                      }"
                                            data-vv-scope="service"
                                            v-validate="{ required: true }"
                                            data-vv-rules="required"
                                            id="social-number"
                                            :readOnly="social !== null"
                                        />
                                        <span
                                            v-show="errors.has('service.socialNumber')"
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
                            In order to publish your netapp you need to agree to the
                            Marketplace Policy. <a @click="this.readPrivacy">Read</a> the
                            document for policy.
                        </p>
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="agreePolicy"
                                v-model="form.policy.agreePolicy"
                                :class="{
                  customError: errors.has('policy.agreePolicy'),
                }"
                                data-vv-scope="policy"
                                v-validate="{ required: true }"
                                data-vv-rules="required"
                                id="agree-policy"
                            />
                            <label class="form-check-label" for="agree-policy">
                                I Agree to the Marketplace policy
                            </label>
                            <span v-show="errors.has('policy.agreePolicy')" class="error-text"
                            >Check mark The Policy</span
                            >
                            <span
                                v-show="this.readPrivacyError !== null"
                                class="error-text"
                            >{{ this.readPrivacyError }}</span
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
                                <label for="netapp-github-url" class="form-label text-details"
                                >Please paste the GitHub url of your NetApp:</label>
                                <input
                                    type="url"
                                    class="form-control"
                                    id="netapp-github-url"
                                    name="githubURL"
                                    placeholder="(ex.https://github.com/EVOLVED-5G/FogusNetApp)"
                                    v-model="form.deployment.githubURL"
                                    @paste="setDockerImageURLValue"
                                    @input="setDockerImageURLValue"
                                    :class="{
                    customError: errors.has('deployment.githubURL'),
                  }"
                                    data-vv-scope="deployment"
                                    v-validate="{
                    url: { require_protocol: true },
                    required: true,
                  }"
                                    data-vv-rules="required"
                                />
                                <span
                                    v-show="errors.has('deployment.githubURL')"
                                    class="error-text"
                                >Add GitHub URL of Network App</span
                                >
                                <label for="netapp-fingerprint-code" class="form-label text-details"
                                >Please copy paste the certification fingerprint code you
                                    received when you deployed your Network app</label>
                                <input
                                    type="url"
                                    class="form-control"
                                    id="netapp-fingerprint-code"
                                    name="fingerprint_code"
                                    placeholder="(ex. 7661ba1f-5a7a-4990-85fb-f7a53e6f40f3)"
                                    v-model="form.deployment.fingerprint_code"
                                    :class="{
                    customError: errors.has('deployment.fingerprint_code'),
                  }"
                                    data-vv-scope="deployment"
                                    v-validate="{
                    required: true,
                  }"
                                    data-vv-rules="required"
                                />
                                <span
                                    v-show="errors.has('deployment.fingerprint_code')"
                                    class="error-text"
                                >The fingerprint code is invalid.</span
                                >
                            </div>
                            <div class="d-none">
                                <label for="netapp-image-url" class="form-label text-details">Open Repository Docker
                                    image url for the Netapp</label>
                                <input
                                    disabled
                                    type="url"
                                    class="form-control"
                                    id="netapp-image-url"
                                    name="imageUrl"
                                    v-model="form.deployment.docker_image_url"
                                    :class="{
                            customError: errors.has('deployment.docker_image_url'),
                        }"
                                    data-vv-scope="deployment"
                                    v-validate="{
                    url: { require_protocol: true },
                    required: true,
                  }"
                                    data-vv-rules="required"
                                />
                                <span
                                    v-show="errors.has('deployment.docker_image_url')"
                                    class="error-text"
                                >Add Docker image Url of Network App</span>
                            </div>
                            <div class="mb-3">
                                <label
                                    for="deployment-tutorial-pdf"
                                    class="form-label text-details"
                                >Upload license file (as a pdf)
                                </label>
                                <VueDropzone
                                    :uploadUrl="uploadUrl + '/api/upload-file?url=pdf'"
                                    extensions=".pdf"
                                    v-on:file-dropped="this.changeUploadStatus"
                                    v-on:uploadFile="
                    (value) =>
                      (this.form.deployment.licensefile =
                        value.file_name.original.path)
                  "
                                ></VueDropzone>
                                <span
                                    v-show="errors.has('deployment.licensefile')"
                                    class="error-text"
                                >Please Wait for the File to be Uploaded</span
                                >
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
                        <p>Please describe in detail your Network App.</p>
                        <p>Add a title/description here for the tutorial.</p>
                        <br/>
                        <p>
                            Make sure you present a list of the technologies that are used in
                            your docker package.
                        </p>
                    </div>

                    <div class="step-card__content p-3">
                        <p>Build your own tutorial editing the form below.</p>

                        <div class="col-sm-10">
                            <ckEditor
                                v-model="form.tutorial.docs"
                                name="docs"
                                placeholder="..."
                                :class="{
                  customError: errors.has('tutorial.docs'),
                }"
                                data-vv-scope="tutorial"
                                v-validate="{ required: true }"
                                data-vv-rules="required"
                            ></ckEditor>

                            <span v-show="errors.has('tutorial.docs')" class="error-text"
                            >Please Write some Tutorial Documentation</span
                            >
                        </div>

                        <div class="mb-3">
                            <label for="tutorial-pdf" class="form-label text-details"
                            >Upload tutorial as a pdf</label
                            >
                            <VueDropzone
                                :uploadUrl="uploadUrl + '/api/upload-file?url=pdf'"
                                extensions=".pdf"
                                v-on:uploadFile="
                  (value) =>
                    (this.form.tutorial.pdf = value.file_name.original.path)
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
                        <input
                            class="form-check-input"
                            type="radio"
                            name="pay"
                            value="onceoff"
                            v-model="form.paymentplan"
                            id="pay"
                        />
                        <p>Once-off</p>
                        <p>
                            Charge your customer once-off. Once they pay this amount they will
                            be able to make unlimited calls to your netapp API
                        </p>
                        <div class="choose-cost p-3">
                            <div class="col-md-2">
                                <label for="choose-cost" class="form-label text-details"
                                >Choose Cost</label
                                >
                                <input
                                    type="number"
                                    class="form-control"
                                    id="choose-cost"
                                    placeholder="300 €"
                                    name="price"
                                    :disabled="form.paymentplan == 'paymentplan'"
                                    v-model.number="form.pricing.price"
                                    :class="{
                    customError: errors.has('pricing.price'),
                  }"
                                    data-vv-scope="pricing"
                                    v-validate="
                    form.paymentplan == 'onceoff'
                      ? {
                          required: true,
                          numeric: true,
                        }
                      : {}
                  "
                                    data-vv-rules="required"
                                />
                                <span v-show="errors.has('pricing.price')" class="error-text"
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
                                    type="radio"
                                    name="pay"
                                    v-model="form.paymentplan"
                                    id="pay"
                                    value="paymentplan"
                                />
                                <label class="form-check-label" for="pay">
                                    Pay as you go pricing
                                </label>
                            </div>
                            <p>
                                Charge your customer either a) a fixed price for a specific
                                number of calls, or b) fixed price per call.
                            </p>
                        </div>
                        <div
                            :style="[
                form.paymentplan == 'onceoff'
                  ? { 'pointer-events': 'none' }
                  : {},
              ]"
                        >
                            <p>Plan table</p>
                            <div
                                class="plan-table-card pt-3 ps-3 pe-3"
                                v-for="(maindiv, mainIndex) in mainDiv"
                                :key="mainIndex"
                                :style="[mainIndex !== 0 ? { 'margin-top': '5%' } : {}]"
                            >
                                <div class="check-and-trash" v-if="mainIndex !== 0">
                                    <i class="fa fa-check"></i> |
                                    <i class="fa fa-trash" @click="deleteDiv(mainIndex)"></i>
                                </div>
                                <input
                                    type="url"
                                    class="form-control mb-3"
                                    id="device-location"
                                    placeholder="/endpoint-that-should-be-charged"
                                    v-model="maindiv.endpointInput"
                                    :name="'payAsGo.' + mainIndex + '.api_url'"
                                    :class="{
                    customError: errors.has(
                      'payAsGo.' + mainIndex + '.api_url'
                    ),
                  }"
                                    data-vv-scope="pricing"
                                    v-validate="
                    form.paymentplan == 'paymentplan'
                      ? {
                          required: true,
                        }
                      : {}
                  "
                                    data-vv-rules="required"
                                />
                                <span
                                    v-show="errors.has('payAsGo.' + mainIndex + '.api_url')"
                                    class="error-text"
                                >Add a Valid Endpoint</span
                                >
                                <div
                                    class="plan-table-card__form p-3 mb-3"
                                    v-for="(div, index) in maindiv.inputRows"
                                    :key="index"
                                >
                                    <div class="check-and-trash" v-if="index !== 0">
                                        <i class="fa fa-check"></i> |
                                        <i
                                            class="fa fa-trash"
                                            @click="deleteRow(index, mainIndex)"
                                        ></i>
                                    </div>
                                    <div class="mt-3">
                                        <form class="row g-3">
                                            <div class="col-md-2">
                                                <label for="from-calls3" class="form-label text-details"
                                                >From
                                                </label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="from-calls3"
                                                    placeholder="1000+  calls"
                                                    v-model.number="div.fromInput"
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
                                                    :disabled="form.paymentplan == 'onceoff'"
                                                    v-validate="
                            form.paymentplan == 'paymentplan'
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
                                '.from'
                            )
                          "
                                                    class="error-text"
                                                >This Field is Required</span
                                                >
                                            </div>
                                            <div class="col-md-2">
                                                <label for="to-calls3" class="form-label text-details"
                                                >To
                                                </label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="to-calls3"
                                                    placeholder="∞"
                                                    v-model.number="div.toInput"
                                                    :disabled="div.unlimitedInput == true"
                                                    :name="
                            'payAsGo.' + mainIndex + '.prices.' + index + '.to'
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
                            div.unlimitedInput == false
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
                                                >This Field is Required</span
                                                >
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        name="unlimited"
                                                        id="unlimited"
                                                        :disabled="form.paymentplan !== 'paymentplan'"
                                                        v-model="div.unlimitedInput"
                                                    />
                                                    <label class="form-check-label" for="unlimited">
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
                                                    :disabled="form.paymentplan == 'onceoff'"
                                                    :class="{
                            customError: errors.has(
                              'payAsGo.' +
                                mainIndex +
                                '.prices.' +
                                index +
                                '.category'
                            ),
                          }"
                                                    v-validate="
                            form.paymentplan == 'paymentplan'
                              ? {
                                  required: true,
                                }
                              : {}
                          "
                                                    data-vv-rules="required"
                                                    data-vv-scope="pricing"
                                                >
                                                    <option
                                                        v-for="(cateogry, index) in planCategory"
                                                        class="text-note"
                                                        :value="cateogry.key"
                                                        :key="index"
                                                    >
                                                        {{ cateogry.value }}
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
                                                >Cost Field is Required</span
                                                >
                                            </div>
                                            <div class="col-md-4">
                                                <label for="cost-netapp" class="form-label text-details"
                                                >Cost</label
                                                >
                                                <input
                                                    type="number"
                                                    step=".0001"
                                                    class="form-control"
                                                    id="cost-netapp"
                                                    placeholder="ex: 0.005€"
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
                                                    v-validate="
                            form.paymentplan == 'paymentplan'
                              ? {
                                  decimal: 4,
                                }
                              : {}
                          "
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
                                                >{{
                                                        errors.first(
                                                            "payAsGo." +
                                                            mainIndex +
                                                            ".prices." +
                                                            index +
                                                            ".cost"
                                                        )
                                                    }}</span
                                                >
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="plan-table-card__add p-2 text-center">
                                    <a @click="addRow(maindiv.id)"
                                    ><i class="fas fa-plus-circle"></i> Add</a
                                    >
                                </div>
                            </div>
                            <br/>
                            <div class="new-table mt-3 p-2 text-center" @click="addDiv">
                                Add new plan table
                            </div>
                        </div>
                    </div>
                </div>

                <div class="step-actions mt-5">
                    <div class="container-fluid p-0">
                        <div class="row mb-2">
                            <div class="col">
                                <p class="text-danger" v-if="generalFormError"><b>Error:</b> <span
                                    v-html="generalFormError"></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-12 text-start mb-4">
                                <a style="font-weight: bold" :href="getDashboardRoute()"
                                >Cancel Process</a
                                >
                            </div>
                            <div class="col-lg-9 text-lg-end text-md-start">
                                <div
                                    v-if="this.progressValue > 0"
                                    class="btn btn--tertiary mb-4"
                                    type="button"
                                    @click="goToPreviousStep"
                                >
                                    Previous
                                </div>
                                <div
                                    class="btn btn--blue ms-sm-3 mb-4"
                                    type="button"
                                    @click="Validation"
                                >
                                    <span v-if="this.progressValue < 100"> Next</span>
                                    <span v-else>Create</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <Modal
                            :open="this.showModal"
                            :netappId="this.netappId"
                            :link="'/edit-netapp/' + this.netappId"
                        >
                            <h1>Your NetApp has been created!</h1>
                            <p>
                                At this moment your NetApp is not visible to the Product
                                Catalogue. You can change its status to Public in the Edit page
                            </p>
                        </Modal>
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

export default {
    name: "createnetapp",
    components: {ckEditor, VoerroTagsInput, VueDropzone, Modal},
    props: {
        categories: {type: Array, default: () => []},
        types: {type: Array, default: () => []},
        privacy_url: {type: String},
        business: {type: String, default: () => null},
        social: {type: String, default: () => null},
    },
    data() {
        return {
            generalFormError: null,
            uploadLicenseFile: false,
            divIndex: 1,
            inputIndex: 1,
            checkPrivacy: false,
            readPrivacyError: null,
            netappId: null,
            RowInputs: {
                fromInput: null,
                toInput: null,
                unlimitedInput: false,
                costInput: 0,
                categoryInput: null,
            },
            planCategory: [
                {key: "percall", value: "Per call"},
                {key: "fix", value: "Fixed"},
            ],
            tagsOption: [
                {key: "location-monitoring", value: "location monitoring"},
                {key: "swagger", value: "swagger"},
                {key: "easy-to-use", value: "easy to use"},
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
                            ...this.RowInputs,
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
            pricing: [{endpoint0: null, from0: null, to0: null}],
            form: {
                paymentplan: "onceoff",
                service: {
                    appSlug: null,
                    type: null,
                    marketing_url: null,
                    tag: [],
                    tags: [],
                    name: null,
                    about: null,
                    category: null,
                    logo: null,
                    version: null,
                    publishedBy: null,
                    businessName: this.business,
                    socialNumber: this.social,
                },
                deployment: {
                    githubURL: null,
                    licensefile: null,
                    docker_image_url: null,
                    fingerprint_code: null,
                },
                policy: {agreePolicy: null},
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

    mounted() {
        // this.form.service.name = "Test netapp";
        // this.form.service.appSlug = "test-netapp-1";
        // this.form.service.version= "1.0";
        // this.form.service.about = "Test about";
        // this.form.service.type = 1;
        // this.form.service.category = 1;
        // this.form.service.publishedBy = "user";
        // this.form.service.logo = "http://localhost:8001/assets/netapp/logo/1667397410.jpgflower.png";
        // this.form.deployment.licensefile = "http://localhost:8001/assets/netapp/logo/1667397410.jpgflower.png";
        // this.form.deployment.githubURL = "https://github.com/scify/Mentorship-matching-backend";
        // this.form.deployment.fingerprint_code = "test123";
    },

    methods: {
        getErrorMessage(error) {
            if (error.response) {
                // The request was made and the server responded with a status code
                // that falls out of the range of 2xx
                const message = error.response.data ? error.response.data.message : error.response.data;
                return error.response.status + " " + message;
            }
            // Something happened in setting up the request that triggered an Error
            return error.message;
        },
        getDashboardRoute() {
            return route("welcome-dashboard");
        },
        getEditNetappRoute() {
            return route("edit-netapp", this.netappId);
        },
        changeUploadStatus() {
            this.uploadLicenseFile = true;
        },
        windowScroll() {
            window.scrollTo({
                top: 100,
                left: 100,
                behavior: "smooth",
            });
        },
        readPrivacy() {
            //window.open("/privacy-policy", "_blank");
            window.open("https://docs.google.com/document/d/1KRh0FJYKRkgoACg7ivITPIWoQ1A1KhAC/edit#", "_blank");
            this.checkPrivacy = true;
            this.readPrivacyError = null;
        },
        setDockerImageURLValue() {
            this.form.deployment.docker_image_url = process.env.MIX_NETAPP_OPEN_REPOSITORY_DOCKER_IMAGE_BASE_URL
                + this.getNetappNameFromGitHubURL() + "/images:" + this.form.service.version;
        },
        getNetappNameFromGitHubURL() {
            return this.form.deployment.githubURL.split("/").pop();
        },
        Validation() {
            if (this.progressValue === this.stepsValue.service) {
                this.$validator.validate("service.*").then((isValid) => {
                    this.handleLoader("show");
                    axios
                        .post("api/slug-validation", {slug: this.form.service.appSlug})
                        .then((respnose) => {
                            this.handleLoader("hide");
                            if (respnose.data.message === "success") {
                                if (this.form.service.logo == null) {
                                    this.errors.add({
                                        field: "service.logo",
                                        msg: "Please Add a Logo Image",
                                    });
                                }
                                if (isValid && this.form.service.logo !== null) {
                                    this.errors.remove("service.logo");
                                    this.progressValue = this.stepsValue.policy;
                                    this.windowScroll();
                                }
                            }
                        })
                        .catch((err) => {
                            this.handleLoader("hide");
                            this.errors.add({
                                field: "service.appSlug",
                                msg: "Slug is Already Exists",
                            });
                        });
                });
            }
            if (this.progressValue === this.stepsValue.policy) {
                this.$validator.validate("policy.*").then((isValid) => {
                    if (isValid) {
                        this.progressValue = this.stepsValue.deployment;
                    } else {
                        this.readPrivacyError = "Please Read the privacy policy before";
                    }
                });
            }
            if (this.progressValue === this.stepsValue.deployment) {
                this.$validator.validate("deployment.*").then((isValid) => {
                    if (
                        this.uploadLicenseFile == true &&
                        this.form.deployment.licensefile == null
                    ) {
                        this.errors.add({
                            field: "deployment.licensefile",
                            msg: "File is uploading...",
                        });
                    } else {
                        if (isValid) {
                            this.generalFormError = null;
                            this.handleLoader("show");
                            axios.defaults.withCredentials = true;
                            axios
                                .get(route("validate-url") + "?url=" + this.form.deployment.githubURL)
                                .then((response) => {
                                    if (response.status >= 200 && response.status < 400) {
                                        axios
                                            .get(route("netapp.fingerprint-check")
                                                + "?netapp_name=" + this.getNetappNameFromGitHubURL()
                                                + "&version=" + this.form.service.version
                                                + "&fingerprint_code=" + this.form.deployment.fingerprint_code)
                                            .then((response) => {
                                                if (response.data.success) {
                                                    this.setDockerImageURLValue();
                                                    this.progressValue = this.stepsValue.tutorial;
                                                } else {
                                                    this.generalFormError = "The Fingerprint code is invalid.";
                                                    this.errors.add({
                                                        field: "deployment.fingerprint_code",
                                                        msg: "The fingerprint code is invalid",
                                                    });
                                                }
                                            }).catch(error => {
                                            this.generalFormError = this.getErrorMessage(error);
                                            this.errors.add({
                                                field: "deployment.fingerprint_code",
                                                msg: "The GitHub URL does not exist",
                                            });
                                        }).finally(() => {
                                            this.handleLoader("hide");
                                        });
                                    } else {
                                        this.generalFormError = "The GitHub URL does not exist.";
                                        this.errors.add({
                                            field: "deployment.githubURL",
                                            msg: "The GitHub URL does not exist",
                                        });
                                    }
                                }).catch(error => {
                                this.generalFormError = this.getErrorMessage(error);
                                this.errors.add({
                                    field: "deployment.githubURL",
                                    msg: "The GitHub URL does not exist",
                                });
                                this.handleLoader("hide");
                            });
                            //
                        }
                    }
                });
            }
            if (this.progressValue == this.stepsValue.tutorial) {
                this.$validator.validate("tutorial.*").then((isValid) => {
                    if (
                        isValid &&
                        // this.form.tutorial.pdf !== null &&
                        (this.form.tutorial.docs !== null || this.form.tutorial.docs !== "")
                    ) {
                        this.progressValue = this.stepsValue.pricing;
                        this.errors.remove("tutorial.pdf");
                        this.windowScroll();
                    } else {
                        if (
                            this.form.tutorial.docs == null ||
                            this.form.tutorial.docs === ""
                        ) {
                            this.errors.add({
                                field: "tutorial.docs",
                                msg: "Add Tutorial Descrption",
                            });
                        }
                    }
                });
            }
            if (this.progressValue == this.stepsValue.pricing) {
                this.$validator.validate("pricing.*").then((isValid) => {
                    if (isValid) {
                        this.processForm();
                    }
                    this.windowScroll();
                });
            }
        },
        goToPreviousStep() {
            switch (this.progressValue) {
                case 22:
                    this.progressValue = 0;
                    this.windowScroll();
                    break;
                case 50:
                    this.progressValue = 22;
                    this.windowScroll();
                    break;
                case 75:
                    this.progressValue = 50;
                    this.windowScroll();
                    break;
                case 100:
                    this.progressValue = 75;
                    this.windowScroll();
                    break;
            }
        },
        addRow(index) {
            let maindiv = this.search(index, this.mainDiv);
            maindiv.inputRows.push({
                id: this.inputIndex,
                name: "mainDiv-row" + index,
                ...this.RowInputs,
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
                        ...this.RowInputs,
                    },
                ],
            });

            this.inputIndex += 1;
            this.divIndex++;
        },
        deleteDiv(ref) {
            this.mainDiv.splice(ref, 1);
        },
        search(key, inputArray) {
            for (let i = 0; i < inputArray.length; i++) {
                if (inputArray[i].id === key) {
                    return inputArray[i];
                }
            }
        },
        processForm() {
            this.handleLoader("show");
            if (this.form.paymentplan == "paymentplan") {
                let price = this.mainDiv.map((value, index) => {
                    return {
                        api_url: value.endpointInput,
                        prices: value.inputRows.map((price, priceIndex) => {
                            console.log(price);
                            if (price.unlimitedInput) {
                                return {
                                    from: price.fromInput,
                                    to: 0,
                                    unlimited: true,
                                    cost: price.costInput ?? 0,
                                    plan_category: price.categoryInput,
                                };
                            }
                            return {
                                from: price.fromInput,
                                to: price.toInput,
                                unlimited: false,
                                cost: price.costInput ?? 0,
                                plan_category: price.categoryInput,
                            };
                        }),
                    };
                });

                this.form.payAsGo = [...price];
                this.form.pricing.price = 0;
            }
            let slug = this.form.service.appSlug;
            this.form.service.appSlug = slug.toLowerCase().replace(/\s+/g, "-");
            axios
                .post("api/create-netapp", this.form)
                .then((respnose) => {
                    this.handleLoader("hide");
                    if (respnose.data.error) {
                        this.$toastr.e("internal Server Error");
                    } else {
                        console.log(respnose.data);
                        this.netappId = respnose.data.data.id;
                        this.showModal = true;
                    }
                })
                .catch((err) => {
                    this.handleLoader("hide");
                    this.$toastr.defaultPosition = "toast-top-center";
                    this.$toastr.e(err.response.data.message);
                    let errors = err.response.data.errors;
                    for (let key in errors) {
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

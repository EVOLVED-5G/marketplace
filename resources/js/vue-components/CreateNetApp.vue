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
                <div class="scrollbar scrollbar-use-navbar scrollbar-bg-white">
                  <!-- menu -->
                  <ul
                    class="
                      list list-unstyled list-bg-white list-icon-purple
                      mb-0
                    "
                  >
                    <!-- multi-level dropdown menu -->
                    <li class="list-item">
                      <!-- list items -->
                      <ul class="list-unstyled">
                        <li class="mb-2">
                          <a href="#" class="list-link link-arrow"
                            ><span class="list-icon">
                              <img
                                class="me-2"
                                loading="lazy"
                                src="/img/netapp-icon.png"
                                alt="netapp-icon" /></span
                            >My Net Apps</a
                          >
                          <!-- list items, second level -->
                          <ul class="list-unstyled list-hidden">
                            <li>
                              <a href="#" class="list-link link-arrow"
                                >NetApp 1</a
                              >
                              <!-- list items, third level -->
                              <ul class="list-unstyled list-hidden">
                                <li>
                                  <a href="#" class="list-link">Details</a>
                                </li>
                                <li>
                                  <a href="#" class="list-link"
                                    >Track/revenue</a
                                  >
                                </li>
                              </ul>
                            </li>
                          </ul>
                        </li>
                        <!-- comments -->
                        <li class="mb-2">
                          <a href="#" class="list-link link-arrow"
                            ><span class="list-icon"
                              ><i class="fas fa-cloud-download-alt"></i></span
                            >My purchased NetApp</a
                          >
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
                          <a href="#" class="list-link link-current"
                            ><span class="list-icon"
                              ><i class="fas fa-bookmark"></i></span
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


      <div id="stepper" class="dashboard-right-content">
        <h3>Create new NetApp</h3>
        <div class="mt-5">
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

                <span v-show="errors.has('service.name')" class="error-text"
                  >Please Enter a name</span
                >
              </div>
              <div>
                <label for="about-netapp" class="form-label text-details"
                  >About</label
                >
                <input
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
                />
                <span v-show="errors.has('service.about')" class="error-text"
                  >Please Fill this field</span
                >
              </div>

              <div class="col-md-6">
                <label for="type-of-netapp" class="form-label text-details"
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
                  >Category of Net app</label
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
                  >
                    {{ category.name }}
                  </option>
                </select>
                <span v-show="errors.has('service.category')" class="error-text"
                  >Select atleast one Service Category</span
                >
              </div>
              <div class="col-md-6">
                <label for="version-of-netapp" class="form-label text-details"
                  >Version</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="version-of-netapp"
                  name="version"
                  v-model="form.service.version"
                  :class="{
                    customError: errors.has('service.version'),
                  }"
                  data-vv-scope="service"
                  v-validate="{ required: true }"
                  data-vv-rules="required"
                  placeholder="v 1.0"
                />
                <span v-show="errors.has('service.version')" class="error-text"
                  >Add Service Version</span
                >
              </div>
              <div class="col-md-6">
                <label
                  for="version-of-netapp"
                  class="form-label text-details"
                ></label>
                <multiselect
                  v-model="form.service.tag"
                  :options="tagsOption"
                  :searchable="true"
                  :multiple="true"
                  :close-on-select="false"
                  :preserve-search="true"
                  :class="{
                    customError: errors.has('service.tag'),
                  }"
                  data-vv-scope="service"
                  name="tag"
                  v-validate="{ required: true }"
                  data-vv-rules="required"
                ></multiselect>
                <span v-show="errors.has('service.tag')" class="error-text"
                  >Select atleast one Tag</span
                >
              </div>
              <div>
                <label for="about-netapp" class="form-label text-details"
                  >View more (Marketing page) url site</label
                >
                <input type="text" class="form-control" id="about-netapp" />
              </div>
              <div class="mb-3">
                <label for="logo-netapp" class="form-label text-details"
                  >NetApp logo</label
                >
                <input class="form-control" type="file" id="logo-netapp" />
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
                  <div>
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
                    />
                    <span
                      v-show="errors.has('service.businessName')"
                      class="error-text"
                      >Business/Organization Name</span
                    >
                  </div>
                  <div>
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
              Marketplace Policy. <a href="#">Read</a> the document for policy.
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
                Agree Marketplace policy
              </label>
              <span v-show="errors.has('policy.agreePolicy')" class="error-text"
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
                <label for="netapp-image-url" class="form-label text-details"
                  >Copy paste the net app image url from the Open
                  Repository</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="netapp-image-url"
                  v-model="form.deployment.imageUrl"
                  :class="{
                    customError: errors.has('deployment.imageUrl'),
                  }"
                  data-vv-scope="deployment"
                  v-validate="{ required: true }"
                  data-vv-rules="required"
                  name="imageUrl"
                />
                <span
                  v-show="errors.has('deployment.imageUrl')"
                  class="error-text"
                  >Add image Url of Net App</span
                >
              </div>
              <div>
                <label for="report-url" class="form-label text-details"
                  >Copy paste the Certification/Validation report URL</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="report-url"
                  v-model="form.deployment.report"
                  :class="{
                    customError: errors.has('deployment.report'),
                  }"
                  data-vv-scope="deployment"
                  v-validate="{ required: true }"
                  data-vv-rules="required"
                  name="report"
                />
                <span
                  v-show="errors.has('deployment.report')"
                  class="error-text"
                  >Add Certification/Validation report URL</span
                >
              </div>
              <div>
                <label for="docker-size" class="form-label text-details"
                  >Enter Docker Size</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="docker-size"
                  name="dockerSize"
                  v-model="form.deployment.dockerSize"
                  :class="{
                    customError: errors.has('deployemtn.dockerSize'),
                  }"
                  data-vv-scope="deployment"
                  v-validate="{ required: true }"
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
            <p>Please describe in detail your net app.</p>
            <p>Add a title/description here for the tutorial.</p>
            <br />
            <p>
              Make sure you present a list of the technologies that are used in
              your docker package.
            </p>
          </div>

          <div class="step-card__content p-3">
            <p>Build your own tutorial editing the form below.</p>

            <div class="col-sm-10">
              <ckEditor v-model="form.tutorial.docs" name="docs"></ckEditor>

              <span v-show="editorError" class="error-text"
                >Please Write some Tutorial Documentation</span
              >
            </div>

            <div class="mb-3">
              <label for="tutorial-pdf" class="form-label text-details"
                >Upload tutorial as a pdf</label
              >
              <input
                class="form-control"
                type="file"
                id="tutorial-pdf"
                :change="form.tutorial.pdf"
                :class="{
                  customError: errors.has('tutorial.pdf'),
                }"
                data-vv-scope="tutorial"
                v-validate="{ required: true }"
                data-vv-rules="required"
              />
              <span v-show="pdfError" class="error-text"
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
                  v-model.number="form.pricing.price"
                  :class="{
                    customError: errors.has('pricing.price'),
                  }"
                  data-vv-scope="pricing"
                  v-validate="{ required: true }"
                  data-vv-rules="required"
                />
                <span v-show="errors.has('pricing.price')" class="error-text"
                  >Add Price of NetApp</span
                >
              </div>
            </div>
          </div>

          <!-- <div id="pay-as-you-go" class="step-card__content p-3">
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

                    </div>  -->
        </div>

        <div class="step-actions mt-5">
          <a href="#">Cancel Process</a>
          <div class="btn btn--blue ms-5" type="button" @click="Validation">
            Next
          </div>

          <div class="mt-5">
            <!-- Button trigger modal -->
            <button
              type="button"
              class="btn btn--blue"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
            >
              Create
            </button>

            <!-- Modal -->
            <div
              class="modal fade"
              id="exampleModal"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content text-center">
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                  <div class="modal-header">
                    <h5 class="modal-title d-flex" id="exampleModalLabel">
                      <img
                        loading="lazy"
                        src="/img/success.modal.png"
                        alt="success.modal"
                      />
                    </h5>
                  </div>
                  <div class="modal-body mb-5">
                    <h1>Your NetApp was created successfuly!</h1>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn--tertiary mb-3"
                      data-bs-dismiss="modal"
                    >
                      OK
                    </button>

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
</template>
<script>
import ckEditor from "./common/CkEditor";
import Multiselect from "vue-multiselect";
export default {
  name: "createnetapp",
  components: { ckEditor, Multiselect },
  props: {
    categories: { type: Array, default: () => [] },
    types: { type: Array, default: () => [] },
  },
  data() {
    return {
      tagsOption: ["list", "of", "options"],
      editorError: false,
      pdfError: false,
      stepsValue: {
        service: 0,
        policy: 22,
        deployment: 50,
        tutorial: 75,
        pricing: 100,
      },
      progressValue: 0,
      form: {
        service: {
          type: null,
          tag: [],
          name: null,
          about: null,
          category: null,
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
        policy: { agreePolicy: false },
        tutorial: {
          docs: null,
          pdf: null,
        },
        pricing: {
          price: null,
        },
      },
    };
  },

  methods: {
    Validation() {
      if (this.progressValue == this.stepsValue.service) {
        this.$validator.validate("service.*").then((isValid) => {
          if (isValid) {
            this.progressValue = this.stepsValue.policy;
          } else {
            console.log(isValid);
          }
        });
      }
      if (this.progressValue == this.stepsValue.policy) {
        this.$validator.validate("policy.*").then((isValid) => {
          if (isValid) {
            this.progressValue = this.stepsValue.deployment;
          } else {
            this.$message({ message: isValid, type: "error" });
          }
        });
      }
      if (this.progressValue == this.stepsValue.deployment) {
        this.$validator.validate("deployment.*").then((isValid) => {
          if (isValid) {
            this.progressValue = this.stepsValue.tutorial;
          } else {
            this.$message({ message: error["msg"], type: "error" });
          }
        });
      }
      if (this.progressValue == this.stepsValue.tutorial) {
        this.$validator.validate("tutorial.*").then((isValid) => {
          if (
            this.form.tutorial.docs == null ||
            this.form.tutorial.docs == ""
          ) {
            this.editorError = true;
          }
          if (this.form.tutorial.pdf == null) {
            this.pdfError = true;
          }
          if (isValid) {
            this.progressValue = this.stepsValue.pricing;
          } else {
            this.$message({ message: error["msg"], type: "error" });
          }
        });
      }
      if (this.progressValue == this.stepsValue.pricing) {
        this.$validator.validate("pricing.*").then((isValid) => {
          if (isValid) {
            this.progressValue = this.stepsValue.pricing;
          } else {
            console.log(isValid);
            this.$message({ message: error["msg"], type: "error" });
          }
        });
      }
    },
    backToPrevious(value) {
      if (value < this.progressValue) {
        this.progressValue = value;
      }
    },
  },
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style></style>

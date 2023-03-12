<template>
  <section class="form_section">
    <div class="container">
      <div class="form_top_tabbs">
        <div class="tabs_start">
          <div class="d-flex justify-content-between">
            <ul class="nav nav-tabs me-5" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="Overview-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#Overview"
                  type="button"
                  role="tab"
                  aria-controls="Overview"
                  aria-selected="true"
                >
                  Overview
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="Tutorial-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#Tutorial"
                  type="button"
                  role="tab"
                  aria-controls="Tutorial"
                  aria-selected="false"
                >
                  Tutorial
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="Pricing-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#Pricing"
                  type="button"
                  role="tab"
                  aria-controls="Pricing"
                  aria-selected="false"
                >
                  Pricing
                </button>
              </li>
            </ul>
            <a
            v-if="visible==true"
              :href="
                this.form.service.appSlug
                  ? '/netapp-details/' + this.form.service.appSlug
                  : '/netapp-details/' + this.netapp[0].id
              "
              class="edit-details"
            >
              View NetApp page</a
            >
             <a
            v-else
              class="edit-details"
              @click="showErrorMessage"
            >
              View NetApp page</a
            >
          </div>
          <hr />
          <div class="tab-content" id="myTabContent">
            <div
              class="tab-pane fade show active"
              id="Overview"
              role="tabpanel"
              aria-labelledby="Overview-tab"
            >
              <div class="over_main">
                <div class="over_field">
                  <label>Status</label>
                  <div class="status_select">
                    <select class="form-control" v-model="visible">
                      <option value="0">Private</option>
                      <option value="1">Public</option>
                    </select>
                    <p v-if="visible==false">Not Visible to the marketplace</p>
                    <p v-else>Visible to the marketplace</p>

                  </div>
                </div>
              </div>
              <div class="main_form">
                <a
                 @click="editForm = true"
                  href="#"
                  class="edit-details"
                  style="margin-left: 92%"
                  v-if="!editForm"
                  >Edit</a
                >
                <div
                  class="create_form"
                  :style="[
                    editForm == true ? '' : { 'pointer-events': 'none' },
                  ]"
                >
                  <form :class="{ 'enable-editing': editForm }">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form_field_main">
                          <div class="form_title">
                            <label>Network App name</label>
                          </div>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Net App 1"
                            v-model="form.service.name"
                            :class="{
                              customError: errors.has('service.name'),
                            }"
                            data-vv-scope="service"
                            v-validate="{ required: true }"
                            data-vv-rules="required"
                            name="name"
                          />

                          <span
                            v-show="errors.has('service.name')"
                            class="error-text"
                            >Please Enter a name</span
                          >
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form_field_main">
                          <label>About</label>
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
                            :disabled="editForm == false"
                          ></textarea>
                          <span
                            v-show="errors.has('service.about')"
                            class="error-text"
                            >Please Fill this field</span
                          >
                        </div>
                      </div>
                      <div class="col-md-6 form_field_main">
                        <label
                          for="type-of-netapp"
                          class="form-label text-details"
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
                        <span
                          v-show="errors.has('service.category')"
                          class="error-text"
                          >Select at least one Service Category</span
                        >
                      </div>
                      <div class="col-md-6 form_field_main">
                        <label
                          for="version-of-netapp"
                          class="form-label text-details"
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
                        <span
                          v-show="errors.has('service.version')"
                          class="error-text"
                          >Add Service Version</span
                        >
                      </div>
                      <div class="col-md-6" v-if="form.service.tag && form.service.tag.length > 0">
                        <label
                          for="version-of-netapp"
                          class="form-label text-details"
                        >Add a tag name<br><i>Help your NetApp be more distinguished so that it can be found easier. Add tag names that you want to characterize your NetApp.</i></label></label>
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
                          v-if="editForm"
                        ></VoerroTagsInput>
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
                          disabled
                          v-else
                        ></VoerroTagsInput>
                        <span
                          v-show="errors.has('service.tag')"
                          class="error-text"
                          >Select atleast one Tag</span
                        >
                      </div>
                        <div class="col-md-12">
                            <div class="form_field_main">
                                <label style="margin-right: 5px">URL Slug</label>
                                <div class="align_url_field">
                                    <input
                                        type="text"
                                        style="display:none"
                                        :placeholder="this.appurl"
                                        name=""
                                        class="form-control"
                                    />
                                    <input
                                        type="text"
                                        placeholder="alex-net-app"
                                        class="form-control"
                                        v-model="form.service.appSlug"
                                        :class="{
                                customError: errors.has('service.app_slug'),
                              }"
                                        data-vv-scope="service"
                                        name="app_slug"
                                        v-validate="{
                                required: true,
                              }"
                                    />
                                    <span
                                        v-show="errors.has('service.app_slug')"
                                        class="error-text"
                                    >Slug is alread Exists</span
                                    >
                                </div>
                            </div>
                        </div>
                      <div class="form_field_main">
                          <label for="about-netapp" class="form-label text-details"
                          >View more (Marketing page) url site<br><i>Do you have an external page/URL hat demonstrates your NetApp (for example in your company's website)? Paste it below:</i></label
                          >
                        <input
                          type="url"
                          class="form-control"
                          id="netapp-url"
                          v-model="form.service.marketing_url"
                          :class="{
                            customError: errors.has('service.marketing_url'),
                          }"
                          data-vv-scope="service"
                          name="marketing_url"
                          v-validate="{
                            url: { require_protocol: true },
                          }"
                        />
                        <span
                          v-show="errors.has('service.marketing_url')"
                          class="error-text"
                          >Invalid Url</span
                        >
                      </div>

                      <div class="mb-3" style="display: grid; gap: 10px">
                        <label for="logo-netapp" class="form-label text-details"
                          >NetApp logo</label
                        >
                        <img
                          id="blah"
                          :src="form.service.logo"
                          alt="your image"
                          style="width: 20%"
                        />
                        <VueDropzone
                          :uploadUrl="uploadUrl + '/api/upload-file?url=logo'"
                          extensions=".jpg, .jpeg, .png, .webp"
                          v-on:uploadFile="
                            (value) =>
                              (this.form.service.logo =
                                value.file_name.original.path)
                          "
                        ></VueDropzone>
                        <span
                          v-show="errors.has('service.logo')"
                          class="error-text"
                          >Please Choose Logo Image</span
                        >
                      </div>
                      <div class="col-md-6">
                        <!-- For Blank Space -->
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
                          <label
                            class="form-check-label"
                            for="publish-as-business"
                          >
                            Business/Organization
                          </label>
                          <span
                            v-show="errors.has('service.publishedBy')"
                            class="error-text"
                            >Select Publisher</span
                          >
                          <div v-if="form.service.publishedBy == 'business'">
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
                          <div v-if="form.service.publishedBy == 'business'">
                            <label
                              for="social-number"
                              class="form-label text-details"
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
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade mb-3"
              id="Tutorial"
              role="tabpanel"
              aria-labelledby="Tutorial-tab"
            >
              <a
                @click="editForm = true"
                href="#"
                class="edit-details"
                style="margin-left: 92%"
                v-if="!editForm"
                >Edit</a
              >
            <div  :style="[
                      !editForm
                        ? { 'pointer-events': 'none' }
                        : {},
                    ]">
             <ckEditor
                v-model="form.tutorial.docs"
                name="docs"
                :value="form.tutorial.docs"
                placeholder="..."
                :class="{
                  customError: errors.has('tutorial.docs'),
                }"
                data-vv-scope="service"
                v-validate="{ required: true }"
                data-vv-rules="required"

              ></ckEditor>
              </div>
              <span v-show="errors.has('tutorial.docs')" class="error-text"
                >Please Fill this field</span
              >
            </div>
            <div
              class="tab-pane fade"
              id="Pricing"
              role="tabpanel"
              aria-labelledby="Pricing-tab"
            >
              <!-- <div class="row"> -->
              <!-- <div class="col-md-12">
                  <div class="form_field_main">
                    <div class="form_title">
                      <label>Net app name</label>
                      <a href="#">Edit</a>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Net App 1"
                      name=""
                      v-model="form.service.name"
                    />
                  </div>
                </div> -->
              <a
                href="#"
                class="edit-details"
                @click="editForm = !editForm"
                v-if="!editForm"
                style="margin-left: 92%"
                >Edit</a
              >
              <div class="calls-choices mt-5" v-if="!editForm">
                <div
                  class="col text-center pe-0"
                  v-if="this.netapp[0].fix_price !== 0"
                >
                  <div class="p-3 border bg-light">
                    <h4 class="mb-4">Once-off</h4>
                    <h2>{{ this.netapp[0].fix_price }} € <br /></h2>
                  </div>
                </div>
                <PriceTable :pricings="this.netapp[0].api_endpoints" v-else />
              </div>
              <div id="pricing" class="step-card" v-if="editForm">
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
                    :checked="form.paymentplan == 'onceoff'"
                    id="pay"
                  />
                  <p>Once-off</p>
                  <p>
                    Charge your customer once-off. Once they pay this amount
                    they will be able to make unlimited calls to your netapp API
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
                        :disabled="form.paymentplan == 'paymentplan'"
                        :class="{
                          customError: errors.has('pricing.price'),
                        }"
                        data-vv-scope="pricing"
                        v-validate="
                          form.paymentplan == 'onceoff'
                            ? {
                                required: true,
                                numeric: true,
                                min_value:1
                              }
                            : {}
                        "
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
                        type="radio"
                        name="pay"
                        v-model="form.paymentplan"
                        id="pay"
                        value="paymentplan"
                        :checked="form.paymentplan == 'paymentplan'"
                      />
                      <label class="form-check-label" for="pay">
                        Pay as you go pricing
                      </label>
                    </div>
                    <p>
                      Charge your customer either a) a fixed price for a
                      specific number of calls, or b) fixed price per call.
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
                        <i
                          class="fa fa-trash"
                          @click="deleteDiv(mainIndex)"
                        ></i>
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
                                required: true
                              }
                            : {}
                        "
                        data-vv-rules="required"
                      />
                      <span
                        v-show="errors.has('payAsGo.' + mainIndex + '.api_url')"
                        class="error-text"
                        >Add an Endpoint</span
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
                                v-validate="
                                  form.paymentplan == 'paymentplan'
                                    ? {
                                        numeric: true,
                                        required: true,
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
                                      '.from'
                                  )
                                "
                                class="error-text"
                                >This Field is Required</span
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
                                :disabled="div.unlimitedInput == true"
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
                              <label
                                for="cost-netapp"
                                class="form-label text-details"
                                >Cost</label
                              >
                              <input
                                type="number"
                                step=".0001"
                                class="form-control"
                                id="cost-netapp"
                                placeholder="ex: 0.005€"
                                v-model.number="div.costInput"
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
                                        decimal:4
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
                                >Cost Field is Required</span
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
                    <br />
                    <div class="new-table mt-3 p-2 text-center" @click="addDiv">
                      Add new plan table
                    </div>
                  </div>
                </div>
              </div>
              <!-- </div> -->
            </div>
            <div v-if="editForm">
              <a href="#" @click="editForm = !editForm">Cancel Process</a>
              <div class="btn btn--blue ms-5" type="button" @click="Validation">
                <span> Save</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <Modal :open="this.showModal" :netappId="this.netapp[0].id" :link="'/edit-netapp/'+this.netapp[0].id"> You Netapp has been Updated </Modal>
 <WarningModel @paymentprocess="processWithPayment" @canceled="processWithoutPayment" :open="showWarningModel">
     <div v-if='form.pricing.price > 0 && form.paymentplan=="paymentplan"'>
   <h1>
     Are you sure that you want to change the payment?
   </h1>
   <h4>Your payment status will change to <b>pay as you go</b>* and you will be asked to set up your fee.</h4>
   <p>*You will change your customer either a) a fixed price for a specific number of calls, or b) fixed price per call.</p>
   </div>
   <div v-else>
   <h1>Are you sure that you want to change the payment?</h1>
   <h3>Your payment status will change to <b>once off</b>* and you will be asked to set up your fee.</h3>
   <p>*Once they pay this amount they will be able to makie unlimited calls to your netapp API.</p>
   </div>
 </WarningModel>
  </section>
</template>

<script>
import VueDropzone from "./common/DropZone";
import ckEditor from "./common/CkEditor.vue";
import VoerroTagsInput from "@voerro/vue-tagsinput";
import PriceTable from "./common/priceTable.vue";
import Modal from "./common/SuccessModal";
import WarningModel from "./common/warningModel.vue";
export default {
  name: "edit-netapp",
  components: {
    ckEditor,
    VoerroTagsInput,
    VueDropzone,
    PriceTable,
    Modal,
    WarningModel,
  },
  props: {
    netapp: { type: Array, default: () => {} },
    categories: { type: Array, default: () => [] },
    types: { type: Array, default: () => [] },
  },
  data() {
    return {
      uploadLicenseFile: false,
      showWarningModel: false,
      processPayment: true,
      divIndex: 1,
      inputIndex: 1,
      editForm: false,
      readPrivacyError: null,
      passedValidation: false,
      RowInputs: {
        recordId: null,
        fromInput: null,
        toInput: null,
        unlimitedInput: false,
        costInput: 0,
        categoryInput: null,
      },
      planCategory: [
        { key: "percall", value: "Per call" },
        { key: "fix", value: "Fixed" },
      ],
      tagsOption: [
        { key: "location-monitoring", value: "location monitoring" },
        { key: "swagger", value: "swagger" },
        { key: "easy-to-use", value: "easy to use" },
      ],

      mainDiv: [],
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
      visible: this.netapp[0].visible,
      form: {
        editRequest: true,
        user_id: null,
        paymentplan: this.netapp[0].fix_price > 0 ? "onceoff" : "paymentplan",
        service: {
          appSlug: this.netapp[0].slug,
          type: this.netapp[0].type_id,
          marketing_url: this.netapp[0].url_site,
          tag: this.netapp[0].tags,
          tags: [],
          name: this.netapp[0].name,
          about: this.netapp[0].about,
          category: this.netapp[0].category_id,
          logo:
            this.netapp[0].logo.length > 0 ? this.netapp[0].logo[0].url : null,
          logoId:
            this.netapp[0].logo.length > 0 ? this.netapp[0].logo[0].id : null,
          version: this.netapp[0].version,
          publishedBy: this.netapp[0].published_by,
          businessName: this.netapp[0].business_name,
          socialNumber: this.netapp[0].social_number,
        },
        deployment: {
            githubURL: this.netapp[0].github_url,
          licensefile: null,
            docker_image_url: this.netapp[0].docker_image_url,
            fingerprint_code: this.netapp[0].fingerprint_code
        },
        policy: { agreePolicy: true },
        tutorial: {
          docs: this.netapp[0].tutorial_docs,
          pdf: null,
        },
        pricing: {
          price: this.netapp[0].fix_price,
          payAsGo: null,
        },
      },
    };
  },
  watch: {
    visible: function (value) {
      this.processForm(true);
    },
  },
  methods: {
    showErrorMessage() {
      this.$toastr.e("Please Make Sure that Your Netapp is Public");
    },
    processWithPayment() {
      this.processPayment = true;
      this.processForm();
    },
    processWithoutPayment() {
      this.processPayment = false;
      this.form.paymentplan =
        this.netapp[0].fix_price > 0 ? "onceoff" : "paymentplan";
      this.processForm();
    },
    windowScroll() {
      window.scrollTo({
        top: 100,
        left: 100,
        behavior: "smooth",
      });
    },
    deleteDiv(ref) {
      this.mainDiv.splice(ref, 1);
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
        endpointId: null,
        id: this.divIndex,
        name: "mainDiv" + this.divIndex,
        endpointInput: null,
        inputRows: [
          {
            id: this.inputIndex,
            name: "mainDiv-row" + this.divIndex,
            ...this.RowInputs,
          },
        ],
      });

      this.inputIndex += 1;
      this.divIndex++;
    },
    search(key, inputArray) {
      for (let i = 0; i < inputArray.length; i++) {
        if (inputArray[i].id === key) {
          return inputArray[i];
        }
      }
    },
    Validation() {
      this.$validator.validate("service.*").then((isValid) => {
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

        this.passedValidation = true;
        this.windowScroll();
      });
      this.$validator.validate("policy.*").then((isValid) => {
        if (isValid && this.checkPrivacy) {
          this.progressValue = this.stepsValue.deployment;
        } else {
          if (this.checkPrivacy == false) {
            this.readPrivacyError = "Please Read the privacy policy before";
          }
        }
      });
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
            this.progressValue = this.stepsValue.tutorial;
          }
        }
      });
      this.$validator.validate("tutorial.*").then((isValid) => {
        if (
          isValid &&
          this.form.tutorial.pdf !== null &&
          (this.form.tutorial.docs !== null || this.form.tutorial.docs !== "")
        ) {
          this.progressValue = this.stepsValue.pricing;
          this.windowScroll();
        } else {
          if (this.form.tutorial.pdf == null) {
            this.errors.add({
              field: "tutorial.pdf",
              msg: "Add Tutorial File",
            });
          }
          if (
            this.form.tutorial.docs == null ||
            this.form.tutorial.docs == ""
          ) {
            this.errors.add({
              field: "tutorial.docs",
              msg: "Add Tutorial Descrption",
            });
          }
        }
      });
      this.$validator.validate("pricing.*").then((isValid) => {
        if (isValid) {
          if (
            (this.netapp[0].fix_price > 0 &&
              this.form.paymentplan == "paymentplan") ||
            (this.form.paymentplan == "onceoff" &&
              this.netapp[0].fix_price == 0)
          ) {
            this.showWarningModel = true;
            this.processPayment = false;
          }
          if (!this.showWarningModel) {
            this.processForm();
          }
        }
        this.windowScroll();
      });
    },
    processForm(changeStatus = false) {
      this.showWarningModel = false;
      if (!this.editForm && changeStatus == false) {
        return;
      }

      this.handleLoader("show");
      let endpointIds = [];
      this.form.payAsGo = [];
      if (
        this.form.paymentplan == "paymentplan" &&
        this.processPayment == true
      ) {
        let price = this.mainDiv.map((value, index) => {
          endpointIds.push(value.endpointId);
          return {
            api_url: value.endpointInput,
            prices: value.inputRows.map((price, priceIndex) => {
              if (price.unlimitedInput) {
                return {
                  from: price.fromInput,
                  // id: price.recordId,
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
        this.form.endpointIds = endpointIds;
      }
      // if (this.form.paymentplan == "onceoff" && this.processPayment == true) {
      //   this.form.pricing.price = 0;
      // }
      this.form.visible = this.visible;
      let slug = this.form.service.appSlug;
      this.form.service.appSlug = slug.toLowerCase().replace(/\s+/g, "-");
      axios
        .post("/api/slug-validation", {
          slug: this.form.service.appSlug,
          editForm: true,
          id: this.netapp[0].id,
        })
        .then((respnose) => {
          if (respnose.data.message) {
            axios
              .post(`/api/update-netapp/${this.netapp[0].id}`, this.form)
              .then((respnose) => {
                this.handleLoader("hide");
                this.editForm = false;

                if (respnose.data.error) {
                  this.$toastr.e("internal Server Error");
                } else {
                  if (changeStatus) {
                    this.$toastr.s("Status has been updated");
                  } else {
                    this.showModal = true;
                  }
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
              });
          }
        })
        .catch((err) => {
          this.handleLoader("hide");
          this.$toastr.defaultPosition = "toast-top-center";
          this.$toastr.e("Slug is Already Exists");
          this.errors.add({
            field: "service.app_slug",
            msg: "Slug is Already Exists",
          });
        });
    },
  },
  created() {
    this.form.user_id = this.netapp[0].user_id;
    if (!this.netapp[0].tags) this.netapp[0].tags = [];

    this.form.service.tag = this.netapp[0].tags.map((tag) => {
      return { key: tag, value: tag };
    });
    this.netapp[0].api_endpoints.forEach((apiendpoint, mainIndex) => {
      let inputs = null;
      let inputArray = [];

      apiendpoint.paymentplan.forEach((paymentplan, index) => {
        inputs = {
          recordId: paymentplan.id,
          id: index,
          name: "mainDiv-row" + mainIndex,
          fromInput: paymentplan.from,
          toInput: paymentplan.to,
          unlimitedInput: paymentplan.unlimited,
          costInput: paymentplan.cost,
          categoryInput: paymentplan.plan_category,
        };
        inputArray.push(inputs);
        this.inputIndex += apiendpoint.paymentplan.length;
      });
      this.mainDiv.push({
        endpointId: apiendpoint.id,
        id: mainIndex,
        name: "mainDiv" + mainIndex,
        endpointInput: apiendpoint.url,
        inputRows: inputArray,
      });
    });
    this.divIndex = this.netapp[0].api_endpoints.length;
    if (
      this.netapp[0].pdf[0] &&
      this.netapp[0].pdf[0].type == "tutorial_docs"
    ) {
      this.form.tutorial.pdf = this.netapp[0].pdf[0].url;
    }
    if (this.netapp[0].fix_price == 0) {
      this.form.paymentplan = "paymentplan";
    }
  },
};
</script>

<style scoped lang="scss">
@import "resources/sass/modal";

.form-select {
  background: transparent;
}
.enable-editing input {
  background: white;
}
.enable-editing select {
  background: white;
}
.form-check-input:checked {
  background-color: #76b7d6 !important;
  border-color: #76b7d6 !important;
}
</style>


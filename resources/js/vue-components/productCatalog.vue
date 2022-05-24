<template>
  <div class="product-content">
    <div class="content d-flex">
      <section class="main-sidebar">
        <div class="filters-list">
          <h4>Filters</h4>
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
            >&times;
          </a>


          <div class="form me-4">
            <i class="fa fa-search" @click="searchNetapp"></i>
            <input
              type="text"
              class="form-control form-input mt-3 mb-4"
              placeholder="Search"
              v-model="searchByName"
              @keyup.enter="searchNetapp"
              @blur="
                () => {
                  this.searchByName = null;
                  this.searchNetapp();
                }
              "
            />
          </div>

          <div class="filter-group mb-5">
            <div class="filter-group-title">
              <p>Categories</p>
            </div>

            <ul>
              <li v-for="category in categories" :key="category.id">
                <input
                  class="form-check-input me-2"
                  type="checkbox"
                  :value="category.id"
                  v-model="searchParams.category_id"
                />
                <label class="form-check-label">{{ category.name }}</label>
              </li>
            </ul>
          </div>

          <div class="filter-group mb-5">
            <div class="filter-group-title">
              <p>Tag</p>
            </div>
            <!-- <input
              style="width: 80%"
              type="text"
              class="form-control form-input mt-3 mb-4"
              placeholder="Type"
              v-model="searchTag"
              @keyup.enter="
                () => {
                  searchParams.tags.push(searchTag);
                  searchTag = null;
                }
              "
            /> -->
            <select2-multiple-control
              v-model="searchParams.tags"
              :options="select2Options"
            />
          </div>

          <!-- <div class="filter-group mb-5">
            <div class="filter-group-title">
              <p>Categories</p>
            </div>
            <ul>
              <li>
                <input class="form-check-input me-2" type="checkbox" /><label
                  class="form-check-label"
                  >Sample 1</label
                >
              </li>
              <li>
                <input class="form-check-input me-2" type="checkbox" /><label
                  class="form-check-label"
                  >Sample 2</label
                >
              </li>
              <li>
                <input class="form-check-input me-2" type="checkbox" /><label
                  class="form-check-label"
                  >Sample 3</label
                >
              </li>
            </ul>
          </div> -->

          <div class="filter-group mb-5">
            <div class="filter-group-title">
              <p>Type of net app</p>
            </div>
            <ul>
              <li v-for="(type, index) in this.types" :key="index">
                <input
                  class="form-check-input me-2"
                  type="checkbox"
                  :value="type.id"
                  v-model="searchParams.type_id"
                /><label class="form-check-label">{{ type.name }}</label>
              </li>
            </ul>
          </div>
        </div>
      </section>

      <section class="products">
        <p>Results: {{ totalNetapps }}</p>
        <div class="product-list d-flex flex-wrap">
          <div
            class="product-list__card mb-4"
            v-for="netapp in allNetapps"
            :key="netapp.id"
          >
            <SingleNetapp
              :netapp="netapp"
              :loggedInUserId="user"
            ></SingleNetapp>
          </div>
        </div>
        <Pagination
          :data="paginationData"
          @pagination-change-page="searchNetapp"
          align="center"
        >
        </Pagination>
      </section>
    </div>
    <span id="filters-btn" onclick="openNav()">
      <!-- &#9776; -->
      <img class="me-2" loading="lazy" alt="icon-codepen" src="/img/edit.png"
    /></span>
  </div>
</template>
<script>
import LaravelVuePagination from "laravel-vue-pagination";
import SingleNetapp from "./singleNetapp.vue";
import Select2MultipleControl from "v-select2-multiple-component";

export default {
  components: {
    Pagination: LaravelVuePagination,
    SingleNetapp,
    Select2MultipleControl,
  },
  props: {
    categories: {
      type: Array,
      default: () => {},
    },
    Tags: {
      type: Object,
      default: [],
    },
    types: {
      type: Array,
      default: () => {},
    },
    user: {
      default: null,
    },
    url: { type: String, default: null },
  },
  data() {
    return {
      searchTag: null,
      select2Options: [],
      totalNetapps: 0,
      selectedTag: "",
      searchByName: null,
      searchParams: {
        category_id: [],
        type_id: [],
        tags: [],
        name: null,
      },
      allNetapps: [],
      paginationData: {},
    };
  },
  mounted() {
    this.searchNetapp();
    this.select2Options = Object.values(this.Tags.tags);
  },
  watch: {
    searchParams: {
      handler(val) {
        this.searchNetapp();
      },
      deep: true,
    },
  },
  methods: {
    windowScroll() {
      window.scrollTo({
        top: 100,
        left: 100,
        behavior: "smooth",
      });
    },
    searchNetapp(page = 1) {
      this.handleLoader("show");
      this.searchParams.name = this.searchByName;
      axios
        .post("api/filter-netapp?page=" + page, { ...this.searchParams })
        .then((respnose) => {
          this.handleLoader("hide");
          if (respnose.data.error) {
            this.$toastr.e("internal Server Error");
          } else {
            this.allNetapps = respnose.data.data.data;
            this.paginationData = respnose.data.data;
            this.totalNetapps = respnose.data.data.total;
            this.windowScroll();
          }
        })
        .catch((err) => {
          this.handleLoader("hide");
          this.$toastr.defaultPosition = "toast-top-center";
          this.$toastr.e(err.response.data.message);
        });
    },
  },
};
</script>


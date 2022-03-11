<template>
  <div class="product-content">
    <div class="content d-flex">
      <section class="main-sidebar">
        <div class="filters-list">
          <h4>Filters</h4>

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
            <vue-simple-suggest
              v-model="selectedTag"
              :list="simpleSuggestionList"
              ref="selectTag"
              :filter-by-query="true"
            >
              <!-- Filter by input text to only show the matching results -->
            </vue-simple-suggest>
            <div
              class="sample p-1"
              v-for="(tag, index) in searchParams.tags"
              :key="index"
            >
              <span class="p-2">{{ tag }}</span>
              <input
                class="ms-2"
                type="reset"
                value="X"
                @click="searchParams.tags.splice(index, 1)"
              />
            </div>
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
            <div class="product-list__card--name d-flex">
              <img
                class="me-2"
                loading="lazy"
                alt="icon-codepen"
                style="border-radius: 50%; height: 57px; width: 70px"
                :src="netapp.logo[0].url"
                v-if="netapp.logo.length > 0"
              />
              <img
                class="me-2"
                loading="lazy"
                alt="icon-codepen"
                src="/img/icon-codepen.png"
                v-else
              />

              <a
                :href="'/netapp-details/' + netapp.id"
                style="text-decoration: none"
              >
                <div style="width: 70%">
                  <h5>{{ netapp.name }}</h5>
                  <p v-if="netapp.published_by == 'user'">
                    {{ netapp["user"].name }}
                  </p>
                  <p v-if="netapp.published_by == 'business'">
                    {{ netapp.business_name }}
                  </p>
                </div>
              </a>
              <a href="#" style="width: 10%"><i class="far fa-bookmark"></i></a>
            </div>
            <div class="product-list__card--content">
              <p
                class="text-note mb-5"
                v-html="renderHmtl(netapp.about.substring(0, 50))"
              ></p>
              <div class="tags">
                <a
                  href="#"
                  class="text-details"
                  v-for="(tag, index) in netapp.tags"
                  :key="index"
                  >{{ tag }}</a
                >
              </div>
            </div>
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
  </div>
</template>
<script>
import LaravelVuePagination from "laravel-vue-pagination";
import VueSimpleSuggest from "vue-simple-suggest";
import "vue-simple-suggest/dist/styles.css";
export default {
  components: {
    Pagination: LaravelVuePagination,
    VueSimpleSuggest,
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
    url: { type: String, default: null },
  },
  data() {
    return {
      searchTag: null,
      fetchedTags: this.Tags,
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
  },
  watch: {
    selectedTag: {
      handler(val) {
        if (val !== null) {
          this.searchParams.tags.push(val);
          this.selectedTag = null;
          this.$refs.selectTag.value = null;
        }
      },
    },
    searchParams: {
      handler(val) {
        this.searchNetapp();
      },
      deep: true,
    },
  },
  methods: {
    renderHmtl(html) {
      return `<span> ${html} </span>`;
    },
    simpleSuggestionList() {
      return Object.values(this.fetchedTags.tags);
    },
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
  created() {},
};
</script>
<style scoped>
.vue-simple-suggest >>> .suggest-item {
  padding: 5px 35px !important;
}
.vue-simple-suggest >>> .suggest-item:hover {
  padding: 5px 35px !important;
}
.vue-simple-suggest >>> .input-wrapper input {
  width: 94%;
}
</style>
<template>
  <div>
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
        :href="
          this.netapp.slug
            ? '/netapp-details/' + this.netapp.slug
            : '/netapp-details/' + this.netapp.id
        "
        style="text-decoration: none"
      >
        <div style="width: 90%">
          <h5>{{ this.netapp.name }}</h5>
          <p v-if="this.netapp.published_by == 'user'">
            {{ this.netapp["user"].name }}
          </p>
          <p v-if="this.netapp.published_by == 'business'">
            {{ this.netapp.business_name }}
          </p>
        </div>
      </a>
      <a
        style="width: 10%; cursor: pointer; font-size: 1.5rem"
        @click="unsave"
        v-if="savedNetapp"
        ><i class="fa fa-bookmark" aria-hidden="true"></i>
      </a>
      <a style="width: 10%; cursor: pointer" @click="save" v-else>
        <i class="far fa-bookmark"></i>
      </a>
    </div>
    <div class="product-list__card--content">
      <p
        class="text-note mb-5"
        v-html="renderHmtl(this.netapp.about.substring(0, 150)) + '...'"
      ></p>
      <div class="tags">
        <a
          href="#"
          class="text-details"
          v-for="(tag, index) in this.netapp.tags"
          :key="index"
          >{{ tag }}</a
        >
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    netapp: {
      type: Object,
      default: () => {},
    },
    loggedInUserId: {
      default: null,
    },
  },
  data() {
    return {
      savedNetapp: this.netapp.hasOwnProperty("saved_netapp")
        ? this.netapp.saved_netapp !== null
          ? true
          : false
        : false,
    };
  },
  methods: {
    renderHmtl(html) {
      return `<span> ${html} </span>`;
    },
    save() {
      if (this.loggedInUserId !== "") {
        this.saveNetapp(this.netapp.id, this.loggedInUserId);
      } else {
        window.location.href = "/login";
      }
    },
    unsave() {
      if (this.loggedInUserId !== "") {
        this.unsaveNetapp(this.netapp.saved_netapp.id);
      } else {
        window.location.href = "/login";
      }
    },
  },
};
</script>

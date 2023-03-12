<template>
  <div class="admin-page">
    <div class="content">
      <h3>Marketplace overview</h3>
      <div class="d-flex flex-wrap justify-content-between">
        <div
          id="total-netapps-created-box"
          class="box-template"
          @click="currentTab = allTabs.netapptable"
        >
          <div
            class="
              box-template__number
              ps-3
              mb-5
              d-flex
              flex-column
              justify-content-center
            "
          >
            <p class="text-note">Total Network Apps have been created</p>
            <h2>{{ this.totalNetapps }}</h2>
          </div>
        </div>

        <div
          id="total-users-box"
          class="box-template"
          @click="currentTab = allTabs.usertable"
        >
          <div
            class="
              box-template__number
              ps-3
              mb-5
              d-flex
              flex-column
              justify-content-center
            "
          >
            <p class="text-note">Total users</p>
            <h2>{{ this.totalUsers }}</h2>
          </div>
        </div>

        <div
          id="total-companies-box"
          class="box-template"
          @click="currentTab = allTabs.companytable"
        >
          <div
            class="
              box-template__number
              ps-3
              mb-5
              d-flex
              flex-column
              justify-content-center
            "
          >
            <p class="text-note">Total companies</p>
            <h2>{{ this.totalCompnies }}</h2>
          </div>
        </div>

        <div
          id="total-purchases-box"
          class="box-template"
          @click="currentTab = allTabs.purchasedNetappTable"
        >
          <div
            class="
              box-template__number
              ps-3
              mb-5
              d-flex
              flex-column
              justify-content-center
            "
          >
            <p class="text-note">Total purchases</p>
            <h2>{{ this.totalPurchase }}</h2>
          </div>
        </div>
      </div>
      <companyTable v-if="currentTab == allTabs.companytable"></companyTable>
      <netappTable v-if="currentTab == allTabs.netapptable"></netappTable>
      <purchasedNetapp
        v-if="currentTab == allTabs.purchasedNetappTable"
      ></purchasedNetapp>
      <userTable v-if="currentTab == allTabs.usertable"></userTable>
    </div>
  </div>
</template>
<script>
import companyTable from "./company-table.vue";
import netappTable from "./netapp-table.vue";
import purchasedNetapp from "./purchased-netapp-table.vue";
import userTable from "./user-table.vue";

export default {
  components: { companyTable, netappTable, purchasedNetapp, userTable },
  props: {
    totalPurchase: {
      type: Number,
      default: 0,
    },
    totalCompnies: {
      type: Number,
      default: 0,
    },
    totalUsers: {
      type: Number,
      default: 0,
    },
    totalNetapps: {
      type: Number,
      default: 0,
    },
  },
  data() {
    return {
      currentTab: "netappTable",
      allTabs: {
        companytable: "companyTable",
        netapptable: "netappTable",
        purchasedNetappTable: "purchasedNetappTable",
        usertable: "userTable",
      },
    };
  },
};
</script>

<template>
  <div id="total-companies">
    <div class="table-responsive mb-5">
      <p>Results</p>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Company Name</th>
            <th scope="col">logo</th>
            <th scope="col">Number of Net apps created</th>
            <th scope="col">Number of Net apps purchased</th>
            <th scope="col">Contact Email</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(company, index) in companies" :key="index">
            <th scope="row">{{ company.business_name }}</th>
            <td>
              <img :src="company.logo[0].url" alt="logo" />
            </td>
            <td>{{ company.user.netapps_count }}</td>
            <td>{{ company.user.purchased_netapp_count }}</td>
            <td>{{ company.user.email }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      companies: [],
    };
  },
  created() {
    this.handleLoader("show");
    axios
      .get("api/companies")
      .then((response) => {
        this.companies = response.data.data;
        this.handleLoader("hide");
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>
<template>
  <div id="total-purchases-table">
    <div class="table-responsive mb-5">
      <p>Results</p>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Network App name</th>
            <th scope="col">Date of Purchase</th>
            <th scope="col">Network App creator email</th>
            <th scope="col">Buyer’s email</th>
            <th scope="col">Blockchain confirmation</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(purchasedNetapp, index) in purchasedNetapps" :key="index">
            <th scope="row">
              <a
                :href="
                  purchasedNetapp.netapp.slug
                    ? '/netapp-details/' + purchasedNetapp.netapp.slug
                    : '/netapp-details/' + purchasedNetapp.netapp.id
                "
                >{{ purchasedNetapp.netapp.name }}</a
              >
            </th>
            <td>
              {{ purchasedNetapp.created_at }}
            </td>
            <td>{{ purchasedNetapp.netapp.user.email }}</td>
            <td>{{ purchasedNetapp.user.email }}</td>
            <td>
              <a href="#">link</a>
            </td>
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
      purchasedNetapps: [],
    };
  },
  created() {
    this.handleLoader("show");
    axios
      .get("api/purchased-netapp")
      .then((response) => {
        this.purchasedNetapps = response.data.data;
        this.handleLoader("hide");
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>

<template>
  <div id="total-netapps-created">
    <div class="table-responsive mb-5">
      <p>Results</p>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Version</th>
            <th scope="col">Registration Date</th>
            <th scope="col">Availability</th>
            <th scope="col">Contact</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(netapp, index) in netapps" :key="index">
            <th scope="row">
              <a
                :href="
                  netapp.slug
                    ? '/netapp-details/' + netapp.slug
                    : '/netapp-details/' + netapp.id
                "
                >{{ netapp.name }}</a
              >
            </th>
            <td>V {{ netapp.version }}</td>
            <td>{{ netapp.created_at }}</td>
            <td>
              <p v-if="netapp.visible == 1">Visible to maketplace</p>
              <p v-else>Not Visible to maketplace</p>
            </td>
            <td>{{ netapp.user.email }}</td>
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
      netapps: [],
    };
  },
  created() {
    this.handleLoader("show");
    axios
      .get("api/netapps")
      .then((response) => {
        this.netapps = response.data.data;
        this.handleLoader("hide");
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>
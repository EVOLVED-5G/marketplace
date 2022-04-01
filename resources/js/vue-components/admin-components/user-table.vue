<template>
  <div id="total-users">
    <div class="table-responsive mb-5">
      <p>Results</p>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">User Name</th>
            <th scope="col">e-mail</th>
            <th scope="col">Number of Net apps created</th>
            <th scope="col">Number of Net apps purchased</th>
            <th scope="col">Last Login</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(user, index) in users" :key="index">
            <th scope="row">{{ user.name }}</th>
            <td>{{ user.email }}</td>
            <td>{{ user.netapps_count }}</td>
            <td>{{ user.purchased_netapp_count }}</td>
            <td>4 Dec 2021</td>
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
      users: [],
    };
  },
  created() {
    this.handleLoader("show");
    axios
      .get("api/users")
      .then((response) => {
        this.users = response.data.data;
        this.handleLoader("hide");
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>
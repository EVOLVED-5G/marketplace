<template lang="">
    <transition name="modal" v-if="open" @click="cancel">
        <div class="modal-mask">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex" id="exampleModalLabel">
                            <img loading="lazy" src="/img/success.modal.png" alt="success.modal" />
                        </h5>
                    </div>
                    <div class="modal-body">
                        <h1>Your purchase was successful!</h1>
                        <p class="text-start">The NetApp {{this.netappName}} successfully purchased. You will soon receive an
                            e-mail containing more details about your purchase.<br><br>You can see your purchase in your dashboard:</p>

                        <div class="row mb-5 mt-5">
                            <div class="col-lg-6 col-md-8 col-sm-12 mx-auto">
                                <a id="dashboard-btn" href="/welcome-dashboard" type="button" class="btn btn--primary btn-lg w-100">Visit your Dashboard</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--tertiary" data-bs-dismiss="modal" aria-label="Close" @click="cancel">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </transition>



</template>
<script>
export default {
  name: "purchased-netapp-modal",
  props: {
    allowClose: Boolean,
    open: false,
    netappId: Number,
    classes: "",
    netappName: null,
  },
  methods: {
    cancel() {
      this.open = false;
      window.location.reload();
    },
  },
};
</script>
<style scoped lang="scss">
@import "resources/sass/modal";

#dashboard-btn {
  font-size: 1.3rem;
}
</style>

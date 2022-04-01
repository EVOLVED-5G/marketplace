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
                        <p>The item named "<b>NetApp 1</b>" was added to your dashboard. You will find
                            details to your e-mail such as useful links of your purchase:</p>

                        <div class="row mb-5 mt-5">

                            <ul class="text-details text-start ">Links

                                <li class="mt-1"> <a href="#">Blockchain confirmation </a></li>
                                <li><a href="#">Blockchain confirmation 2</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn--tertiary" data-bs-dismiss="modal" aria-label="Close" @click="cancel">OK</button>
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
  },
  methods: {
    cancel() {
      this.open = false;
    },
  },
};
</script>
<style scoped lang="scss">
@import "resources/sass/modal";
</style>

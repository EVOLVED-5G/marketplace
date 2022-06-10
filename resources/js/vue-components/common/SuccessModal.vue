<template lang="">
    <transition name="modal" v-if="open" @click="cancel">
        <div class="modal-mask">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <button
                        type="button"
                        class="btn-close"
                        @click="cancel"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                    <div class="modal-header justify-content-center">
                        <h5 class="modal-title d-flex" id="exampleModalLabel">
                            <img
                                loading="lazy"
                                src="/img/success.modal.png"
                                alt="success.modal"
                            />
                        </h5>
                    </div>
                    <div class="modal-body mb-5">
                      <slot></slot>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <!-- <a :href="this.link">
                            <button
                                type="button"
                                class="btn btn--tertiary mb-3"
                                data-bs-dismiss="modal"
                            >
                                Proceed
                            </button></a
                        > -->

                        <a  class="btn btn--tertiary mb-3" :href="this.link">OK</a>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>
<script>
export default {
  props: {
    allowClose: Boolean,
    open: false,
    link: null,
    netappId: Number,
    classes: "",
  },
  methods: {
    cancel() {
      this.open = false;
      this.$emit("canceled");
      window.location.reload();
    },
  },
};
</script>
<style scoped lang="scss">
@import "resources/sass/modal";
</style>

<template>
  <div class="container mb-5" style="max-width: 730px">
    <div
      class="row gx-3 mb-3"
      v-for="pricing in this.pricings"
      :key="pricing.id"
    >
      <div class="col text-center ps-0" v-if="pricing.paymentplan.length > 0">
        <div class="p-3 border bg-light card">
          <h4 class="mb-4">For calls made to {{ pricing.url }}</h4>
          <div
            class="row row-calls mb-2 ms-2 me-2 p-2"
            v-for="paymentplan in pricing.paymentplan"
            :key="paymentplan.id"
          >
            <div class="col col-calls">
              <h4 class="mb-0">{{ paymentplan.from }}-{{ paymentplan.to }}</h4>
              <span>calls</span>
            </div>
            <div class="col">
              <h4 class="mb-0">{{ paymentplan.cost }}€</h4>
              <span> (no cost)</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    pricings: { type: Array, default: () => [] },
  },
};
</script>
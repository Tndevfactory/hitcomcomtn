<template>
  <button class="btn btn-primary d-block" @click="setCart(productId)">
    <span class="d-none d-md-block"> {{ $t("Add to cart") }}</span>
    <span class="d-block d-md-none"
      ><i class="fa-solid fa-cart-shopping"></i
    ></span>
  </button>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "setCart",

  props: ["csrfToken", "currency", "language", "productId"],

  computed: mapGetters(["cart", "loading", "success", "error"]),

  methods: {
    ...mapActions(["setCart"]),
  },

  created() {
    this.$i18n.locale = this.language;
  },
};
</script>

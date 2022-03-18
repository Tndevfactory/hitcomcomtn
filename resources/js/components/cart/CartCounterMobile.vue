<template>
  <div class="counter" @mouseover="hover = true" @mouseleave="hover = false">
    <a href="#" class="counter-link">
      <span v-if="cartCounter" class="counter-digit"> {{ cartCounter }}</span>

      <i class="counter-icon fas fa-shopping-cart"></i>
    </a>
    <Transition>
      <div
        v-if="hover"
        class="rounded-3 cart-detail shadow"
        :class="classObject"
        :style="styleObject"
      >
        <ul class="list-group list-unstyled p-1">
          <li
            class="row row-cols-2 gx-1 bg-white d-flex align-items-center p-1"
          >
            <span class="col fw-bold" style="font-size: 0.9rem">{{
              $t("counter.Items")
            }}</span>

            <span class="col badge text-primary">{{ cartCounter }} </span>
          </li>
          <li class="row row-cols-2 gx-1 bg-white d-flex align-items-cente p-1">
            <span class="col fw-bold" style="font-size: 0.9rem">{{
              $t("counter.Total")
            }}</span>

            <span class="col badge text-primary">
              <span class="text-primary">
                {{ currency === "euro" ? "€" : "$" }}
              </span>
              {{ currency === "euro" ? euroValue : dollarValue(cartTotal) }}
            </span>
          </li>
        </ul>
      </div>
    </Transition>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "myCartCounterMobile",

  props: ["csrfToken", "currency", "language", "productId", "view"],
  data() {
    return {
      hover: false,
      isActive: true,
    };
  },

  computed: {
    ...mapGetters([
      "cartCounter",
      "cartTotal",
      "euroCoefficient",

      "loading",
      "success",
      "error",
    ]),
    euroValue() {
      let eurov = parseFloat(this.cartTotal) * parseFloat(this.euroCoefficient);
      return eurov ? eurov.toFixed(2) : 0.0;
    },
    dollarValue() {
      return (value) => value.toFixed(2);
    },
    classObject() {
      return {
        active: this.isActive,
        // "bg-primary": this.language === "ar" ? true : false,
      };
    },
    styleObject() {
      return {
        active: this.isActive,
        "font-size": this.language === "ar" ? "1.3rem" : "1.3rem",
        left: this.language === "ar" ? "-25px" : "-190px",
        "background-color": this.language === "ar" ? "#bbb" : "#bbb",
      };
    },
  },
  methods: {
    ...mapActions(["cartCount", "setEuroCoefficient"]),
  },

  created() {
    this.$i18n.locale = this.language;
    this.cartCount();
    this.setEuroCoefficient();
  },
};
</script>

<style scoped>
.counter {
  display: inline-block;
  position: relative;
  width: 2rem;
  height: 2rem;
  margin-left: 5px;
  margin-right: 1px;
}
.counter-link {
  position: relative;
  display: inline-block;
  width: 2rem;
  height: 2rem;
  text-decoration: none;
}
.counter-digit {
  position: absolute;
  display: flex;
  justify-content: center;
  align-items: center;

  top: -18px;
  left: 5px;
  width: 1.7rem;
  height: 1.7rem;
  font-size: 0.8rem;
  border-radius: 50%;
  font-weight: 600;
  background-color: rgb(207, 25, 25);
  color: white;
}
.counter-icon {
  position: absolute;
  display: inline-block;
  top: 10px;
  left: 0;
  color: rgb(126, 131, 136);
}
.cart-detail {
  position: absolute;
  display: block;
  /* width: 11rem; */
  display: block;
  top: 30px;
  min-width: 15rem;
  /* left: 0px;*/

  color: black;
}
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>

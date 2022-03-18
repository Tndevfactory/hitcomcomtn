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
            v-for="item in cart"
            :key="item.id"
            class="row row-cols-2 gx-1 bg-white d-flex align-items-center p-1"
          >
            <div
              class="col-7 fw-bold d-flex justify-content-start"
              style="font-size: 0.9rem"
            >
              {{ item.product_name }}
            </div>

            <div
              class="col-5 price badge text-primary d-flex align-items-center justify-content-end"
            >
              <span class="text-primary">
                {{ currency === "euro" ? "€" : "$" }}
              </span>
              <span>
                {{
                  currency === "euro"
                    ? euroValue(item.price).toFixed(2)
                    : dollarValue(item.price)
                }}
              </span>
            </div>
          </li>

          <li
            class="row row-cols-2 gx-1 bg-white d-flex align-items-center p-1"
          >
            <span
              class="col-7 fw-bold d-flex justify-content-start"
              style="font-size: 0.9rem"
              >{{ $t("counter.Items") }}</span
            >

            <span class="col-5 item-number badge text-primary"
              >{{ cartCounter }}
            </span>
          </li>
          <li
            class="row row-cols-2 gx-1 bg-white d-flex align-items-center p-1"
          >
            <span
              class="col-7 fw-bold d-flex justify-content-start"
              style="font-size: 0.9rem"
              >{{ $t("counter.Total") }}</span
            >

            <div
              class="col-5 price badge text-primary d-flex align-items-center justify-content-end"
            >
              <span class="text-primary">
                {{ currency === "euro" ? "€" : "$" }}
              </span>

              <span>
                {{
                  currency === "euro"
                    ? euroValue(cartTotal).toFixed(2)
                    : dollarValue(cartTotal)
                }}
              </span>
            </div>
          </li>
        </ul>
      </div>
    </Transition>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "myCartCounter",

  props: ["csrfToken", "currency", "language", "productId", "view"],
  data() {
    return {
      hover: false,
      isActive: true,
    };
  },

  computed: {
    ...mapGetters([
      "cart",
      "compta",
      "cartCounter",
      "cartTotal",
      "euroCoefficient",

      "loading",
      "success",
      "error",
    ]),

    euroValue() {
      return (value) => parseFloat(value) * parseFloat(this.euroCoefficient);
    },
    dollarValue() {
      return (value) => parseFloat(value).toFixed(2);
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
    ...mapActions(["cartCount"]),
  },

  created() {
    this.$i18n.locale = this.language;
    this.cartCount();
    // let bearerToken = Vue.$cookies.get("bearerToken");
    // console.log(bearerToken);
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
  min-width: 16rem;
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

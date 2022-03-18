import VueI18n from "vue-i18n";
import Vuex from "vuex";
import Vue from "vue";
import store from "./store/index.js";
import { gsap } from "gsap";
// import "dtoaster/dist/dtoaster.css";
import "../css/dtoaster.css";
import DToaster from "dtoaster";
import ToasterPresets from "./json/toast_presets.json"; //Your predefined toasts presets (optionally)

import VueCookies from "vue-cookies";

import * as ar from "./../lang/ar.json";
import * as fr from "./../lang/fr.json";
import * as en from "./../lang/en.json";

console.clear();

Vue.use(VueCookies);

// // set default config
// Vue.$cookies.config("7d");

// // set global cookie
// Vue.$cookies.set("lang", "en");

//
Vue.use(DToaster, {
  presets: ToasterPresets,
  position: "top-right", //toasts container position on the screen
  containerOffset: "45px", //toasts container offset from top/bottom of the screen
});

window.Vue = require("vue").default;
Vue.use(Vuex);

window.axios = require("axios");
window._ = require("lodash");

// axios config  lives here -----------------------------------------------------

// token get
let csrfToken = document.head.querySelector('meta[name="csrf-token"]');

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.axios.defaults.headers.common["Accept"] =
  "application/json, text/plain, */*";
window.axios.defaults.headers.common["Content-Type"] =
  "application/x-www-form-urlencoded";

// detect production mode
let appEnv = document.querySelector('meta[name="app-env"]').content;

console.warn("Developer contact:");
console.warn("Website: https://tndev-art.tn");
console.warn("WhatsApp/Tel: 0021655385474");
console.warn("Email: tndev8@gmail.com");

// if (appEnv === "production") {
//   Vue.config.devtools = false;
//   Vue.config.debug = false;
//   Vue.config.silent = true;
// }

// detect base url
let url = document.querySelector('meta[name="base-url"]').content;

window.axios.defaults.baseURL = url + "api";

if (csrfToken) {
  window.axios.defaults.headers.common["X-CSRF-TOKEN"] = csrfToken.content;
  //console.log(token.content);
} else {
  console.error(
    "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
  );
}
// console.log("base url");
// console.log(process.env.MIX_APP_ENV);
//console.log(window.axios.defaults.baseURL);
let t =
  "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMGE0NDM0MWUxYTgzYzgzMDhlOTAzNjlkN2JjZDY0ZjliMjlmMzVhY2MzNzlmOTE4MGQ4YTJjZjJmOWE1MDFkNjZjZjhlOGI0YjY4ZTExOTUiLCJpYXQiOjE2NDc1OTE4MDUuNDQzNDgzLCJuYmYiOjE2NDc1OTE4MDUuNDQzNDk2LCJleHAiOjE2NzkxMjc4MDUuMjYwMTk4LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.qxXnvZn2_13kDVSI_YTgy47Sw6NnMPZso4lX6KAd464NUXdy-zCT24E-uEHrgdiqOtQRjzxkH5N2ROajvVwNq-vw01s3Wt8GIAReViRIc9704XD1NQasvD8uGGw2gzdCIVUQrcidK9QN9dWmsKGYAkCi_ePiM6w-5OjwT9TTFhIxrBPPOKe0Pt0eM4mq_r6Anb5gnh_5pRLTHOXhrtbojJUcXIR4sh4TRb4pmmwrH8cxZ3bGJP4qoOOH4-ShRidIYLTrfTsz8b78yq0iWgOJo9XxR5rsET08oP0wU98Dr49E3Pr-nyzF7-hndvZGLXyPT-RzNsiqIqz8ajCuIQGVpEqRIchlXM1xUNGzxeEPYga4jizN00k6zg-rc06UxnU5o_lKlW1LPGbK16LPAgBHGarE8m2cW62_1XxaQgYLwbBCs-Hbbo_h6CvSI3rDBOQNpjY35XFwCNzmgjy-Y2CAs8aPlg-jHcejs46bU3QKAyuG7mGQ2WkjBaGa_bK4JyA8_KcnPJefg9RUsvubE0tpJQ1LX-VWLL_LlkReD3LhXVSOO2uo_pRnFXk_piC44_Ec4dXj70Um4HoP8Ag-_tWqD4eXnNCSdAGgOMKM9bYYLkM5nPCZ57u4n1n9a_8zGPGiEH14iaJd5qmnEBA9FLu3rQLaj4b5O93Zbk5UYDjXS38";
Vue.$cookies.set("bearerToken", t);
let bearerToken = Vue.$cookies.get("bearerToken");
// console.log(bearerToken);
window.axios.defaults.headers.common["Authorization"] = "Bearer" + bearerToken;
//window.axios.defaults.headers.common['Authorization'] = AUTH_TOKEN;
//window.axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';

// component  lives here -----------------------------------------------------

// lab zone ----------------------------------------------
Vue.component(
  "example-component",
  require("./components/lab/ExampleComponent.vue").default
);

// todos zone ------------------------------------------
Vue.component("todos-api", require("./components/todos/Todos.vue").default);

// common zone ------------------------------------------

Vue.component(
  "loading-spinner",
  require("./components/common/Loading.vue").default
);

Vue.component(
  "error-message",
  require("./components/common/ErrorMessage.vue").default
);

Vue.component(
  "success-message",
  require("./components/common/SuccessMessage.vue").default
);

// cart zone ------------------------------------------

Vue.component(
  "cart-counter",
  require("./components/cart/CartCounter.vue").default
);

Vue.component(
  "cart-counter-mobile",
  require("./components/cart/CartCounterMobile.vue").default
);

Vue.component(
  "add-to-cart",
  require("./components/cart/AddToCartButton.vue").default
);
Vue.component("cart-list", require("./components/cart/CartList.vue").default);

// vue translation -----------------------------------------------------
const messages = { ar, fr, en }; // bring all translated files

// Create VueI18n instance with options
const i18n = new VueI18n({
  locale: "fr", // set default locale
  fallbackLocale: "en",
  messages,
});
// end vue translation -----------------------------------------------------

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

const app = new Vue({ i18n, store }).$mount("#app");

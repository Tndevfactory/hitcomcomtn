import Vuex from "vuex";
import Vue from "vue";
import createPersistedState from "vuex-persistedstate";
import common from "./modules/common";
import cart from "./modules/cart";
import todos from "./modules/todos";

// Load Vuex
Vue.use(Vuex);

// Create store
export default new Vuex.Store({
  modules: {
    common,
    cart,
    todos,
  },
  // plugins: [createPersistedState()],
});

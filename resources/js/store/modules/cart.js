import axios from "axios";
import common from "./common";

const state = {
  cart: [],
  compta: [],
  cartCounter: 0,
  cartTotal: 0,
  euroCoefficient: 0,
};

const getters = {
  cart: (state) => state.cart,
  compta: (state) => state.compta,
  cartCounter: (state) => state.cartCounter,
  cartTotal: (state) => state.cartTotal,
  euroCoefficient: (state) => state.euroCoefficient,
};

const mutations = {
  setCompta: (state, compta) => (state.compta = compta),
  setCart: (state, cartItem) => (state.cart = cartItem),
  cartCount: (state, cartCounter) => (state.cartCounter = cartCounter),
  cartTotal: (state, cartTotal) => (state.cartTotal = cartTotal),
  setEuroCoefficient: (state, euroCoefficient) =>
    (state.euroCoefficient = euroCoefficient),

  newTodo: (state, todo) => state.todos.unshift(todo),

  removeTodo: (state, id) =>
    (state.todos = state.todos.filter((todo) => todo.id !== id)),

  updateTodo: (state, updTodo) => {
    const index = state.todos.findIndex((todo) => todo.id === updTodo.id);
    if (index !== -1) {
      state.todos.splice(index, 1, updTodo);
    }
  },
};

const actions = {
  async setEuroCoefficient({ commit }) {
    return 1;
  },
  async setCompta({ commit }) {
    return 1;
  },
  async setCart({ commit }, productId) {
    // console.log(common.state.lang);
    let lang = common.state.lang;

    commit("setLoading", true);
    let url = "/add-to-cart";
    let pid = { params: { productId: productId } };
    try {
      const response = await axios.get(url, pid);

      if (response.status === 200) {
        commit("setCart", response.data.cart);
        commit("setCompta", response.data.compta);

        commit("cartCount", response.data.cart_counter);
        commit("cartTotal", response.data.total_cart);
        commit("setLoading", false);
        commit("setSuccess", response.data.responseBackend);
        console.log(response);
      } else if (response.data.response_code === 403) {
        console.log(response);
        console.log("setcart-action");
        commit("setError", response.data.responseBackend);
        commit("setLoading", false);
      } else {
        console.log(response);
        console.log("setcart-action");
        commit("setError", response.data.responseBackend);
        commit("setLoading", false);
      }
    } catch (err) {
      commit("setError", response.data.responseBackend);
      commit("setLoading", false);
    }

    setTimeout(() => {
      commit("setSuccess", "");
      commit("setError", "");
    }, 4000);
  },

  async cartCount({ commit }) {
    commit("setLoading", true);
    let url = "/check-cart-count";
    try {
      const response = await axios.get(url);

      // let bearerToken = Vue.$cookies.get("bearerToken");
      // console.log(bearerToken);

      if (response.status === 200) {
        commit("cartCount", response.data.cart_counter);
        commit("cartTotal", response.data.total_cart);
        commit("setEuroCoefficient", response.data.euroCoefficient);
        commit("setCart", response.data.cart);
        commit("setCompta", response.data.compta);
        commit("setLoading", false);
      } else if (response.data.response_code === 403) {
        commit("setError", response.data.responseBackend);
        commit("setLoading", false);
      } else {
        commit("setError", response.data.responseBackend);
        commit("setLoading", false);
      }
    } catch (err) {
      commit("setError", response.data.responseBackend);
      commit("setLoading", false);
    }

    setTimeout(() => {
      commit("setSuccess", "");
      commit("setError", "");
    }, 4000);
  },

  async filterTodos({ commit }, e) {
    // Get selected number
    const limit = parseInt(
      e.target.options[e.target.options.selectedIndex].innerText
    );

    const response = await axios.get(
      `https://jsonplaceholder.typicode.com/todos?_limit=${limit}`
    );

    commit("setTodos", response.data);
  },

  async updateTodo({ commit }, updTodo) {
    const response = await axios.put(
      `https://jsonplaceholder.typicode.com/todos/${updTodo.id}`,
      updTodo
    );

    console.log(response.data);

    commit("updateTodo", response.data);
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};

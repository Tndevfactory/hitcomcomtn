import axios from "axios";
import "dtoaster/dist/dtoaster.css";

const state = {
  loading: false,
  success: "",
  error: "",
  lang: "",
};

const getters = {
  loading: (state) => state.loading,
  success: (state) => state.success,
  error: (state) => state.error,
  lang: (state) => state.lang,
};

const mutations = {
  setSuccess: (state, newStatus) => (state.success = newStatus),

  setError: (state, newStatus) => (state.error = newStatus),

  setLoading: (state, newStatus) => (state.loading = newStatus),

  setLang: (state, newLang) => (state.lang = newLang),
};
const actions = {
  setLang({ commit, state }, newLang) {
    commit("setLang", newLang);
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};

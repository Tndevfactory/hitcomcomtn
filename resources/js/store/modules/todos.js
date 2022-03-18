import axios from "axios";
import "dtoaster/dist/dtoaster.css";

const state = {
  todos: [],
};

const getters = {
  allTodos: (state) => state.todos,
};

const mutations = {
  setTodos: (state, todos) => (state.todos = todos),

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
  async fetchTodos({ commit }, url = "/cart") {
    commit("setLoading", true);

    try {
      const response = await axios.get(url);
      if (response.status === 200) {
        commit("setTodos", response.data.products);
        commit("setLoading", false);

        commit("setSuccess", "success");
      } else {
        commit("setError", "errorCom");
        commit("setLoading", false);
      }
    } catch (err) {
      console.log(err);
      commit("setError", "errorNetwork");
      commit("setLoading", false);
    }
    setTimeout(() => {
      commit("setSuccess", "");
      commit("setError", "");
    }, 4000);
  },

  async addTodo({ commit }, title) {
    const response = await axios.post(
      "https://jsonplaceholder.typicode.com/todos",
      { title, completed: false }
    );

    commit("newTodo", response.data);
  },

  async deleteTodo({ commit }, id) {
    await axios.delete(`https://jsonplaceholder.typicode.com/todos/${id}`);

    commit("removeTodo", id);
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

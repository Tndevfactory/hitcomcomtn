<template>
  <button class="btn btn-primary" v-on:click="addCounter()">+</button>
</template>

<script>
import store from "../../store/store";
import * as type from "../../store/counter/counterMutationTypes";

export default {
  methods: {
    addCounter() {
      store.dispatch({
        type: type.Increment,
        amount: 20,
      });
    },
  },
};
</script>

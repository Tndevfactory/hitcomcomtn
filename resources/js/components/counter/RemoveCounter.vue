<template>
  <button class="btn btn-danger" v-on:click="removeCounter()">-</button>
</template>

<script>
import store from "../../store/store";
import * as type from "../../store/counter/counterMutationTypes";

export default {
  methods: {
    removeCounter() {
      store.dispatch({
        type: type.Decrement,
        amount: 20,
      });
    },
  },
};
</script>

<template>
  <div class="container">
    <div class="row justify-content-center w-25">
      <div class="col">
        <AddCounter></AddCounter>
      </div>
      <div class="col">
        <Counter></Counter>
      </div>
      <div class="col">
        <RemoveCounter></RemoveCounter>
      </div>
    </div>
  </div>
</template>
<script>
import Counter from "./Counter.vue";
import AddCounter from "./AddCounter.vue";
import RemoveCounter from "./RemoveCounter.vue";

export default {
  components: {
    Counter,
    AddCounter,
    RemoveCounter,
  },
};
</script>

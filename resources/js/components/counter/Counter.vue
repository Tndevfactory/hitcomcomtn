<template>
  <div class="container">
    <div class="notification">
      <h1 class="title" align="center">
        {{ count }}
      </h1>
    </div>

    <div class="row">
      <div class="col-12">
        <div
          class="card"
          v-for="card in cards"
          :key="card.id"
          @click="simpleFade"
        >
          <div class="card-inner">
            <div class="card-name">{{ card.name }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";

const myCards = [
  {
    id: 0,
    name: "Prima carta",
  },
];

export default {
  computed: mapState({
    count: (state) => state.count,
  }),
  watch: {
    count(newValue, oldValue) {
      console.log(`count Updating from ${oldValue} to ${newValue}`);

      if (newValue > oldValue) {
        this.$dtoast.pop({
          preset: "success",
          heading: "Success",
          content: "Product incremented successfully",
        });
      } else {
        this.$dtoast.pop({
          preset: "fail",
          heading: "Error",
          content: "Product decremented .",
        });
      }
    },
  },
  mounted() {
    console.log(`The initial dtoast.`);
  },
  data() {
    return {
      cards: myCards,
    };
  },
  methods: {
    simpleFade(event) {
      gsap.fromTo(
        event.target,
        { autoAlpha: 1 },
        { autoAlpha: 0, duration: 0.35 }
      );
    },
  },
};
</script>

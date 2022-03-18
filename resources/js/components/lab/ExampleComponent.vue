<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">vue Component</div>
          <label for="locale">locale</label>
          <h1 class="locale">{{ $t("wishlist") }}</h1>

          <div class="card-body">
            exemple simple props {{ numberx }} {{ stringx }} {{ csrfToken }}
          </div>
          <h1>{{ currency }}</h1>
          <h1>{{ language }}</h1>
          <button @click="increment">Count is: {{ count }}</button>

          <ul v-for="category in categories" :key="category.id">
            <li>{{ category.id }}</li>
          </ul>
        </div>

        <div id="axios">
          {{ info }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: [
    "categories",
    "numberx",
    "stringx",
    "csrfToken",
    "currency",
    "language",
  ],
  data() {
    return {
      count: 0,
      lang: this.language,
      info: null,
    };
  },

  watch: {
    lang: function (val) {
      console.log("changed");
      console.log(val);
      this.$i18n.locale = val;
    },
  },

  created() {
    // props are exposed on `this`
    // console.log(this.language);
    this.$i18n.locale = this.language;
  },
  methods: {
    increment() {
      this.count++;
      this.lang = "fr";
    },
  },

  mounted() {
    console.log(`The initial count is ${this.count}.`);
    axios
      .get("https://api.coindesk.com/v1/bpi/currentprice.json")
      .then((response) => (this.info = response));

    this.$dtoast.pop({
      preset: "success",
      color: "red",
      heading: "Toast with a different heading",
      content: "Toast with a different content",
    });
  },
};
</script>

<style scoped>
button {
  font-weight: bold;
  color: coral;
}
.locale {
  color: rgb(183, 20, 233);
}
</style>

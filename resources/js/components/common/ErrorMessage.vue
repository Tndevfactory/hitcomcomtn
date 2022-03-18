<template></template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "errorMessage",
  props: ["language"],

  computed: mapGetters(["error", "lang"]),
  methods: {
    ...mapActions(["setLang"]),
  },
  watch: {
    error(newValue, oldValue) {
      if (newValue) {
        this.$dtoast.pop({
          preset: "fail",
          heading: "Error",
          content: newValue,
        });
      }
    },
  },
  created() {
    this.$i18n.locale = this.language;
    this.setLang(this.language);
  },
};
</script>

<template></template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "successMessage",
  props: ["language"],

  computed: mapGetters(["success", "lang"]),
  methods: {
    ...mapActions(["setLang"]),
  },

  watch: {
    success(newValue, oldValue) {
      if (newValue) {
        this.$dtoast.pop({
          preset: "success",
          heading: "success",
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

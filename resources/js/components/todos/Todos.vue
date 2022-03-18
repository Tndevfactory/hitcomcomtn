<template>
  <div>
    <div class="currency">{{ currency }}</div>
    <div class="language">{{ language }}</div>
    <div class="csrf_token">{{ csrfToken }}</div>
    <h1 class="locale">{{ $t("wishlist") }}</h1>
    <div class="addTodo mb-3">
      <AddTodo />
    </div>
    <div class="filterTodo mb-3">
      <FilterTodos />
    </div>

    <div v-if="!allTodos.data" class="data empty">empty data</div>
    <div v-else-if="!loading" class="todos">
      <div
        @dblclick="onDblClick(todo)"
        v-for="todo in allTodos.data"
        :key="todo.id"
        class="todo"
        :class="{ 'is-complete': todo.completed }"
      >
        {{
          language === "fr"
            ? todo.fr_product_name
            : language === "en"
            ? todo.en_product_name
            : todo.ar_product_name
        }}

        <i @click="deleteTodo(todo.id)" class="fas fa-trash-alt"></i>
      </div>
    </div>

    <nav aria-label="pagination" class="my-3">
      <ul class="pagination justify-content-center">
        <li
          v-for="(link, index) in allTodos.links"
          :key="index"
          class="page-item"
          :class="{ active: link.active, disabled: link.url ? false : true }"
        >
          <a
            class="page-link"
            v-html="link.label"
            href="#"
            @click.prevent="fetchTodos(link.url)"
          ></a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Loading from "../common/Loading.vue";
import AddTodo from "./AddTodo.vue";
import FilterTodos from "./FilterTodos.vue";

export default {
  name: "Todos",
  components: {
    Loading,
    AddTodo,
    FilterTodos,
  },
  props: ["csrfToken", "currency", "language"],
  data() {
    return {
      fr: {
        success: "Todos trouvé avec succès ",
        errorCom: "Échec de la communication avec le serveur",
        errorNetwork:
          "Error : serveur hors ligne ou point de terminaison d'URL incorrect",
      },
      en: {
        success: "Todos found successfully ",
        errorCom: "Failure in communication with server",
        errorNetwork: "Error: Server offline or incorrect URL endpoint",
      },
      ar: {
        success: "تم العثور على Todos بنجاح ",
        errorCom: "فشل الاتصال بالخادم",
        errorNetwork: "خطأ: الخادم غير متصل أو نقطة نهاية عنوان url خاطئة",
      },
    };
  },
  methods: {
    ...mapActions(["fetchTodos", "deleteTodo", "updateTodo"]),
    onDblClick(todo) {
      const updTodo = {
        id: todo.id,
        title: todo.title,
        completed: !todo.completed,
      };
      this.updateTodo(updTodo);
    },
  },
  computed: mapGetters(["allTodos", "loading", "success", "error"]),

  watch: {
    success(newValue, oldValue) {
      // console.log(newValue);
      if (newValue === "success") {
        this.$dtoast.pop({
          preset: "success",
          heading: "Success",
          content:
            this.language === "fr"
              ? this.fr.success
              : this.language === "en"
              ? this.en.success
              : this.ar.success,
        });
      }
    },
    error(newValue, oldValue) {
      // console.log(newValue);
      if (newValue === "errorCom") {
        this.$dtoast.pop({
          preset: "fail",
          heading: "Error",
          content:
            this.language === "fr"
              ? this.fr.errorCom
              : this.language === "en"
              ? this.en.errorCom
              : this.ar.errorCom,
        });
      } else {
        console.log(newValue);
        this.$dtoast.pop({
          preset: "fail",
          heading: "Error",
          content:
            this.language === "fr"
              ? this.fr.errorNetwork
              : this.language === "en"
              ? this.en.errorNetwork
              : this.ar.errorNetwork,
        });
      }
    },
  },
  created() {
    // console.log(this.language);
    // let lang = this.language;
    this.fetchTodos();
    Vue.$cookies.set("lang", this.language);
    this.$i18n.locale = this.language;
    // console.log(this.$cookies.isKey("lang"));
    // console.log(this.$cookies.get("lang"));
  },
};
</script>

<style scoped>
.todos {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 1rem;
}
.todo {
  border: 1px solid #ccc;
  background: #41b883;
  padding: 1rem;
  border-radius: 5px;
  text-align: center;
  position: relative;
  cursor: pointer;
}
i {
  position: absolute;
  bottom: 10px;
  right: 10px;
  color: #fff;
  cursor: pointer;
}
.legend {
  display: flex;
  justify-content: space-around;
  margin-bottom: 1rem;
}
.complete-box {
  display: inline-block;
  width: 10px;
  height: 10px;
  background: #35495e;
}
.incomplete-box {
  display: inline-block;
  width: 10px;
  height: 10px;
  background: #41b883;
}
.is-complete {
  background: #35495e;
  color: #fff;
}
@media (max-width: 500px) {
  .todos {
    grid-template-columns: 1fr;
  }
}
</style>

<template>
   <v-container fluid grid-list-md>
      <v-layout row wrap>
         <v-flex xs10>
            <list :questions="questions"></list>
            <div class="text-center">
               <v-pagination
                  v-model="meta.current_page"
                  :length="meta.last_page"
                  @input="changePage"
               ></v-pagination>
            </div>
         </v-flex>

         <v-flex xs2>
            <Sidebar />
         </v-flex>
      </v-layout>
   </v-container>
</template>

<script>
import Question from "../forum/Question";
import List from "../forum/List";
import Sidebar from "../forum/Sidebar";
export default {
   data() {
      return {
         questions: [],
         meta: {},
      };
   },
   components: { Question, Sidebar, List },
   created() {
      this.fetchQuestions();
   },
   watch: {
      $route(to, from) {
         this.fetchQuestions();
      },
   },
   methods: {
      fetchQuestions(page) {
         const slug = this.$route.params.slug;
         let url = page
            ? `/api/category/${slug}/?page=${page}`
            : `/api/category/${slug}`;
         axios
            .get(url)
            .then((res) => {
               this.questions = res.data.data;
               this.meta = res.data.meta;
            })
            .catch((error) => console.log(error.response.data));
      },
      changePage(page) {
         this.fetchQuestions(page);
      },
   },
};
</script>

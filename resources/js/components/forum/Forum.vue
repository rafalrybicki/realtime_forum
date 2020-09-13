<template>
   <v-container fluid grid-list-md>
      <v-layout row wrap>
         <v-flex xs8>
            <question v-for="question in questions" :key="question.path" :data="question"></question>

            <!-- <div class="text-xs-center">
                    <v-pagination
                        v-model="meta.current_page"
                        :length="meta.total"
                        @input="changePage"
                    ></v-pagination>
            </div>-->
         </v-flex>

         <v-flex xs4>
            <Sidebar />
         </v-flex>
      </v-layout>
   </v-container>
</template>

<script>
import Question from "./Question";
import Sidebar from "./Sidebar";
export default {
   data() {
      return {
         questions: {},
         meta: {},
      };
   },
   components: { Question, Sidebar },
   created() {
      this.fetchQuestions();
   },
   methods: {
      fetchQuestions(page) {
         let url = page ? `/api/question?page=${page}` : "/api/question";
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

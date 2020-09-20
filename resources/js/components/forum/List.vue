<template>
   <fragment>
      <question v-for="question in questions" :key="question.slug" :data="question"></question>
   </fragment>
</template>

<script>
import { Fragment } from "vue-fragment";
import Question from "./Question";

export default {
   components: { Fragment, Question },
   props: ["questions"],
   created() {
      this.listen();
   },
   methods: {
      listen() {
         Echo.channel("deleteQuestionChannel").listen(
            "DeleteQuestionEvent",
            (e) => {
               const index = this.questions.findIndex(
                  (question) => question.id === e.id
               );
               this.questions.splice(index, 1);
            }
         );
         Echo.channel("addQuestionChannel").listen("AddQuestionEvent", (e) => {
            this.questions.unshift(e.question);
         });
         Echo.channel("updateQuestionChannel").listen(
            "UpdateQuestionEvent",
            (e) => {
               const index = this.questions.findIndex(
                  (question) => question.id === e.id
               );
               this.questions[index].title = e.title;
               this.questions[index].body = e.body;
            }
         );
      },
   },
};
</script>

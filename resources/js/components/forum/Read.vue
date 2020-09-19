<template>
   <div>
      <edit-question v-if="editing" :data="question"></edit-question>
      <show-question v-if="showQuestion" :question="question"></show-question>
      <v-container>
         <replies v-if="fetched" :question="question"></replies>
         <new-reply v-if="loggedIn"></new-reply>
      </v-container>
   </div>
</template>

<script>
import ShowQuestion from "./ShoWQuestion";
import EditQuestion from "./editQuestion";
import Replies from "../reply/Replies";
import NewReply from "../reply/NewReply";
export default {
   components: { ShowQuestion, EditQuestion, Replies, NewReply },
   data() {
      return {
         question: null,
         editing: false,
         fetched: false,
      };
   },
   created() {
      this.listen();
      this.getQuestion();
   },
   computed: {
      loggedIn() {
         return User.loggedIn();
      },
      showQuestion() {
         return this.fetched && this.editing === false;
      },
   },
   methods: {
      listen() {
         EventBus.$on("startEditingQuestion", () => {
            this.editing = true;
         });
         EventBus.$on("cancelEditingQuestion", () => {
            this.editing = false;
         });
      },
      getQuestion() {
         axios.get(`/api/question/${this.$route.params.slug}`).then((res) => {
            this.question = res.data.data;
            this.fetched = true;
         });
      },
   },
};
</script>

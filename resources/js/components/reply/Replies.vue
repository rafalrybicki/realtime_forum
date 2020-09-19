<template>
   <div>
      <reply
         v-for="(reply, index) in question.replies"
         :key="reply.id"
         :index="index"
         :data="reply"
      ></reply>
   </div>
</template>

<script>
import Reply from "./Reply";
export default {
   props: ["question"],

   components: { Reply },
   created() {
      this.listen();
   },
   methods: {
      listen() {
         EventBus.$on("newReply", (reply) => {
            this.question.replies.unshift(reply);
         });
         EventBus.$on("deleteReply", (index) => {
            axios
               .delete(
                  `/api/question/${this.question.slug}/reply/${this.question.replies[index].id}`
               )
               .then((res) => {
                  this.question.replies.splice(index, 1);
               });
         });
         EventBus.$on("cancelEditing", (reply) => {
            this.question.replies[reply.index].reply = reply.body;
         });
         Echo.channel("deleteReplyChannel").listen("DeleteReplyEvent", (e) => {
            const index = this.question.replies.findIndex(
               (reply) => reply.id === e.id
            );
            this.question.replies.splice(index, 1);
         });
         Echo.channel("addReplyChannel").listen("AddReplyEvent", (e) => {
            this.question.replies.unshift(e.reply);
         });
         Echo.channel("updateReplyChannel").listen("UpdateReplyEvent", (e) => {
            const index = this.question.replies.findIndex(
               (reply) => reply.id === e.id
            );
            this.question.replies[index].reply = e.body;
         });
      },
   },
};
</script>

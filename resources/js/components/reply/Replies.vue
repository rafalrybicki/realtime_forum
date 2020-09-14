<template>
   <div>
      <reply v-for="(reply, index) in replies" :key="reply.id" :index="index" :data="reply"></reply>
   </div>
</template>

<script>
import Reply from "./Reply";
export default {
   props: ["question"],
   data() {
      return {
         replies: this.question.replies,
      };
   },
   components: { Reply },
   created() {
      this.listen();
   },
   methods: {
      listen() {
         EventBus.$on("newReply", (reply) => {
            this.replies.unshift(reply);
         });
         EventBus.$on("deleteReply", (index) => {
            axios
               .delete(
                  `/api/question/${this.question.slug}/reply/${this.replies[index].id}`
               )
               .then((res) => {
                  this.replies.splice(index, 1);
               });
         });
         Echo.channel("deleteReplyChannel").listen("DeleteReplyEvent", (e) => {
            const index = this.replies.findIndex((reply) => reply.id === e.id);
            this.replies.splice(index, 1);
         });
         Echo.channel("addReplyChannel").listen("AddReplyEvent", (e) => {
            this.replies.unshift(e.reply);
         });
      },
   },
};
</script>

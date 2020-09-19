<template>
   <div class="mt-3">
      <v-card>
         <v-card-title>
            <div class="headline">{{ data.user }}</div>
            <div class="ml-2">said {{ data.created_at }}</div>
            <v-spacer></v-spacer>
            <like :content="data"></like>
         </v-card-title>
         <v-divider></v-divider>

         <edit-reply v-if="editing" :reply="data" :index="index"></edit-reply>

         <v-card-text v-else v-html="reply.reply"></v-card-text>

         <v-divider></v-divider>
         <div v-if="editing === false">
            <v-card-actions v-if="own">
               <v-btn icon small @click="edit">
                  <v-icon color="orange">mdi-pencil</v-icon>
               </v-btn>
               <v-btn icon small @click="destroy">
                  <v-icon color="red">mdi-delete</v-icon>
               </v-btn>
            </v-card-actions>
         </div>
      </v-card>
   </div>
</template>

<script>
import EditReply from "./EditReply";
import Like from "../like/Like";
export default {
   props: ["data", "index"],
   components: { EditReply, Like },
   data() {
      return {
         reply: this.data,
         editing: false,
      };
   },
   computed: {
      own() {
         return User.own(this.data.user_id);
      },
   },
   created() {
      this.listen();
   },
   methods: {
      destroy() {
         EventBus.$emit("deleteReply", this.index);
      },
      edit() {
         this.editing = true;
      },
      listen() {
         EventBus.$on("cancelEditing", (reply) => {
            this.editing = false;
         });
         Echo.channel("addReplyChannel").listen("updateReplyEvent", (e) => {
            console.log(e);
         });
      },
   },
};
</script>

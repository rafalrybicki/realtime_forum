<template>
   <v-card>
      <v-container fluid>
         <v-card-title>
            <div>
               <div class="headline">{{ this.question.title }}</div>
               <span class="grey--text">{{ this.question.user }} said {{ this.question.created_at }}</span>
            </div>
            <v-spacer></v-spacer>
            <v-btn color="teal" dark>{{ this.question.replies.length }} Replies</v-btn>
         </v-card-title>

         <v-card-text v-html="this.question.body"></v-card-text>

         <v-card-actions v-if="own">
            <v-btn icon small @click="edit">
               <v-icon color="orange">mdi-pencil</v-icon>
            </v-btn>
            <v-btn icon small @click="destroy">
               <v-icon color="red">mdi-delete</v-icon>
            </v-btn>
         </v-card-actions>
      </v-container>
   </v-card>
</template>

<script>
export default {
   props: ["question"],
   data() {
      return {
         own: User.own(this.question.user_id),
      };
   },
   created() {
      EventBus.$on("newReply", () => {
         this.question.reply_count++;
      });
      Echo.private("App.User." + User.id()).notification((notification) => {
         this.question.reply_count++;
      });
   },
   methods: {
      destroy() {
         axios
            .delete(`/api/question/${this.data.slug}`)
            .then((res) => this.$router.go(-1))
            .catch((error) => console.log(error.response));
      },
      edit() {
         EventBus.$emit("startEditingQuestion");
      },
   },
};
</script>

<style></style>

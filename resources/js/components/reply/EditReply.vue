<template>
   <div>
      <vue-editor v-model="content"></vue-editor>
      <v-card-actions>
         <v-btn icon small @click="update">
            <v-icon color="green">mdi-content-save</v-icon>
         </v-btn>
         <v-btn icon small @click="cancel">
            <v-icon color="black">mdi-close-octagon</v-icon>
         </v-btn>
      </v-card-actions>
   </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
export default {
   props: ["reply", "index"],
   data() {
      return {
         content: this.reply.reply,
      };
   },
   components: {
      VueEditor,
   },
   methods: {
      cancel(reply) {
         EventBus.$emit("cancelEditing", reply);
      },
      update() {
         axios
            .patch(
               `/api/question/${this.reply.question_slug}/reply/${this.reply.id}`,
               { body: this.content }
            )
            .then((res) => {
               this.cancel({
                  body: this.content,
                  index: this.index,
               });
            });
      },
   },
};
</script>

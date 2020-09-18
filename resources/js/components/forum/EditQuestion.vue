<template>
   <v-container fluid>
      <v-card>
         <v-form @submit.prevent="update">
            <v-text-field label="Title" v-model="form.title" type="text" required></v-text-field>
            <vue-editor v-model="form.body"></vue-editor>
            <v-card-actions>
               <v-btn icon small type="submit">
                  <v-icon color="teal">mdi-content-save</v-icon>
               </v-btn>

               <v-btn icon small @click="cancel">
                  <v-icon>mdi-close-octagon</v-icon>
               </v-btn>
            </v-card-actions>
         </v-form>
      </v-card>
   </v-container>
</template>

<script>
import { VueEditor } from "vue2-editor";
export default {
   props: ["data"],
   components: {
      VueEditor,
   },
   data() {
      return {
         form: {
            title: null,
            body: null,
         },
      };
   },
   methods: {
      cancel() {
         EventBus.$emit("cancelEditing");
      },
      update() {
         axios
            .patch(`/api/question/${this.form.slug}`, this.form)
            .then((res) => this.cancel());
      },
   },
   created() {
      this.form = this.data;
   },
};
</script>

<template>
   <v-container>
      <v-alert v-if="errors" type="error" :value="true">Please give category name</v-alert>
      <v-form @submit.prevent="submit">
         <v-text-field label="Category Name" v-model="form.name" type="email" required></v-text-field>
         <v-btn type="submit" color="pink" v-if="editSlug" :disabled="disabled">Update</v-btn>
         <v-btn type="submit" color="teal" v-else :disabled="disabled">Create</v-btn>
      </v-form>
      <v-card>
         <v-toolbar color="indigo" dark dense>
            <v-toolbar-title>Categories</v-toolbar-title>
         </v-toolbar>
         <v-list flat>
            <v-list-item-group color="primary">
               <v-list-item v-for="(category, index) in categories" :key="category.id">
                  <v-btn icon small @click="edit(index)">
                     <v-icon color="orange">mdi-pencil</v-icon>
                  </v-btn>
                  <v-list-item-content>
                     <v-list-item-title v-text="category.name"></v-list-item-title>
                  </v-list-item-content>
                  <v-btn icon small @click="destroy(category.slug, index)">
                     <v-icon color="red">mdi-delete</v-icon>
                  </v-btn>
               </v-list-item>
            </v-list-item-group>
         </v-list>
      </v-card>
   </v-container>
</template>

<script>
export default {
   data() {
      return {
         form: {
            name: null,
         },
         categories: [],
         editSlug: null,
         errors: null,
      };
   },
   methods: {
      submit() {
         this.editSlug ? this.update() : this.create();
      },
      update() {
         axios
            .patch(`/api/category/${this.editSlug}`, this.form)
            .then((res) => {
               this.categories.unshift(res.data.data);
               this.form.name = null;
            });
      },
      create() {
         axios
            .post("/api/category", this.form)
            .then((res) => {
               console.log(res);
               this.categories.unshift(res.data);
               this.form.name = null;
            })
            .catch((error) => {
               console.log(error);
               this.errors = error.response.data.errors;
            });
      },
      destroy(slug, index) {
         axios
            .delete(`/api/category/${slug}`)
            .then((res) => this.categories.splice(index, 1));
      },
      edit(index) {
         this.form.name = this.categories[index].name;
         this.editSlug = this.categories[index].slug;
         this.categories.splice(index, 1);
      },
   },
   created() {
      if (User.admin() === false) {
         this.$router.push("/forum");
      }
      axios
         .get("/api/category")
         .then((res) => (this.categories = res.data.data));
   },
   computed: {
      disabled() {
         return !this.form.name;
      },
   },
};
</script>

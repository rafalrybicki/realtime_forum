<template>
   <v-card>
      <v-toolbar color="cyan" dark dense class="mt-2">
         <v-toolbar-title>Categories</v-toolbar-title>
      </v-toolbar>

      <v-list flat>
         <v-list-item-group color="primary">
            <v-list-item v-for="category in categories" :key="category.id">
               <v-list-item-content>
                  <v-list-item-title v-text="category.name"></v-list-item-title>
               </v-list-item-content>
            </v-list-item>
         </v-list-item-group>
      </v-list>
   </v-card>
</template>

<script>
export default {
   data() {
      return {
         categories: {},
      };
   },
   created() {
      axios
         .get("/api/category")
         .then((res) => (this.categories = res.data.data));
   },
};
</script>

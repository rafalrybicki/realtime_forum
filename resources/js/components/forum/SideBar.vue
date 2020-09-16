<template>
   <v-card>
      <v-toolbar color="cyan" dark dense class="mt-2">
         <v-toolbar-title>Categories</v-toolbar-title>
      </v-toolbar>

      <v-list flat>
         <v-list-item-group color="primary">
            <v-list-item v-for="category in categories" :key="category.id">
               <router-link :to="{name: 'questionsByCategory', params: {slug: category.slug}}">
                  <v-list-item-content class="ml-5">
                     <v-list-item-title v-text="category.name"></v-list-item-title>
                  </v-list-item-content>
                  <v-badge color="cyan" class="badge" :content="category.totalCount.toString()"></v-badge>
               </router-link>
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

<style scoped>
.badge {
   position: absolute;
   top: 30px;
}
</style>

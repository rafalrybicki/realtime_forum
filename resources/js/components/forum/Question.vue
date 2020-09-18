<template>
   <v-card class="mt-3">
      <router-link :to="{name: 'read', params: {slug: data.slug}}">
         <v-card-title primary-title>
            <div>
               <h3 class="mb-0">{{ data.title }}</h3>
               <div class="grey--text">{{ data.user }} said {{ data.created_at }}</div>
            </div>
         </v-card-title>
         <v-card-text class="text-black" v-html="data.body "></v-card-text>
      </router-link>
   </v-card>
</template>

<script>
export default {
   props: ["data"],
};
</script>

<style scoped>
* {
   text-decoration: none;
}

.text-black {
   color: black;
   overflow: hidden;
   text-overflow: ellipsis;
   max-height: 100px;
   padding-bottom: 10px;
}
</style>

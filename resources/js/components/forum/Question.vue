<template>
   <v-card class="mt-3">
      <router-link :to="data.path">
         <v-card-title primary-title>
            <div>
               <h3 class="mb-0">{{ data.title }}</h3>
               <div class="grey--text">{{ data.user }} said {{ data.created_at }}</div>
            </div>
         </v-card-title>
         <v-card-text class="text-black">{{ data.body }}</v-card-text>
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
}
</style>

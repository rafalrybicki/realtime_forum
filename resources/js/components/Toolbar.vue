<template>
   <v-toolbar color="indigo accent-4" dark>
      <v-app-bar-nav-icon></v-app-bar-nav-icon>
      <v-toolbar-title>
         <router-link class="white--text" to="/">RealtimeForum</router-link>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <notification v-if="loggedIn"></notification>
      <div class="hidden-sm-and-down">
         <router-link v-for="item in items" :key="item.title" :to="item.to" v-if="item.show">
            <v-btn text>{{ item.title }}</v-btn>
         </router-link>
      </div>
   </v-toolbar>
</template>

<script>
import Notification from "./Notification";
export default {
   components: { Notification },
   data() {
      return {
         loggedIn: User.loggedIn(),
         items: [
            { title: "Ask Question", to: "/ask", show: User.loggedIn() },
            { title: "Category", to: "/category", show: User.admin() },
            { title: "Login", to: "/login", show: !User.loggedIn() },
            { title: "Signup", to: "/signup", show: !User.loggedIn() },
            { title: "Logout", to: "/logout", show: User.loggedIn() },
         ],
      };
   },
   created() {
      EventBus.$on("logout", () => {
         User.logout();
      });
   },
};
</script>

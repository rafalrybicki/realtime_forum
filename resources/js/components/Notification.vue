<template>
   <div class="text-xs-center">
      <v-menu offset-y>
         <template v-slot:activator="{ on }">
            <v-icon :color="color" v-on="on">mdi-bell</v-icon>
            {{ unreadCount }}
         </template>

         <v-list>
            <v-list-item v-for="item in unread" :key="item.id">
               <router-link :to="item.path">
                  <v-list-item-content>
                     <v-list-item-title @click="readIt(item)" v-text="item.question"></v-list-item-title>
                  </v-list-item-content>
               </router-link>
            </v-list-item>

            <v-divider></v-divider>

            <v-list-item v-for="item in read" :key="item.id">
               <v-list-item-content>
                  <v-list-item-title v-text="item.question"></v-list-item-title>
               </v-list-item-content>
            </v-list-item>
         </v-list>
      </v-menu>
   </div>
</template>

<script>
export default {
   data() {
      return {
         read: {},
         unread: {},
         unreadCount: 0,
      };
   },
   created() {
      if (User.loggedIn()) {
         this.getNotifications();
      }

      Echo.private("App.User." + User.id()).notification((notification) => {
         this.unread.unshift(notification);
         this.unreadCount++;
      });
   },
   methods: {
      getNotifications() {
         axios
            .post("/api/notifications")
            .then((res) => {
               this.read = res.data.read;
               this.unread = res.data.unread;
               this.unreadCount = res.data.unread.length;
            })
            .catch((error) => Exception.handle(error));
      },
      readIt(notification) {
         axios.post("/api/markAsRead", { id: notification.id }).then((res) => {
            this.unread.splice(notification, 1);
            this.read.push(notification);
            this.unreadCount--;
         });
      },
   },
   computed: {
      color() {
         return this.unreadCount > 0 ? "red" : "red lighten-4";
      },
   },
};
</script>

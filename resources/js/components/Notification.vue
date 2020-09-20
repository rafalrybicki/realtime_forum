<template>
   <div class="text-xs-center">
      <v-menu offset-y>
         <template v-slot:activator="{ on }">
            <v-icon :color="color" v-on="on">mdi-bell</v-icon>
            {{ unreadCount > 0 ? unreadCount : '' }}
         </template>

         <v-list>
            <v-list-item v-for="(item, index) in unread" :key="item.id">
               <router-link :to="{name: 'read', params: {slug: item.question} }">
                  <v-list-item-content>
                     <v-list-item-title
                        @click="readIt(item.id, index)"
                     >{{ item.replyBy }} added a comment</v-list-item-title>
                  </v-list-item-content>
               </router-link>
            </v-list-item>
         </v-list>
      </v-menu>
   </div>
</template>

<script>
export default {
   data() {
      return {
         unread: {},
         unreadCount: 0,
         sound: "http://soundbible.com/mp3/glass_ping-Go445-1207030150.mp3",
      };
   },
   created() {
      if (User.loggedIn()) {
         this.getNotifications();
      }

      Echo.private("App.User." + User.id()).notification((notification) => {
         this.playSound();
         this.unread.unshift(notification);
         this.unreadCount++;
      });
   },
   methods: {
      playSound() {
         let alert = new Audio(this.sound);
         alert.play();
      },
      getNotifications() {
         axios
            .post("/api/notifications")
            .then((res) => {
               if (res.data.unread) {
                  this.unread = res.data.unread;
                  this.unreadCount = res.data.unread.length;
               }
            })
            .catch((error) => Exception.handle(error));
      },
      readIt(id, index) {
         axios.post("/api/markAsRead", { id }).then((res) => {
            this.unread.splice(index, 1);
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

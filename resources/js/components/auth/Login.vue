<template>
   <v-container>
      <v-form @submit.prevent="login">
         <span class="red--text" v-if="error">Email or password is inncorrect</span>
         <v-text-field label="E-mail" v-model="form.email" type="email" required></v-text-field>
         <v-text-field label="Password" v-model="form.password" type="password" required></v-text-field>
         <v-btn color="green" type="submit" :disabled="disabled">Login</v-btn>
      </v-form>
   </v-container>
</template>

<script>
export default {
   data() {
      return {
         form: {
            email: "",
            password: "",
         },
         error: false,
      };
   },
   created() {
      if (User.loggedIn()) {
         this.$router.push({ name: "/" });
      }
   },
   computed: {
      disabled() {
         return this.form.email && !this.form.password;
      },
   },
   methods: {
      login() {
         axios
            .post("/api/auth/login", this.form)
            .then((res) => User.responseAfterLogin(res))
            .catch((error) => (this.error = true));
      },
   },
};
</script>

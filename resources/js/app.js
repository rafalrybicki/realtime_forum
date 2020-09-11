import Vue from "vue";
window.Vue = require("vue");

import Vuetify from "vuetify";
Vue.use(Vuetify);

import User from "./helpers/User";
window.User = User;

import axios from "axios";
window.axios = axios;

window.EventBus = new Vue();

import router from "./router/router";

// import { Plugin } from "vue-fragment";
// Vue.use(Plugin);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("Home", require("./components/Home.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    router
});

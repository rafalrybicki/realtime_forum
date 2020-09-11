import Vue from "vue";
import VueRouter from "vue-router";
import Login from "../components/auth/Login";
import Logout from "../components/auth/Logout";
import SignUp from "../components/auth/SignUp";
import Forum from "../components/forum/Forum";

Vue.use(VueRouter);

const routes = [
    {
        path: "/login",
        component: Login
    },
    {
        path: "/logout",
        component: Logout
    },
    {
        path: "/signup",
        component: SignUp
    },
    {
        path: "/foru",
        component: Forum,
        name: "forum"
    }
];

const router = new VueRouter({
    routes,
    mode: "history"
});
export default router;

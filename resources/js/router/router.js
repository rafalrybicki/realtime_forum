import Vue from "vue";
import VueRouter from "vue-router";
import Login from "../components/auth/Login";
import Logout from "../components/auth/Logout";
import SignUp from "../components/auth/SignUp";
import Forum from "../components/forum/Forum";
import Read from "../components/forum/Read";
import Create from "../components/forum/Create";

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
        path: "/forum",
        component: Forum,
        name: "forum"
    },
    {
        path: "/question/:slug",
        component: Read,
        name: "read"
    },
    {
        path: "/ask",
        component: Create
    }
];

const router = new VueRouter({
    routes,
    mode: "history"
});
export default router;

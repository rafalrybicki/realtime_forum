import Vue from "vue";
import VueRouter from "vue-router";
import Login from "../components/auth/Login";
import Logout from "../components/auth/Logout";
import SignUp from "../components/auth/SignUp";
import Forum from "../components/forum/Forum";
import Read from "../components/forum/Read";
import CreateQuestion from "../components/forum/Create";
import CreateCategory from "../components/category/Create";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        component: Forum,
        name: "forum"
    },
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
        path: "/question/:slug",
        component: Read,
        name: "read"
    },
    {
        path: "/ask",
        component: CreateQuestion
    },
    {
        path: "/category",
        component: CreateCategory
    }
];

const router = new VueRouter({
    routes,
    mode: "history"
});
export default router;

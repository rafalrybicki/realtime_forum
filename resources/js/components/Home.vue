<template>
    <Fragment>
        <Toolbar />
        <router-view></router-view>
        <AppFooter />
    </Fragment>
</template>

<script>
import Toolbar from "./Toolbar";
import AppFooter from "./AppFooter";
import { Fragment } from "vue-fragment";
export default {
    components: { Toolbar, AppFooter, Fragment }
};
</script>

<style></style>

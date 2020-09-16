<template>
   <fragment>
      <toolbar />
      <router-view></router-view>
      <app-footer />
   </fragment>
</template>

<script>
import Toolbar from "./Toolbar";
import AppFooter from "./AppFooter";
import { Fragment } from "vue-fragment";
export default {
   components: { Toolbar, AppFooter, Fragment },
};
</script>


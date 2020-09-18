<template>
   <fragment>
      <toolbar />
      <router-view></router-view>
   </fragment>
</template>

<script>
import Toolbar from "./Toolbar";
import { Fragment } from "vue-fragment";
export default {
   components: { Toolbar, Fragment },
};
</script>


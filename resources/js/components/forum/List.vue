<template>
   <fragment>
      <question v-for="question in questions" :key="question.slug" :data="question"></question>
   </fragment>
</template>

<script>
import { Fragment } from "vue-fragment";
import Question from "./Question";

export default {
   components: { Fragment, Question },
   props: ["questions"],
};
</script>

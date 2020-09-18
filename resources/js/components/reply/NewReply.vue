<template>
    <div class="mt-4">
        <vue-editor v-model="content"></vue-editor>
        <v-btn dark class="mt-3" color="green" @click="submit">Reply</v-btn>
    </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
export default {
    props: ["questionSlug"],
    components: {
        VueEditor
    },
    data() {
        return {
            content: ""
        };
    },
    methods: {
        submit() {
            axios
                .post(`/api/question/${this.questionSlug}/reply`, {
                    body: this.content
                })
                .then(res => {
                    this.content = "";
                    EventBus.$emit("newReply", res.data.reply);
                    window.scrollTo(0, 0);
                });
        }
    }
};
</script>

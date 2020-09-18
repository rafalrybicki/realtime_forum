<template>
    <v-container>
        <v-form @submit.prevent="create">
            <v-text-field
                label="Title"
                v-model="form.title"
                type="text"
                required
            ></v-text-field>
            <v-select
                :items="categories"
                item-text="name"
                item-value="id"
                v-model="form.category_id"
                label="Category"
                autocomplete
            ></v-select>
            <vue-editor v-model="form.body" class="mb-3"></vue-editor>
            <v-btn color="green" type="submit" :disabled="disabled"
                >Create</v-btn
            >
        </v-form>
    </v-container>
</template>

<script>
import { VueEditor } from "vue2-editor";
export default {
    components: {
        VueEditor
    },
    data() {
        return {
            form: {
                title: null,
                category_id: null,
                body: ""
            },
            categories: []
        };
    },
    created() {
        axios
            .get("api/category")
            .then(res => (this.categories = res.data.data));
    },
    methods: {
        create() {
            axios
                .post("/api/question", this.form)
                .then(res => this.$router.push(res.data.path))
                .catch(error => (this.errors = error.response.data.errors));
        }
    },
    computed: {
        disabled() {
            return !(
                this.form.title &&
                this.form.category_id &&
                this.form.body
            );
        }
    }
};
</script>

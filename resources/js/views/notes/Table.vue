<template>
    <div class="container">
        <h3>Table of Notes</h3>
        <hr />
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th class="text-center">Subject</th>
                    <th class="text-center">Published</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tr v-for="note in notes" :key="note.id">
                <td class="align-middle ">
                    <router-link
                        :to="{
                            name: 'notes.show',
                            params: { noteSlug: note.slug }
                        }"
                        >{{ note.title }}</router-link
                    >
                </td>
                <td class="align-middle text-center">{{ note.subject }}</td>
                <td class="align-middle text-center">{{ note.published }}</td>
                <td class="text-center">
                    <router-link
                        :to="{
                            name: 'notes.edit',
                            params: { noteSlug: note.slug }
                        }"
                        class="btn btn-warning"
                        >Edit</router-link
                    >
                    <DeleteNote :endpoint="note.slug" />
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
import DeleteNote from "./Delete.vue";
export default {
    components: {
        DeleteNote
    },
    data() {
        return {
            notes: []
        };
    },

    mounted() {
        axios.get("/api/notes").then(response => {
            this.notes = response.data.data;
        });
    }
};
</script>

<style></style>

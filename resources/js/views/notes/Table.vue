<template>
    <div class="container">
        <h3>Table of Notes</h3>
        <hr />
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Subject</th>
                    <th>Published</th>
                    <td colspan="2" class="text-center">Action</td>
                </tr>
            </thead>
            <tr v-for="note in notes" :key="note.id">
                <td>
                    <router-link
                        :to="{
                            name: 'notes.show',
                            params: { noteSlug: note.slug }
                        }"
                        >{{ note.title }}</router-link
                    >
                </td>
                <td>{{ note.subject }}</td>
                <td>{{ note.published }}</td>
                <td>
                    <router-link
                        :to="{
                            name: 'notes.edit',
                            params: { noteSlug: note.slug }
                        }"
                        >Edit</router-link
                    >
                </td>
                <td>
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

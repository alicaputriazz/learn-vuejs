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
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            notes: []
        };
    },

    mounted() {
        axios.get("/api/notes").then(response => {
            this.notes = response.data.data;
            console.log(response.data.data);
        });
    }
};
</script>

<style></style>

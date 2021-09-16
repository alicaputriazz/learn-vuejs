<template>
    <div class="container">
        <h1>{{ note.title }}</h1>
        <p class="text-muted">
            Published at {{ note.published }} • Subject: {{ note.subject }}
        </p>
        <hr />
        <p>
            {{ note.description }}
        </p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            note: []
        };
    },
    mounted() {
        this.getNote();
    },
    methods: {
        async getNote() {
            let response = await axios.get(
                "/api/notes/" + this.$route.params.noteSlug
            );
            this.note = response.data.data;
        }
    }
};
</script>

<style></style>

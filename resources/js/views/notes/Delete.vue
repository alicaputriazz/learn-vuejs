<template>
    <button ref="deleteNote" @click="destroyNote">Delete</button>
</template>

<script>
export default {
    props: ["endpoint"],
    methods: {
        async destroyNote() {
            let question = window.confirm(
                "Are you sure you want to delete this note?"
            );
            if (question) {
                let response = await axios.delete(
                    `/api/notes/${this.endpoint}/delete`
                );
                if (response.status == 200) {
                    this.$toasted.show(response.data.message, {
                        type: "success",
                        duration: 3000
                    });

                    // menghapus list di tampilan secara real-time
                    this.$refs.deleteNote.parentNode.parentNode.remove();
                }
            } else {
                console.log("Not Deleted");
            }
        }
    }
};
</script>

<style></style>

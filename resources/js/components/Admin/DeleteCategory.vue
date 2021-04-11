<template>

</template>

<script>
export default {
name: "DeleteCategory",
    props: ['category'],
    methods: {
        deleteCategory(id) {
            axios.delete('/api/communities/' + id)
                .then(r => this.cancel())
                .catch(e => console.log(e))
        },
        cancel () {
            this.$router.push('/admin')
        },
    },
    mounted() {
        this.deleteCategory(this.$route.params.id)
    }
}
</script>

<style scoped>

</style>

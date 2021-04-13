<template>

</template>

<script>
export default {
name: "DeleteCategory",
    methods: {
        deleteCategory(id) {
            axios.delete('/api/admin/communities/' + id, { headers: {
                    'Authorization': 'Bearer ' + this.$store.state.token } })
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

<template>

</template>

<script>
export default {
    name: "DeleteSub",
    methods: {
        deleteSubcategory(id) {
            axios.delete('/api/admin/subcategories/' + id, { headers: {
                    'Authorization': 'Bearer ' + this.$store.state.token } })
                .then(r => this.cancel())
                .catch(e => console.log(e))
        },
        cancel () {
            this.$router.push('/admin/subcategories')
        },
    },
    mounted() {
        this.deleteSubcategory(this.$route.params.id)
    }
}
</script>

<style scoped>

</style>

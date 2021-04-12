<template>

</template>

<script>
export default {
    name: "DeleteDoctor",
    methods: {
        deleteDoctor(id) {
            axios.delete('/api/admin/doctors/' + id)
                .then(r => this.cancel())
                .catch(e => console.log(e))
        },
        cancel () {
            this.$router.push('/admin/doctors')
        },
    },
    mounted() {
        this.deleteDoctor(this.$route.params.id)
    }
}
</script>

<style scoped>

</style>

<template>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Изображение</th>
                </tr>
            </thead>
            <tbody>
                <tr is="ProductItem" v-for="product in products" :product="product" :key="product.good_id"></tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
name: "MainAdmin",
    data() {
        return {
            categoriesData: {},
        }
    },
    loadCategories() {
        axios.get('/api/categories/')
            .then(r => this.categoriesData = r.data)
            .catch(e => console.log(e))
    },
    mounted() {
        this.loadBlogPost()
        this.loadUser()
    }
}
</script>

<style scoped>

</style>

<template>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Изображение</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody class="table-striped">
                <tr v-for="category in categoriesData.data" :key="category.id">
                    <td>{{ category.id }}</td>
                    <td>{{ category.name }}</td>
                    <td>{{ category.description }}</td>
                    <td>{{ category.image }}</td>
                    <td><router-link :to="'/admin/delete-category/' + category.id">Удалить</router-link></td>
                </tr>
            </tbody>
        </table>
        <router-link to="/admin/add-category" class="btn btn-outline-secondary">Добавить категорию</router-link>
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
    methods: {
        loadCategories() {
            axios.get('/api/communities')
                .then(r => this.categoriesData = r.data)
                .catch(e => console.log(e))
        },
        red(item) {
            console.log('редактировать' + item)
        },
        del(item) {
            console.log('удалить' + item)
        }
    },
    created() {
        this.loadCategories()
    }
}
</script>

<style scoped>

</style>

<template>
    <div class="container">
        <div class="flex">
            <router-link to="/admin" class="nav-link animsition-link">Категории</router-link>
            <router-link to="/admin/subcategories" class="nav-link animsition-link">Подкатегории</router-link>
            <router-link to="/admin/doctors" class="nav-link animsition-link">Врачи</router-link>
            <router-view></router-view>
        </div>
        <div class="row">
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
        </div>
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
            axios.get('/api/admin/communities', { headers: {
                    'Authorization': 'Bearer ' + this.$store.state.token } })
                .then(r => this.categoriesData = r.data)
                .catch(e => console.log(e))
        },
    },
    created() {
        this.loadCategories()
    }
}
</script>

<style scoped>
.flex {
    display: flex;
    margin: 30px;
}
</style>

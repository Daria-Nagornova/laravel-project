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
                    <th>Категория</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody class="table-striped">
                <tr v-for="subcategory in subcategoriesData" :key="subcategory.id">
                    <td>{{ subcategory.id }}</td>
                    <td>{{ subcategory.name }}</td>
                    <td>{{ subcategory.category_id }}</td>
                    <td><router-link :to="'/admin/delete-subcategory/' + subcategory.id">Удалить</router-link></td>
                </tr>
                </tbody>
            </table>
        </div>
        <router-link to="/admin/add-subcategory" class="btn btn-outline-secondary">Добавить подкатегорию</router-link>
    </div>
</template>

<script>
export default {
    name: "Subcategory",
    data() {
        return {
            subcategoriesData: {},
        }
    },
    methods: {
        loadSubcategories() {
            axios.get('/api/admin/subcategories', { headers: {
                    'Authorization': 'Bearer ' + this.$store.state.token } })
                .then(r => this.subcategoriesData = r.data)
                .catch(e => console.log(e))
        },
    },
    created() {
        this.loadSubcategories()
    }
}
</script>

<style scoped>
.flex {
    display: flex;
    margin: 30px;
}
</style>

<template>
    <div class="container">
        <div class="flex">
            <router-link to="/admin" class="nav-link animsition-link">Категории</router-link>
            <router-link to="/admin/subcategories" class="nav-link animsition-link">Подкатегории</router-link>
            <router-link to="/admin/doctors" class="nav-link animsition-link">Врачи</router-link>
            <router-view></router-view>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Имя</th>
                <th>Описание</th>
                <th>Специализация</th>
                <th>Id пользователя</th>
                <th>Изображение</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody class="table-striped">
            <tr v-for="doctor in doctorsData" :key="doctor.id">
                <td>{{ doctor.id }}</td>
                <td>{{ doctor.name }}</td>
                <td>{{ doctor.description }}</td>
                <td>{{ doctor.specialisation_id }}</td>
                <td>{{ doctor.user_id }}</td>
                <td>{{ doctor.image }}</td>
                <td><router-link :to="'/admin/delete-doctor/' + doctor.id">Удалить</router-link></td>
            </tr>
            </tbody>
        </table>
        <router-link to="/admin/add-doctor" class="btn btn-outline-secondary">Добавить врача</router-link>
    </div>
</template>

<script>
export default {
name: "Doctor",
    data() {
        return {
           doctorsData: {},
        }
    },
    methods: {
        loadDoctors() {
            axios.get('/api/admin/doctors')
                .then(r => this.doctorsData = r.data)
                .catch(e => console.log(e))
        },
    },
    created() {
        this.loadDoctors()
    }
}
</script>

<style scoped>
.flex {
    display: flex;
    margin: 30px;
}
</style>

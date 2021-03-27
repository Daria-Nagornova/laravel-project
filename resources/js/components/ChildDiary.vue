<template>
    <div class="container">
        <h1>Дневник ребенка</h1>
        <div class="row">
            <div class="col">
                <div>
                    <router-link to="/profile-user/child-diary/add-child" class="btn btn-primary">Добавить ребенка</router-link>
                </div>
                <div class="child">
                    <span> Имя </span>
                    <span> Дата рождения </span>
                    <span> Пол </span>
                </div>
            </div>
            <router-link to="/profile-user/child-diary/add-notes" class="btn btn-primary addNotes">+ Добавить запись</router-link>
            <div class="col">
                <label>Выбрать дату</label>
                <input class="form-control" type="date" v-model="date">
            </div>

        </div>
        <div>
            <span>Прогулка</span>
            <span> Начало-конец </span>
            <span>Длительность </span>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "ChildDiary",
    data() {
        return {
            date: ''
        }
    },
}
</script>

<style scoped>

</style>

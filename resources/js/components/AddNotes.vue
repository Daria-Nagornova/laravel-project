<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="path">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><router-link to="/">Главная</router-link></li>
                <li class="breadcrumb-item"><router-link to="/profile-user">Профиль</router-link></li>
                <li class="breadcrumb-item"><router-link to="/profile-user/child-diary">Дневник ребенка</router-link></li>
                <li class="breadcrumb-item active" aria-current="page">Добавить запись</li>
            </ol>
        </nav>
        <div class="category">
            <div class="row">
                <div class="col">
                    <router-link :to="'/profile-user/child-diary/add-notes/' + childId + '/walk'" class="btn btn-outline-secondary button-category walk-icon">Прогулка</router-link>
                </div>
                <div class="col">
                    <router-link :to="'/profile-user/child-diary/add-notes/' + childId + '/sleep'" class="btn btn-outline-secondary button-category sleep-icon">Сон</router-link>
                </div>
                <div class="col">
                    <router-link :to="'/profile-user/child-diary/add-notes/' + childId + '/feeding'" class="btn btn-outline-secondary button-category feeding-icon">Кормление</router-link>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <router-link :to="'/profile-user/child-diary/add-notes/' + childId + '/height'" class="btn btn-outline-secondary button-category height-icon">Рост и вес</router-link>
                </div>
                <div class="col">
                    <router-link :to="'/profile-user/child-diary/add-notes/' + childId + '/vaccination'" class="btn btn-outline-secondary button-category vaccination-icon">Прививка</router-link>
                </div>
                <div class="col">
                    <router-link :to="'/profile-user/child-diary/add-notes/' + childId + '/teeth'" class="btn btn-outline-secondary button-category teeth-icon">Зубы</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
  name: 'AddNotes',
    computed: {
        childId() {
            return this.$route.params.id;
        }
    }
}
</script>

<style scoped>
.button-category {
  width: 200px;
  height: 30px;
}
.category {
  margin: 50px;
}
.category .row {
  margin: 20px;
}
</style>

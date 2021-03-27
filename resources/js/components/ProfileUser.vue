<template>
    <div>
        <h1>Личный профиль</h1>
        <router-link to="/profile-user/child-diary" class="nav-link animsition-link">Дневник ребенка</router-link>
        <a href="#" class="nav-link animsition-link">Посты</a>
        <a href="#" class="nav-link animsition-link">Консультации</a>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
name: "ProfileUser"
}
</script>

<style scoped>

</style>

<template>
    <div>
        <h1>Личный профиль</h1>
        <router-link to="/profile-user/child-diary" class="nav-link animsition-link">Дневник ребенка</router-link>
        <router-link to="/profile-user/user-posts" class="nav-link animsition-link">Посты</router-link>
        <router-link to="/profile-user/user-consultations" class="nav-link animsition-link">Консультации</router-link>
        <router-view></router-view>
    </div>
</template>

<script>
import MainAdmin from "./Admin/MainAdmin";
export default {
name: "ProfileUser",
    components: {MainAdmin}
}
</script>

<style scoped>

</style>

<template>
    <div>
        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <div class="navbar-header d-flex align-items-center justify-content-between">
                        <a href="/"><img src="img/logo.png"></a>
                        <a href="/" class="navbar-brand animsition-link">Mom and baby</a>
                    </div>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto justify-content-between main-menu">
                                <li class="nav-item active">
                                    <router-link to="/" class="nav-link animsition-link">Главная</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/communities" class="nav-link animsition-link">Сообщества</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/consultations" class="nav-link animsition-link">Консультации</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link v-if="loggedIn && userData.role === 'пользователь'" to="/profile-user" class="nav-link animsition-link">Профиль</router-link>
                                </li>
                                <li v-if="userData.role === 'врач'" class="nav-item">
                                    <router-link to="/profile-doctor" class="nav-link animsition-link">Врач</router-link>
                                </li>
                                <li v-if="userData.role === 'администратор'" class="nav-item">
                                    <router-link to="/admin" class="nav-link animsition-link">Админ</router-link>
                                </li>
                            </ul>
                        </div>
                    <div>
                        <span v-if="loggedIn" class="user">{{ userData.name }}</span>
                        <router-link v-if="loggedIn" to="/logout" class="btn btn-outline-secondary btn-q">Выход</router-link>
                    </div>
                    <ul class="navbar-nav ml-auto align-items-center main-menu">
                        <li class="nav-item">
                            <router-link v-if="!loggedIn" to="/login" class="nav-link animsition-link">Вход</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link v-if="!loggedIn" to="/register" class="nav-link animsition-link">Регистрация</router-link>
                        </li>
                    </ul>
                </div>
            </nav>

        </header>
    </div>
</template>

<script>
export default {
    name: "Header",
    data() {
        return {
            userData: {},
        }
    },
    methods: {
        loadUser() {
            axios.get('/api/user', { headers: {
                    'Authorization': 'Bearer ' + this.$store.state.token }
            })
                .then(r => this.userData = r.data)
                .catch(e => console.log(e))
        }
    },
    created() {
        this.loadUser()
    },
    computed: {
        loggedIn() {
            return this.$store.getters.loggedIn
        }
    }
}
</script>

<style scoped>
.main-menu {
    font-family: "Nunito", sans-serif;
    margin: 0 auto;
}
.main-menu a:active {
    color: #796AEE;
}
.btn-q {
    background-color: white;
    border: none;
    border-bottom: 2px solid #95999c;
}
.user {
    color: #796AEE;
    margin: 0 15px;
    font-size: 1rem;
    font-weight: 500;

}
</style>
